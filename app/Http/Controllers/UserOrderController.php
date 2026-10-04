<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

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
}