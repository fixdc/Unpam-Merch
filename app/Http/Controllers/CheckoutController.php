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
        
        $totalAmount = $subtotal + $shippingCost; 
        $orderNumber = 'UNP-' . strtoupper(Str::random(6));

        // Buat Data Pesanan (Menyimpan address_id & catatan)
        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $shippingCost > 0 ? $address->id : null, // Null jika ambil mandiri
            'order_number' => $orderNumber,
            'total_harga' => $totalAmount,
            'status' => 'pending', 
            'metode_pembayaran' => 'Xendit',
            'catatan' => $request->catatan, // Ambil input catatan dari form
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

    public function success()
    {
        return view('users.checkout-success');
    }
}