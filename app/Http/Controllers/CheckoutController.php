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

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // 1. Ambil data keranjang
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda masih kosong.');
        }

        // Hitung Subtotal
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->qty;
        });

        // 2. Ambil alamat utama user (atau alamat terakhir yang ditambahkan)
        $address = Address::where('user_id', $user->id)->latest()->first();

        return view('users.checkout', compact('cartItems', 'subtotal', 'address', 'user'));
    }

    // Fungsi untuk menyimpan alamat baru dari modal popup
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

    // Fungsi untuk memproses pesanan dan memanggil API Xendit
    public function process(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $address = Address::where('user_id', $user->id)->latest()->first();
        if (!$address) {
            return back()->with('error', 'Silakan isi alamat pengiriman terlebih dahulu.');
        }

        // 1. Kalkulasi Harga
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->qty;
        });
        
        $shippingCost = (int) $request->shipping_cost;
        $totalAmount = $subtotal + $shippingCost; 
        
        // Format Order Number mirip dengan data dummy kamu ('UNP-SZ5FSI')
        $orderNumber = 'UNP-' . strtoupper(Str::random(6));

        // 2. Buat Data Pesanan (Sesuai kolom di DB)
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => $orderNumber,
            'total_harga' => $totalAmount,
            'status' => 'pending', 
            'metode_pembayaran' => 'Xendit',
            // Karena tidak ada kolom alamat di tabel orders, kita simpan di catatan
            'catatan' => "Dikirim ke: {$address->recipient_name} - {$address->phone_number} ({$address->full_address}). Ongkir: Rp{$shippingCost}",
        ]);

        // 3. Pindahkan Cart ke OrderItem (Sesuai kolom di DB)
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

        // 4. Hit API Xendit
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

    public function success()
    {
        return view('users.checkout-success');
    }
}