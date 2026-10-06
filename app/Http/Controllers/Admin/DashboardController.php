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
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Metrik Pendapatan
        $totalRevenue = Order::where('status', 'selesai')->sum('total_harga');
        
        $monthlyRevenue = Order::where('status', 'selesai')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total_harga');
        
        $totalProductsSold = OrderItem::whereHas('order', function ($query) {
            $query->where('status', 'selesai');
        })->sum('quantity');

        // Metrik Pesanan
        $needsProcessingCount = Order::where('status', 'pending')->count();
        $readyForPickupCount = Order::where('status', 'siap_ambil')->count();
        $activeOrdersCount = $needsProcessingCount + $readyForPickupCount + Order::whereIn('status', ['diproses', 'dikirim', 'terkirim'])->count();

        // Produk Terlaris (Diperbarui status pencariannya menjadi 'selesai')
        $topProducts = Product::withCount(['orderItems as total_sold' => function ($query) {
                $query->whereHas('order', function ($q) {
                    $q->where('status', 'selesai');
                });
            }])
            ->orderByDesc('total_sold')
            ->take(3)
            ->get();

        $recentOrders = Order::with('user')->latest()->take(5)->get();

        // Data Grafik: Mingguan (7 Hari Terakhir)
        $weeklyLabels = collect(range(6, 0))->map(fn($days) => Carbon::now()->subDays($days)->format('d M'))->toArray();
        $weeklyData = [];
        foreach (range(6, 0) as $days) {
            $date = Carbon::now()->subDays($days)->toDateString();
            $weeklyData[] = Order::where('status', 'selesai')->whereDate('created_at', $date)->sum('total_harga');
        }

        // Data Grafik: Bulanan (Jan - Des Tahun Ini)
        $monthlyLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
        $monthlyData = [];
        for ($m = 1; $m <= 12; $m++) {
            $monthlyData[] = Order::where('status', 'selesai')
                ->whereMonth('created_at', $m)
                ->whereYear('created_at', $currentYear)
                ->sum('total_harga');
        }

        return view('admin.dashboard', compact(
            'admin',
            'totalRevenue',
            'monthlyRevenue',
            'totalProductsSold',
            'activeOrdersCount',
            'needsProcessingCount',
            'readyForPickupCount',
            'topProducts',
            'recentOrders',
            'weeklyLabels',
            'weeklyData',
            'monthlyLabels',
            'monthlyData'
        ));
    }
}