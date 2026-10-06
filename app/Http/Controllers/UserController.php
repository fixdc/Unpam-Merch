<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Mengambil pesanan aktif (status: pending, diproses, atau siap_diambil)
        $activeOrders = Order::with(['items.product'])
            ->where('user_id', $user->id)
            ->whereIn('status', ['pending', 'diproses', 'siap_di_ambil', 'dikirim', 'dibayar'])
            ->latest()
            ->get();

        // Mengambil pesanan selesai
        $completedOrders = Order::with(['items.product'])
            ->where('user_id', $user->id)
            ->where('status', 'selesai')
            ->latest()
            ->get();

        // Menghitung total belanja dari pesanan yang selesai
        $totalSpent = $completedOrders->sum('total_harga');
        $completedCount = $completedOrders->count();

        // Menghitung voucher aktif (asumsi tabel vouchers punya kolom status/expiry)
        $activeVouchersCount = Voucher::where('is_active', 1)->count();

        return view('users.dashboard', compact(
            'user', 
            'activeOrders', 
            'completedOrders', 
            'totalSpent', 
            'completedCount',
            'activeVouchersCount'
        ));
    }
}
