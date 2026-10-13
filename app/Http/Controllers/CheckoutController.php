<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Voucher;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil data keranjang
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda masih kosong.');
        }

        // Hitung Subtotal
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->qty;
        });

        // Ambil alamat terbaru user
        $address = Address::where('user_id', $user->id)->latest()->first();

        return view('users.checkout', compact('cartItems', 'subtotal', 'address', 'user'));
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'label' => 'Utama',
            'recipient_name' => $request->nama,
            'phone_number' => $request->no_hp,
            'full_address' => $request->alamat,
            'is_primary' => true
        ]);

        return back()->with('success', 'Alamat pengiriman berhasil disimpan.');
    }

    public function process(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $address = Address::where('user_id', $user->id)->latest()->first();
        $shippingCost = (int) $request->shipping_cost;

        // Cegah checkout jika pilih pengiriman kurir tapi belum punya alamat
        if ($shippingCost > 0 && !$address) {
            return back()->with('error', 'Silakan isi alamat pengiriman terlebih dahulu.');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->qty;
        });

        // Hitung diskon voucher jika ada
        $discount = 0;
        if ($request->filled('kode_voucher')) {
            $voucher = Voucher::where('kode_voucher', $request->kode_voucher)
                ->where('is_active', true)
                ->where('expired_at', '>', now())
                ->first();

            if ($voucher) {
                if ($voucher->type_voucher === 'persen' || $voucher->type_voucher === 'persentase') {
                    $discount = ($subtotal * $voucher->nilai_diskon) / 100;
                } else {
                    $discount = $voucher->nilai_diskon;
                }
            } else {
                return back()->with('error', 'Voucher tidak valid atau sudah kadaluarsa.');
            }
        }

        // Pastikan diskon tidak melebihi subtotal
        $discount = min($discount, $subtotal);
        $totalAmount = ($subtotal - $discount) + $shippingCost;
        $orderNumber = 'UNP-' . strtoupper(Str::random(6));

        // Buat Data Pesanan
        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $shippingCost > 0 ? $address->id : null,
            'order_number' => $orderNumber,
            'total_harga' => max(0, $totalAmount), // Minimal 0
            'status' => 'pending',
            'metode_pembayaran' => 'Xendit',
            'catatan' => $request->catatan,
        ]);

        // Pindahkan Cart ke OrderItem
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->qty,
                'harga_satuan' => $item->product->harga,
            ]);
        }

        // Hapus keranjang
        Cart::where('user_id', $user->id)->delete();

        // Hit API Xendit
        $secretKey = env('XENDIT_SECRET_KEY');
        $response = Http::withBasicAuth($secretKey, '')
            ->post('https://api.xendit.co/v2/invoices', [
                'external_id' => $order->order_number,
                'amount' => $order->total_harga,
                'payer_email' => $user->email,
                'description' => 'Pembayaran Merchandise UNPAM - ' . $order->order_number,
                'success_redirect_url' => route('checkout.success'),
                'failure_redirect_url' => route('dashboard'),
            ]);

        if ($response->successful()) {
            return redirect($response->json()['invoice_url']);
        }

        return back()->with('error', 'Gagal memproses ke gerbang pembayaran. Silakan coba lagi.');
    }

    public function success(Request $request)
    {
        $user = Auth::user();

        $order = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->latest()
            ->first();

        if ($order) {
            $order->status = 'dibayar';
            $order->save();
        }

        return view('users.checkout-success');
    }

    // Method untuk mengecek dan menghitung voucher via AJAX
    public function applyVoucher(Request $request)
    {
        $request->validate([
            'kode_voucher' => 'required|string',
            'subtotal' => 'required|numeric'
        ]);

        // Cari voucher di database (misalnya cek kode dan status aktif)
        $voucher = Voucher::where('kode_voucher', $request->kode_voucher)
            ->where('is_active', true)
            ->first();

        // 1. Cek apakah voucher ada
        if (!$voucher) {
            return response()->json([
                'success' => false,
                'message' => 'Kode voucher tidak ditemukan atau sudah tidak berlaku.'
            ]);
        }

        // 2. Cek minimal belanja
        if ($request->subtotal < $voucher->minimal_belanja) {
            return response()->json([
                'success' => false,
                'message' => 'Minimal belanja untuk voucher ini adalah Rp ' . number_format($voucher->minimal_belanja, 0, ',', '.')
            ]);
        }

        // 3. Cek kuota/limit pemakaian voucher jika ada
        if ($voucher->kuota <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Kuota voucher sudah habis.'
            ]);
        }

        // 4. Hitung Diskon sesuai tipe voucher
        $discountAmount = 0;
        if ($voucher->type_voucher === 'persen' || $voucher->type_voucher === 'persentase') {
            $discountAmount = ($request->subtotal * $voucher->nilai_diskon) / 100;
        } else {
            $discountAmount = $voucher->nilai_diskon;
        }

        // 5. Pastikan diskon tidak lebih besar dari subtotal
        $discountAmount = min($discountAmount, $request->subtotal);

        // Jika semua pengecekan aman, kirim data diskon ke frontend
        return response()->json([
            'success' => true,
            'discount' => $discountAmount,
            'message' => 'Voucher berhasil diterapkan!'
        ]);
    }
}