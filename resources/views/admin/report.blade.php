<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - Admin UNPAM Merch</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>
<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        @include('components.admin_navbar')

        <div class="flex-1 overflow-auto p-8">
            <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Laporan Keuangan</h2>
                    <p class="text-gray-500 text-sm mt-1">Filter dan unduh data pendapatan berdasarkan rentang waktu.</p>
                </div>
                
                <!-- Tombol Cetak & Export (Membawa parameter tanggal saat ini) -->
                <div class="flex gap-2">
                    <a href="{{ route('admin.report.pdf', ['start_date' => $startDate, 'end_date' => $endDate]) }}" target="_blank" class="px-4 py-2 bg-red-50 text-red-600 hover:bg-red-100 font-bold rounded-lg text-sm transition flex items-center gap-2">
                        <i class="fa-solid fa-file-pdf"></i> Cetak PDF
                    </a>
                    <a href="{{ route('admin.report.excel', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="px-4 py-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-100 font-bold rounded-lg text-sm transition flex items-center gap-2">
                        <i class="fa-solid fa-file-excel"></i> Export Excel
                    </a>
                </div>
            </div>

            <!-- Form Filter Tanggal -->
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm mb-6">
                <form action="{{ route('admin.report.index') }}" method="GET" class="flex flex-col md:flex-row items-end gap-4">
                    <div class="w-full md:w-auto">
                        <label class="block text-xs font-bold text-gray-600 mb-1">Dari Tanggal</label>
                        <input type="date" name="start_date" value="{{ $startDate }}" class="bg-gray-50 border border-gray-200 text-sm rounded-lg px-4 py-2.5 outline-none focus:border-blue-500 w-full">
                    </div>
                    <div class="w-full md:w-auto">
                        <label class="block text-xs font-bold text-gray-600 mb-1">Sampai Tanggal</label>
                        <input type="date" name="end_date" value="{{ $endDate }}" class="bg-gray-50 border border-gray-200 text-sm rounded-lg px-4 py-2.5 outline-none focus:border-blue-500 w-full">
                    </div>
                    <div class="w-full md:w-auto">
                        <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg text-sm transition shadow-sm">
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Ringkasan Filter -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 text-white shadow-md">
                    <p class="text-blue-100 text-sm font-medium mb-1">Total Pendapatan (Selesai)</p>
                    <h3 class="text-3xl font-extrabold">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                    <p class="text-gray-500 text-sm font-medium mb-1">Total Pesanan Sukses</p>
                    <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalOrders }} <span class="text-lg text-gray-400 font-medium">Transaksi</span></h3>
                </div>
            </div>

            <!-- Tabel Data Laporan -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider">
                                <th class="p-4 font-semibold">ID Pesanan</th>
                                <th class="p-4 font-semibold">Tanggal</th>
                                <th class="p-4 font-semibold">Pelanggan</th>
                                <th class="p-4 font-semibold">Metode</th>
                                <th class="p-4 font-semibold">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @forelse($orders as $order)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="p-4 font-bold text-gray-900">{{ $order->order_number }}</td>
                                <td class="p-4 text-gray-500">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td class="p-4">{{ $order->user->name }}</td>
                                <td class="p-4"><span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-[10px] font-bold uppercase">{{ $order->metode_pembayaran }}</span></td>
                                <td class="p-4 font-bold text-emerald-600">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">Tidak ada data transaksi sukses pada rentang tanggal ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</body>
</html>