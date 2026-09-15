<aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between h-full">
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
                <a href="{{ url('admin/dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/dashboard') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📊</span> Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/orders') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📦</span> Pesanan & Transaksi
                </a>
                <a href="{{ url('admin/product') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/product') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">🛍️</span> Manajemen Produk
                </a>
                <a href="{{ url('admin/category') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/category') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">🛍️</span> Manajemen Kategori
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/cashflow') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📈</span> Laporan Keuangan
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/users') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">👥</span> Pelanggan
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/discount') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">🎟️</span> Diskon & Voucher
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/settings') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
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