<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - UNPAM Merch</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tambahkan library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: { fontFamily: { jakarta: ['"Plus Jakarta Sans"', 'sans-serif'], } }
            }
        }
    </script>
</head>
<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        @include('components.admin_navbar')

        <div class="flex-1 overflow-auto p-6 md:p-8">
            
            <div class="mb-8">
                <h2 class="text-2xl font-extrabold text-gray-900">Selamat Datang, {{ explode(' ', $admin->name)[0] }} 👋</h2>
                <p class="text-gray-500 text-sm mt-1">Pantau performa omset harian, arus kas kasir, serta manajemen pesanan merchandise kampus.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Pendapatan</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-[10px] font-bold">Sukses</span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-900 mb-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h4>
                        <p class="text-xs text-gray-400">Akumulasi seluruh penjualan</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pendapatan Bulan Ini</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-[10px] font-bold">Sukses</span>
                        </div>
                        <!-- Memanggil variabel $monthlyRevenue yang baru ditambahkan -->
                        <h4 class="text-3xl font-bold text-gray-900 mb-1">Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}</h4>
                        <p class="text-xs text-gray-400">Penjualan bulan berjalan</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Produk Terjual</h3>
                            <span class="p-1.5 bg-blue-50 text-blue-600 rounded-md text-[10px]"><i class="fa-solid fa-box"></i></span>
                        </div>
                        <div class="flex items-baseline gap-1 mb-1">
                            <h4 class="text-3xl font-bold text-gray-900">{{ $totalProductsSold }}</h4>
                            <span class="text-sm font-semibold text-gray-500">pcs</span>
                        </div>
                        <p class="text-xs text-gray-400">Merchandise yang telah diterima</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pesanan Aktif</h3>
                            <span class="p-1.5 bg-orange-50 text-orange-600 rounded-md text-[10px]"><i class="fa-solid fa-spinner"></i></span>
                        </div>
                        <div class="flex items-baseline gap-1 mb-1">
                            <h4 class="text-3xl font-bold text-gray-900">{{ $activeOrdersCount }}</h4>
                            <span class="text-sm font-semibold text-gray-500">Antrian</span>
                        </div>
                        <p class="text-xs text-gray-400">Total pesanan berjalan</p>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        <div class="bg-blue-50 rounded-lg p-2 text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Perlu Diproses</p>
                            <p class="text-lg font-bold text-blue-600 leading-none">{{ $needsProcessingCount }}</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-2 text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Siap Ambil</p>
                            <p class="text-lg font-bold text-green-600 leading-none">{{ $readyForPickupCount }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex flex-col">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="font-bold text-gray-900">Grafik Pendapatan<br><span class="text-sm font-normal text-gray-500">Merchandise UNPAM</span></h3>
                        <div class="flex bg-gray-100 p-1 rounded-lg">
                            <button id="btn-mingguan" onclick="updateChart('mingguan')" class="px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-md shadow-sm transition">Mingguan</button>
                            <button id="btn-bulanan" onclick="updateChart('bulanan')" class="px-4 py-1.5 text-gray-500 text-xs font-bold rounded-md hover:text-gray-700 transition">Bulanan</button>
                        </div>
                    </div>
                    <!-- Area Chart.js -->
                    <div class="h-64 w-full relative">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-1">Produk Terlaris</h3>
                    <p class="text-xs text-gray-500 mb-4">Berdasarkan Total Terjual</p>
                    
                    <div class="space-y-4">
                        @forelse($topProducts as $index => $product)
                        <div class="flex items-center gap-3">
                            <span class="text-lg font-bold text-gray-300 w-4">{{ $index + 1 }}</span>
                            <div class="w-12 h-12 rounded-lg bg-gray-50 border border-gray-100 flex items-center justify-center overflow-hidden">
                                @if(is_array($product->image) && count($product->image) > 0)
                                    <img src="{{ asset('storage/' . $product->image[0]) }}" class="w-full h-full object-cover">
                                @else
                                    <i class="fa-solid fa-shirt text-gray-300"></i>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-gray-900 line-clamp-1">{{ $product->nama }}</h4>
                                <p class="text-xs text-gray-500">{{ $product->total_sold ?? 0 }} Terjual</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-sm text-gray-500 text-center py-4">Belum ada data penjualan.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Pesanan Terbaru</h3>
                        <p class="text-sm text-gray-500">Pantau dan kelola transaksi yang baru masuk.</p>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-bold rounded-lg transition">Lihat Semua</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                                <th class="pb-3 font-semibold">ID Pesanan</th>
                                <th class="pb-3 font-semibold">Pembeli</th>
                                <th class="pb-3 font-semibold">Total Harga</th>
                                <th class="pb-3 font-semibold">Status</th>
                                <th class="pb-3 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($recentOrders as $order)
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 font-bold text-gray-900">{{ $order->order_number }}</td>
                                <td class="py-4 text-gray-600">{{ $order->user->name ?? 'User' }}</td>
                                <td class="py-4 font-medium text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                <td class="py-4">
                                    @if($order->status == 'pending') <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded text-[10px] font-bold uppercase">Pending</span>
                                    @elseif(in_array($order->status, ['dibayar', 'diproses'])) <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded text-[10px] font-bold uppercase">Diproses</span>
                                    @elseif($order->status == 'siap_ambil') <span class="px-2.5 py-1 bg-purple-50 text-purple-600 rounded text-[10px] font-bold uppercase">Siap Ambil</span>
                                    @elseif($order->status == 'dikirim') <span class="px-2.5 py-1 bg-indigo-50 text-indigo-600 rounded text-[10px] font-bold uppercase">Dikirim</span>
                                    @elseif($order->status == 'terkirim') <span class="px-2.5 py-1 bg-cyan-50 text-cyan-600 rounded text-[10px] font-bold uppercase">Terkirim</span>
                                    @elseif($order->status == 'selesai') <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded text-[10px] font-bold uppercase">Selesai</span>
                                    @else <span class="px-2.5 py-1 bg-red-50 text-red-600 rounded text-[10px] font-bold uppercase">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td class="py-4 text-right">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600 font-bold hover:underline">Kelola</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-gray-500">Belum ada pesanan yang masuk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- Script Pengaturan Chart.js -->
    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');
        
        const weeklyLabels = {!! json_encode($weeklyLabels) !!};
        const weeklyData = {!! json_encode($weeklyData) !!};
        const monthlyLabels = {!! json_encode($monthlyLabels) !!};
        const monthlyData = {!! json_encode($monthlyData) !!};

        let revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: weeklyLabels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: weeklyData,
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#2563eb',
                    pointBorderColor: '#ffffff',
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, border: { display: false } },
                    x: { grid: { display: false } }
                }
            }
        });

        function updateChart(type) {
            const btnMingguan = document.getElementById('btn-mingguan');
            const btnBulanan = document.getElementById('btn-bulanan');

            if (type === 'mingguan') {
                revenueChart.data.labels = weeklyLabels;
                revenueChart.data.datasets[0].data = weeklyData;
                
                // Ubah gaya tombol
                btnMingguan.className = "px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-md shadow-sm transition";
                btnBulanan.className = "px-4 py-1.5 text-gray-500 text-xs font-bold rounded-md hover:text-gray-700 transition";
            } else {
                revenueChart.data.labels = monthlyLabels;
                revenueChart.data.datasets[0].data = monthlyData;
                
                // Ubah gaya tombol
                btnBulanan.className = "px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-md shadow-sm transition";
                btnMingguan.className = "px-4 py-1.5 text-gray-500 text-xs font-bold rounded-md hover:text-gray-700 transition";
            }
            revenueChart.update();
        }
    </script>
</body>
</html>