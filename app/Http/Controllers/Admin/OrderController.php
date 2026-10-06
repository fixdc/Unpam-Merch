<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Menampilkan semua pesanan
    public function index()
    {
        $orders = Order::with(['user'])->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    // Menampilkan detail pesanan spesifik
    public function show($id)
    {
        $order = Order::with(['user', 'address', 'orderItems.product'])->findOrFail($id);
        return view('admin.order-detail', compact('order'));
    }

    // Memperbarui status dan resi
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,dibayar,diproses,siap_ambil,dikirim,selesai,dibatalkan,terkirim',
            'resi' => 'nullable|string|max:255',
        ]);

        $order->status = $request->status;
        
        // Simpan resi jika diisi (biasanya untuk status dikirim)
        if ($request->filled('resi')) {
            $order->resi = $request->resi;
        }

        $order->save();

        return back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}