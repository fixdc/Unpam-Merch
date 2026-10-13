<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\Http;

class UserOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data pesanan milik user beserta produk di dalam item pesanan
        $orders = Order::with('orderItems.product')
                    ->where('user_id', $user->id)
                    ->latest()
                    ->get();

        return view('users.orders', compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::with(['orderItems.product', 'user'])->findOrFail($id);
        
        // Keamanan: pastikan user hanya bisa melihat struk pesanannya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak. Ini bukan pesanan Anda.');
        }

        return view('users.invoice', compact('order'));
    }

    public function completeOrder($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);

        if (in_array($order->status, ['siap_ambil', 'terkirim'])) {
            $order->status = 'selesai';
            $order->save();
            
            return redirect()->route('user.order.review', $order->id)->with('success', 'Pesanan selesai! Silakan berikan ulasan Anda.');
        }

        return back()->with('error', 'Pesanan tidak dapat diselesaikan saat ini.');
    }

    // Method untuk menampilkan halaman ulasan
    public function reviewPage($id)
    {
        $order = Order::with('orderItems.product')->where('user_id', Auth::id())->findOrFail($id);

        if ($order->status !== 'selesai') {
            return redirect()->route('user.orders')->with('error', 'Pesanan belum selesai.');
        }

        $hasReviewed = Review::where('order_id', $order->id)->exists();
        if ($hasReviewed) {
            return redirect()->route('user.orders')->with('success', 'Anda sudah memberikan ulasan untuk pesanan ini.');
        }

        return view('users.review', compact('order'));
    }

    // Method untuk memproses submit ulasan
    public function submitReview(Request $request, $id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        
        $request->validate([
            'reviews' => 'required|array',
            'reviews.*.rating' => 'required|integer|min:1|max:5',
            'reviews.*.coment' => 'nullable|string',
        ]);

        foreach ($request->reviews as $productId => $reviewData) {
            Review::create([
                'product_id' => $productId,
                'order_id' => $order->id,
                'rating' => $reviewData['rating'],
                'coment' => $reviewData['coment'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('user.orders')->with('success', 'Terima kasih! Ulasan Anda berhasil disimpan.');
    }
    public function payNow($id)
    {
        $order = \App\Models\Order::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        // Pastikan hanya pesanan pending yang bisa dibayar ulang
        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan ini sudah tidak bisa dibayar.');
        }

        // Hit API Xendit untuk membuat invoice baru
        $secretKey = env('XENDIT_SECRET_KEY');
        
        // Tambahkan timestamp di belakang order_number agar external_id unik di mata Xendit
        $externalId = $order->order_number . '-' . time();

        $response = Http::withBasicAuth($secretKey, '')
            ->post('https://api.xendit.co/v2/invoices', [
                'external_id' => $externalId,
                'amount' => $order->total_harga,
                'payer_email' => auth()->user()->email,
                'description' => 'Pembayaran Ulang Merchandise UNPAM - ' . $order->order_number,
                'success_redirect_url' => route('checkout.success'),
                'failure_redirect_url' => route('user.orders'),
            ]);

        if ($response->successful()) {
            return redirect($response->json()['invoice_url']);
        }

        return back()->with('error', 'Gagal membuat tagihan pembayaran baru. Silakan coba lagi.');
    }
    
}