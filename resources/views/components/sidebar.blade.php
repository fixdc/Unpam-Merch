<aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between h-full">
    <div>
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="w-8 mr-3">
            <div>
                <h1 class="font-jakarta font-bold text-gray-900 leading-none">unpam.merch</h1>
                <span class="text-[10px] text-gray-500 font-semibold tracking-wider">
                    {{ auth()->check() && auth()->user()->role === 'admin' ? 'ADMIN CONSOLE' : 'CUSTOMER PANEL' }}
                </span>
            </div>
        </div>

        <!-- Menu -->
        <nav class="p-4 space-y-1">
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ url('admin/dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/dashboard') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📊</span> Dashboard Admin
                </a>
                <a href="{{ url('admin/orders') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/orders*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📦</span> Kelola Pesanan
                </a>
                <a href="{{ url('admin/product') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/product*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">🛍️</span> Manajemen Produk
                </a>
                <a href="{{ url('admin/category') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/category*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📁</span> Kategori Produk
                </a>
                <a href="{{ url('admin/product') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/product*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">🛍️</span> Manajemen Article
                </a>
                <a href="{{ url('admin/category') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/category*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📁</span> Kategori Article
                </a>
                <a href="{{ url('admin/cashflow') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/cashflow*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📈</span> Laporan Keuangan
                </a>
                <a href="{{ url('admin/users') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/users*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">👥</span> Data Pelanggan
                </a>
                <a href="{{ url('admin/discount') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/discount*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">🎟️</span> Diskon & Voucher
                </a>
                <a href="{{ url('admin/settings') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/settings*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">⚙️</span> Pengaturan
                </a>

            @else
                <!-- ================= MENU KHUSUS USER / PEMBELI ================= -->
                <a href="{{ url('dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('dashboard') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">🏠</span> Beranda / Dashboard
                </a>
                <a href="{{ url('my-orders') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('my-orders*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">📦</span> Pesanan Saya
                </a>
                <a href="{{ url('shop') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('shop*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">🛍️</span> Katalog Merchandise
                </a>
                <a href="{{ url('profile') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('profile*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <span class="mr-3">👤</span> Profil Saya
                </a>
            @endif
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