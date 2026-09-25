<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - UNPAM Merch</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        @include('components.admin_navbar')

        <!-- DASHBOARD SCROLLABLE AREA -->
        <div class="flex-1 overflow-auto p-8">
            
            <!-- Welcome Title -->
            <div class="mb-8">
                <h2 class="text-2xl font-jakarta font-extrabold text-gray-900">Selamat Datang, (Nama Admin)</h2>
                <p class="text-gray-500 text-sm mt-1">Pantau performa omset harian, arus kas kasir, serta manajemen pesanan merchandise kampus.</p>
            </div>

            <!-- 4 METRIC CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-4">
                
                <!-- Card 1: Pendapatan -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Pendapatan Bersih</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-[10px] font-bold">+ 18.4%</span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-900 mb-1">Rp 20.000</h4>
                        <p class="text-xs text-gray-400">Akumulasi penjualan kotor terverifikasi</p>
                    </div>
                    <button class="mt-4 w-full py-2 bg-blue-50 hover:bg-blue-100 text-blue-600 font-bold text-xs rounded-lg transition">
                        Manajemen Keuangan →
                    </button>
                </div>

                <!-- Card 2: Saldo Siap Ditarik -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Saldo Siap Ditarik</h3>
                            <span class="flex items-center text-[10px] font-bold text-green-700 bg-green-100 px-2 py-1 rounded-md">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></span> Ready
                            </span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-900 mb-1">Rp 20.000</h4>
                        <p class="text-xs text-gray-400">Payout</p>
                    </div>
                    <button class="mt-4 w-full py-2 bg-blue-50 hover:bg-blue-100 text-blue-600 font-bold text-xs rounded-lg transition">
                        Pencairan Dana →
                    </button>
                </div>

                <!-- Card 3: Produk Terjual -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Produk Terjual</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-[10px] font-bold">+ 12.1%</span>
                        </div>
                        <div class="flex items-baseline gap-1 mb-1">
                            <h4 class="text-3xl font-bold text-gray-900">48</h4>
                            <span class="text-sm font-semibold text-gray-500">pcs</span>
                        </div>
                        <p class="text-xs text-gray-400">Merchandise</p>
                    </div>
                    <div class="mt-4 flex justify-between items-center text-xs font-semibold">
                        <span class="flex items-center text-gray-600"><span class="mr-1">🚚</span> 94% Terkirim Sukses</span>
                        <span class="text-gray-400">Target: 2k pcs</span>
                    </div>
                </div>

                <!-- Card 4: Pesanan Berjalan -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between mb-2 items-center">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pesanan Aktif</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-[10px] font-bold">+ 12.1%</span>
                        </div>
                        <div class="flex items-baseline gap-1 mb-1">
                            <h4 class="text-3xl font-bold text-gray-900">12</h4>
                            <span class="text-sm font-semibold text-gray-500">Pesanan</span>
                        </div>
                        <p class="text-xs text-gray-400">Jumlah Pesanan Berjalan</p>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        <div class="bg-blue-50 rounded-lg p-2 text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Perlu Diproses</p>
                            <p class="text-lg font-bold text-blue-600 leading-none">4</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-2 text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Siap Ambil/Kirim</p>
                            <p class="text-lg font-bold text-green-600 leading-none">8</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- CHARTS & LIST ROW -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                
                <!-- Grafik -->
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="font-bold text-gray-900">Grafik Pendapatan<br><span class="text-sm font-normal text-gray-500">Merchandise</span></h3>
                        <div class="flex bg-gray-100 p-1 rounded-lg">
                            <button class="px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-md shadow-sm">Harian</button>
                            <button class="px-4 py-1.5 text-gray-500 text-xs font-bold rounded-md hover:text-gray-700 hover:bg-blue-500 hover:text-white">Bulanan</button>
                        </div>
                    </div>
                    <!-- Placeholder Chart (You can replace this with Chart.js or ApexCharts) -->
                    <div class="h-48 w-full bg-gradient-to-t from-blue-50 to-transparent relative border-b border-gray-200">
                        <svg class="absolute bottom-0 w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                            <path d="M0,80 Q20,60 40,70 T80,40 T100,50 L100,100 L0,100 Z" fill="rgba(37, 99, 235, 0.1)" stroke="#2563eb" stroke-width="0.5"/>
                            <path d="M0,90 Q20,80 40,85 T80,70 T100,60" fill="none" stroke="#93c5fd" stroke-width="0.5"/>
                        </svg>
                        <!-- Tooltip Mock -->
                        <div class="absolute top-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-[10px] font-bold px-2 py-1 rounded">Rp 14.200.000</div>
                    </div>
                    <div class="flex justify-between text-[10px] text-gray-400 font-bold mt-3 px-2">
                        <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                    </div>
                </div>

                <!-- Produk Terlaris -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-1">Produk Terlaris</h3>
                    <p class="text-xs text-gray-500 mb-4">Bulan Ini</p>
                    
                    <div class="space-y-3">
                        <div class="h-16 bg-blue-600 rounded-xl w-full"></div>
                        <div class="h-16 bg-gray-200 rounded-xl w-full"></div>
                        <div class="h-16 bg-gray-200 rounded-xl w-full"></div>
                    </div>
                </div>
            </div>

            <!-- BOTTOM TABLE PLACEHOLDER -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex justify-between items-start">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Transaksi Aktif & Manajemen Pesanan</h3>
                    <p class="text-sm text-gray-500">Pantau dan manajemen pesanan merchandise kampus.</p>
                </div>
                <div class="space-y-2 w-1/3">
                    <div class="h-6 bg-gray-200 rounded-md w-full"></div>
                    <div class="h-6 bg-gray-200 rounded-md w-3/4 ml-auto"></div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>