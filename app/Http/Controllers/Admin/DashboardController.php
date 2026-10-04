<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        $totalRevenue = Order::where('status', 'completed')->sum('total_harga');
        
        $readyBalance = $totalRevenue * 0.8; 

        $totalProductsSold = OrderItem::whereHas('order', function ($query) {
            $query->where('status', 'completed');
        })->sum('quantity'); // Pastikan nama kolom quantity di tabel order_items kamu benar (qty atau quantity)

        $needsProcessingCount = Order::where('status', 'pending')->count();
        $readyForPickupCount = Order::where('status', 'ready_for_pickup')->count();
        $activeOrdersCount = $needsProcessingCount + $readyForPickupCount + Order::where('status', 'processing')->count();

        $topProducts = Product::withCount(['orderItems as total_sold' => function ($query) {
                $query->whereHas('order', function ($q) {
                    $q->where('status', 'completed');
                });
            }])
            ->orderByDesc('total_sold')
            ->take(3)
            ->get();

        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'admin',
            'totalRevenue',
            'readyBalance',
            'totalProductsSold',
            'activeOrdersCount',
            'needsProcessingCount',
            'readyForPickupCount',
            'topProducts',
            'recentOrders'
        ));
    }
}