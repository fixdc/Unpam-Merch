<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Default: Awal bulan sampai akhir bulan ini
        $startDate = $request->start_date ?? Carbon::now()->startOfMonth()->toDateString();
        $endDate = $request->end_date ?? Carbon::now()->endOfMonth()->toDateString();

        // Ambil data pesanan yang 'selesai' berdasarkan rentang tanggal
        $orders = Order::with('user')
            ->where('status', 'selesai')
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->latest()
            ->get();

        $totalRevenue = $orders->sum('total_harga');
        $totalOrders = $orders->count();

        return view('admin.report', compact('orders', 'totalRevenue', 'totalOrders', 'startDate', 'endDate'));
    }

    public function exportPdf(Request $request)
    {
        $startDate = $request->start_date ?? Carbon::now()->startOfMonth()->toDateString();
        $endDate = $request->end_date ?? Carbon::now()->endOfMonth()->toDateString();

        $orders = Order::with('user')
            ->where('status', 'selesai')
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->oldest()
            ->get();

        $totalRevenue = $orders->sum('total_harga');

        return view('admin.report-print', compact('orders', 'totalRevenue', 'startDate', 'endDate'));
    }

    public function exportExcel(Request $request)
    {
        $startDate = $request->start_date ?? Carbon::now()->startOfMonth()->toDateString();
        $endDate = $request->end_date ?? Carbon::now()->endOfMonth()->toDateString();

        $orders = Order::with('user')
            ->where('status', 'selesai')
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->oldest()
            ->get();

        $fileName = 'Laporan_Keuangan_UNPAM_' . $startDate . '_sd_' . $endDate . '.csv';

        // Header agar browser mengenali ini sebagai file download excel/csv
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        // Tulis data ke file stream CSV
        $callback = function() use($orders) {
            $file = fopen('php://output', 'w');
            // Header Kolom Excel
            fputcsv($file, ['ID Pesanan', 'Tanggal Transaksi', 'Nama Pelanggan', 'Metode Pembayaran', 'Total Harga (Rp)']);

            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->order_number,
                    $order->created_at->format('Y-m-d H:i:s'),
                    $order->user->name ?? 'User',
                    $order->metode_pembayaran,
                    $order->total_harga
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}