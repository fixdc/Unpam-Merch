<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - UNPAM Merch</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        @include('components.admin_navbar')

        <!-- DASHBOARD SCROLLABLE AREA -->
        <div class="flex-1 overflow-auto p-6 md:p-8">
            
            <!-- Welcome Title -->
            <div class="mb-8">
                <h2 class="text-2xl font-extrabold text-gray-900">Selamat Datang, {{ explode(' ', $admin->name)[0] }} 👋</h2>
                <p class="text-gray-500 text-sm mt-1">Pantau performa omset harian, arus kas kasir, serta manajemen pesanan merchandise kampus.</p>
            </div>

            <!-- 4 METRIC CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                
                <!-- Card 1: Pendapatan -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Pendapatan</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-[10px] font-bold">Sukses</span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-900 mb-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h4>
                        <p class="text-xs text-gray-400">Akumulasi penjualan terverifikasi</p>
                    </div>
                    <a href="#" class="mt-4 block w-full py-2 bg-blue-50 hover:bg-blue-100 text-blue-600 text-center font-bold text-xs rounded-lg transition">
                        Laporan Keuangan →
                    </a>
                </div>

                <!-- Card 2: Saldo Siap Ditarik -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Saldo Operasional</h3>
                            <span class="flex items-center text-[10px] font-bold text-green-700 bg-green-100 px-2 py-1 rounded-md">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></span> Ready
                            </span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-900 mb-1">Rp {{ number_format($readyBalance, 0, ',', '.') }}</h4>
                        <p class="text-xs text-gray-400">Estimasi siap cair</p>
                    </div>
                    <a href="#" class="mt-4 block w-full py-2 bg-blue-50 hover:bg-blue-100 text-blue-600 text-center font-bold text-xs rounded-lg transition">
                        Pencairan Dana →
                    </a>
                </div>

                <!-- Card 3: Produk Terjual -->
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
                    <div class="mt-4 flex justify-between items-center text-xs font-semibold">
                        <span class="flex items-center text-gray-600"><span class="mr-1">🚚</span> Status Pengiriman</span>
                    </div>
                </div>

                <!-- Card 4: Pesanan Berjalan -->
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

            <!-- CHARTS & LIST ROW -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                
                <!-- Grafik (Visual Placeholder) -->
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex flex-col">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="font-bold text-gray-900">Grafik Pendapatan<br><span class="text-sm font-normal text-gray-500">Merchandise (Mockup)</span></h3>
                        <div class="flex bg-gray-100 p-1 rounded-lg">
                            <button class="px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-md shadow-sm">Harian</button>
                            <button class="px-4 py-1.5 text-gray-500 text-xs font-bold rounded-md hover:text-gray-700 hover:bg-blue-500 hover:text-white">Bulanan</button>
                        </div>
                    </div>
                    <div class="h-48 w-full bg-gradient-to-t from-blue-50 to-transparent relative border-b border-gray-200 flex-1">
                        <svg class="absolute bottom-0 w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                            <path d="M0,80 Q20,60 40,70 T80,40 T100,50 L100,100 L0,100 Z" fill="rgba(37, 99, 235, 0.1)" stroke="#2563eb" stroke-width="0.5"/>
                        </svg>
                    </div>
                    <div class="flex justify-between text-[10px] text-gray-400 font-bold mt-3 px-2">
                        <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
                    </div>
                </div>

                <!-- Produk Terlaris -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-1">Produk Terlaris</h3>
                    <p class="text-xs text-gray-500 mb-4">Berdasarkan Total Terjual</p>
                    
                    <div class="space-y-4">
                        @forelse($topProducts as $index => $product)
                        <div class="flex items-center gap-3">
                            <span class="text-lg font-bold text-gray-300 w-4">{{ $index + 1 }}</span>
                            <img src="{{ asset('storage/' . ($product->image[0] ?? $product->image)) }}" class="w-12 h-12 rounded-lg object-cover bg-gray-100">
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

            <!-- BOTTOM TABLE: Pesanan Terbaru -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Pesanan Terbaru</h3>
                        <p class="text-sm text-gray-500">Pantau dan kelola transaksi yang baru masuk.</p>
                    </div>
                    <a href="#" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-bold rounded-lg transition">Lihat Semua</a>
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
                                <td class="py-4 font-bold text-gray-900">#{{ $order->invoice_number ?? $order->id }}</td>
                                <td class="py-4 text-gray-600">{{ $order->user->name ?? 'User' }}</td>
                                <td class="py-4 font-medium text-gray-900">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td class="py-4">
                                    @if($order->status == 'pending')
                                        <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-xs font-bold">Pending</span>
                                    @elseif($order->status == 'ready_for_pickup')
                                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-bold">Siap Ambil</span>
                                    @elseif($order->status == 'completed')
                                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-bold">Selesai</span>
                                    @else
                                        <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-bold">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td class="py-4 text-right">
                                    <a href="#" class="text-blue-600 font-bold hover:underline">Kelola</a>
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
</body>
</html>