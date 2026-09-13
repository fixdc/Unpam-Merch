<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - UNPAM Merch</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between h-full shrink-0">
        <div>
            <!-- Logo -->
            <div class="h-16 flex items-center px-6 border-b border-gray-100">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold mr-3">
                    U
                </div>
                <div>
                    <h1 class="font-jakarta font-bold text-gray-900 leading-none">unpam.merch</h1>
                    <span class="text-[10px] text-gray-500 font-semibold tracking-wider">ADMIN CONSOLE</span>
                </div>
            </div>

            <!-- Menu -->
            <nav class="p-4 space-y-1">
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition">
                    <span class="mr-3">📊</span> Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition">
                    <span class="mr-3">📦</span> Pesanan & Transaksi
                </a>
                <!-- Menu Aktif Dipindah ke Sini -->
                <a href="#" class="flex items-center px-4 py-2.5 bg-blue-600 text-white rounded-lg font-semibold text-sm transition shadow-sm">
                    <span class="mr-3">🛍️</span> Manajemen Produk
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition">
                    <span class="mr-3">📈</span> Laporan Keuangan
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition">
                    <span class="mr-3">👥</span> Pelanggan
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition">
                    <span class="mr-3">🎟️</span> Diskon & Voucher
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition">
                    <span class="mr-3">⚙️</span> Pengaturan
                </a>
            </nav>
        </div>

        <!-- Store Status Bottom -->
        <div class="p-4">
            <div class="bg-gray-50 p-3 rounded-xl border border-gray-100 flex items-center justify-between">
                <div class="flex items-center">
                    <span class="mr-2 text-gray-500">🏪</span>
                    <div class="leading-tight">
                        <p class="text-xs font-bold text-gray-800">Store Offline Pickup</p>
                        <p class="text-[10px] text-gray-500">Gedung Viktor Lt. 1</p>
                    </div>
                </div>
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">

        <!-- TOP NAVBAR -->
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 shrink-0">
            <!-- Search Global -->
            <div class="relative w-96">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">🔍</span>
                <input type="text" placeholder="Cari menu, pesanan, atau pelanggan..."
                    class="w-full bg-gray-50 text-sm border-none rounded-full pl-10 pr-4 py-2 focus:ring-2 focus:ring-blue-100 outline-none transition">
            </div>

            <!-- Profile & Status -->
            <div class="flex items-center gap-6">
                <div class="flex items-center px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs font-bold border border-green-100">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> Toko Buka (Live)
                </div>
                <div class="flex items-center gap-3 border-l border-gray-200 pl-6">
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-900 leading-none">(Nama Admin)</p>
                        <p class="text-xs text-gray-500">store@unpam.ac.id</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" alt="Profile" class="w-9 h-9 rounded-full object-cover">
                </div>
            </div>
        </header>

        <!-- PAGE CONTENT SCROLLABLE AREA -->
        <div class="flex-1 overflow-auto p-8">

            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-jakarta font-extrabold text-gray-900">Manajemen Produk</h2>
                    <p class="text-gray-500 text-sm mt-1">Kelola katalog merchandise, harga, dan ketersediaan stok.</p>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                    <span>+</span> Tambah Produk Baru
                </button>
            </div>

            <!-- TABEL & FILTER CARD -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">

                <!-- Filter Controls -->
                <div class="p-6 border-b border-gray-100 bg-white flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    
                    <!-- Search Produk -->
                    <div class="relative w-full lg:w-1/3">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">🔍</span>
                        <input type="text" placeholder="Cari nama produk atau SKU..."
                            class="w-full bg-white border border-gray-200 text-sm rounded-lg pl-9 pr-4 py-2.5 focus:ring-2 focus:ring-blue-100 focus:border-blue-500 outline-none transition">
                    </div>

                    <!-- Filter Dropdowns -->
                    <div class="flex flex-wrap items-center gap-3">
                        <!-- Kategori -->
                        <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-100 outline-none cursor-pointer">
                            <option value="">Semua Kategori</option>
                            <option value="pakaian">Pakaian</option>
                            <option value="aksesoris">Aksesoris</option>
                            <option value="atk">Alat Tulis</option>
                        </select>
                        
                        <!-- Status -->
                        <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-100 outline-none cursor-pointer">
                            <option value="">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="habis">Stok Habis</option>
                            <option value="draft">Draft</option>
                        </select>

                        <!-- Sort -->
                        <button class="flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-50 transition shadow-sm">
                            <span class="text-xs">⇅</span> Terkini
                        </button>
                    </div>
                </div>

                <!-- Tabel Produk -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50/80 text-gray-500 font-semibold text-xs uppercase tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 whitespace-nowrap">Info Produk</th>
                                <th class="px-6 py-4 whitespace-nowrap">Kategori</th>
                                <th class="px-6 py-4 whitespace-nowrap">Harga Jual</th>
                                <th class="px-6 py-4 whitespace-nowrap">Stok</th>
                                <th class="px-6 py-4 whitespace-nowrap">Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">

                            <!-- Produk 1 (Stok Aman) -->
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-lg bg-gray-100 border border-gray-200 overflow-hidden shrink-0">
                                            <img src="https://placehold.co/100x100/e2e8f0/64748b?text=Image" alt="Varsity" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900 text-sm group-hover:text-blue-600 transition-colors">Varsity Jacket UNPAM</p>
                                            <p class="text-[11px] text-gray-500 mt-0.5">SKU: VJT-UNP-01</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Pakaian</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Rp 185.000</td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-gray-700">45</span> <span class="text-xs text-gray-400">pcs</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-green-100 text-green-700 border border-green-200 rounded-md text-[10px] font-extrabold whitespace-nowrap">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="text-gray-400 hover:text-blue-600 transition" title="Edit">✏️</button>
                                        <button class="text-gray-400 hover:text-red-600 transition" title="Hapus">🗑️</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Produk 2 (Stok Menipis) -->
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-lg bg-gray-100 border border-gray-200 overflow-hidden shrink-0">
                                            <img src="https://placehold.co/100x100/e2e8f0/64748b?text=Image" alt="Lanyard" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900 text-sm group-hover:text-blue-600 transition-colors">Lanyard Exclusive ID</p>
                                            <p class="text-[11px] text-gray-500 mt-0.5">SKU: LYN-UNP-02</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Aksesoris</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Rp 25.000</td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-orange-600">4</span> <span class="text-xs text-gray-400">pcs</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-green-100 text-green-700 border border-green-200 rounded-md text-[10px] font-extrabold whitespace-nowrap">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="text-gray-400 hover:text-blue-600 transition" title="Edit">✏️</button>
                                        <button class="text-gray-400 hover:text-red-600 transition" title="Hapus">🗑️</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Produk 3 (Stok Habis) -->
                            <tr class="hover:bg-blue-50/50 transition-colors group opacity-75">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-lg bg-gray-100 border border-gray-200 overflow-hidden shrink-0 opacity-50 grayscale">
                                            <img src="https://placehold.co/100x100/e2e8f0/64748b?text=Image" alt="Mug" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900 text-sm group-hover:text-blue-600 transition-colors">Mug Keramik Logo</p>
                                            <p class="text-[11px] text-gray-500 mt-0.5">SKU: MUG-UNP-01</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Aksesoris</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Rp 45.000</td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-red-600">0</span> <span class="text-xs text-gray-400">pcs</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-red-50 text-red-600 border border-red-200 rounded-md text-[10px] font-extrabold whitespace-nowrap">
                                        Habis
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="text-gray-400 hover:text-blue-600 transition" title="Edit">✏️</button>
                                        <button class="text-gray-400 hover:text-red-600 transition" title="Hapus">🗑️</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Produk 4 (Draft) -->
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-lg bg-gray-100 border border-gray-200 overflow-hidden shrink-0 border-dashed flex items-center justify-center">
                                            <span class="text-xl text-gray-300">📷</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-500 text-sm group-hover:text-blue-600 transition-colors">Tote Bag Kanvas (New)</p>
                                            <p class="text-[11px] text-gray-400 mt-0.5">SKU: TTB-UNP-03</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Aksesoris</td>
                                <td class="px-6 py-4 font-bold text-gray-500">-</td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-gray-500">-</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-gray-100 text-gray-600 border border-gray-200 rounded-md text-[10px] font-extrabold whitespace-nowrap">
                                        Draft
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="text-gray-400 hover:text-blue-600 transition" title="Edit">✏️</button>
                                        <button class="text-gray-400 hover:text-red-600 transition" title="Hapus">🗑️</button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- Footer Tabel / Pagination -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                    <p class="text-xs font-semibold text-gray-500">Menampilkan 1-4 dari 48 produk</p>
                    <div class="flex items-center gap-1">
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-400 hover:bg-gray-50 shadow-sm transition" disabled>❮</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-blue-600 text-white font-bold shadow-sm transition">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold shadow-sm transition">2</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 shadow-sm transition">❯</button>
                    </div>
                </div>

            </div>

        </div>
    </main>
</body>

</html>