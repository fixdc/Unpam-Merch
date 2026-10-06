<aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between h-full">
    <div>
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="w-8 mr-3">
            <div>
                <h1 class="font-jakarta font-bold text-gray-900 leading-none">u.merch</h1>
                <span class="text-[10px] text-gray-500 font-semibold tracking-wider">
                    {{ auth()->check() && auth()->user()->role === 'admin' ? 'ADMIN CONSOLE' : 'CUSTOMER PANEL' }}
                </span>
            </div>
        </div>

        <!-- Menu -->
        <nav class="p-4 space-y-1">
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ url('admin/dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/dashboard') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-chart-pie mr-3 text-lg w-5 text-center"></i> Dashboard Admin
                </a>
                <a href="{{ url('admin/orders') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/orders*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-box-open mr-3 text-lg w-5 text-center"></i> Kelola Pesanan
                </a>
                <a href="{{ url('admin/product') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/product*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-bag-shopping mr-3 text-lg w-5 text-center"></i> Manajemen Produk
                </a>
                <a href="{{ url('admin/category') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/category*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-tags mr-3 text-lg w-5 text-center"></i> Kategori Produk
                </a>
                <a href="{{ url('admin/articles') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/articles*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-newspaper mr-3 text-lg w-5 text-center"></i> Manajemen Article
                </a>
                <a href="{{ url('admin/articlecategories') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/articlecategories*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-folder-open mr-3 text-lg w-5 text-center"></i> Kategori Article
                </a>
                <a href="{{ url('admin/laporan') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/laporan*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-file-invoice-dollar mr-3 text-lg w-5 text-center"></i> Laporan Keuangan
                </a>
                <a href="{{ url('admin/users') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/users*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-users mr-3 text-lg w-5 text-center"></i> Data Pelanggan
                </a>
                <a href="{{ url('admin/vouchers') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/vouchers*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-ticket mr-3 text-lg w-5 text-center"></i> Diskon & Voucher
                </a>
                <a href="{{ url('admin/settings') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('admin/settings*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-gear mr-3 text-lg w-5 text-center"></i> Pengaturan
                </a>

            @else
                <!-- ================= MENU KHUSUS USER / PEMBELI ================= -->
                <a href="{{ url('dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('dashboard') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-house mr-3 text-lg w-5 text-center"></i> Dashboard
                </a>
                <a href="{{ url('orders') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('orders*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-box mr-3 text-lg w-5 text-center"></i> Pesanan Saya
                </a>
                <a href="{{ url('carts') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('carts*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-cart-shopping mr-3 text-lg w-5 text-center"></i> Keranjang
                </a>
                <a href="{{ url('profile') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm transition {{ request()->is('profile*') ? 'bg-blue-600 text-white font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 font-medium' }}">
                    <i class="fa-solid fa-user mr-3 text-lg w-5 text-center"></i> Profil Saya
                </a>
            @endif
        </nav>
    </div>

    <!-- Store Status Bottom -->
    <div class="p-4">
        <div class="bg-gray-50 p-3 rounded-xl border border-gray-100 flex items-center justify-between">
            <div class="flex items-center">
                <i class="fa-solid fa-store mr-3 text-gray-500 text-lg w-5 text-center"></i>
                <div class="leading-tight">
                    <p class="text-xs font-bold text-gray-800">Store Offline Pickup</p>
                    <p class="text-[10px] text-gray-500">Gedung Viktor Lt. 1</p>
                </div>
            </div>
            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
        </div>
    </div>
</aside>