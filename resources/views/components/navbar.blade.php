<!-- Navigation Bar -->
<header class="bg-white border-b border-slate-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">

        <!-- Left: UNPAM Logo -->
        <div class="flex items-center gap-3 sm:gap-4">
            <div class="flex items-center gap-2">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo UNPAM" class="h-8 w-auto object-contain">
                <h1 class="text-xl font-bold text-slate-800">UNPAM Merchandise</h1>
            </div>
        </div>

        <!-- Center Nav Links -->
        <nav class="hidden md:flex items-center space-x-1 font-semibold text-xs">
            <!-- Home (aktif jika di halaman root '/' atau '/home') -->
            <a href="{{ url('/') }}"
                class="{{ request()->is('/') || request()->is('home') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-600 hover:text-blue-600 transition' }} px-5 py-2 rounded-full">Home</a>

            <!-- Product (aktif jika URL-nya mengandung /product) -->
            <a href="{{ url('/product') }}"
                class="{{ request()->is('product*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-600 hover:text-blue-600 transition' }} px-4 py-2 rounded-full">Product</a>

            <!-- Tracking (ganti href-nya nanti kalau halamannya udah ada) -->
            <a href="#"
                class="{{ request()->is('tracking*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-600 hover:text-blue-600 transition' }} px-4 py-2 rounded-full">Tracking</a>

            <!-- Contact (ganti href-nya nanti kalau halamannya udah ada) -->
            <a href="#"
                class="{{ request()->is('contact*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-600 hover:text-blue-600 transition' }} px-4 py-2 rounded-full">Contact</a>
        </nav>

        <!-- Right Search & Icons -->
        <div class="flex items-center space-x-2 sm:space-x-3">
            <div
                class="hidden lg:flex items-center bg-slate-100 rounded-full px-4 py-2 w-64 border border-slate-200/60 focus-within:border-blue-400">
                <i class="fa-solid fa-magnifying-glass text-slate-400 mr-2 text-xs"></i>
                <input type="text" placeholder="Cari hoodie, almamater, kaos..."
                    class="bg-transparent text-xs w-full focus:outline-none text-slate-700">
            </div>



            {{-- <!-- Shopping Bag Button: Latar Putih, Gambar Lebih Besar, Badge Real-time -->
            <a href="#"
                class="relative w-11 h-11 rounded-full bg-white hover:bg-slate-50 border border-slate-200 flex items-center justify-center transition shadow-sm">
                <!-- Gambar diperbesar ukurannya -->
                <img src="aset/logo-keranjang.png" alt="Keranjang" class="w-6 h-6 object-contain">
                <!-- Badge angka terpisah untuk real-time -->
                <span id="cart-badge"
                    class="absolute -top-1 -right-1 bg-amber-400 text-slate-900 text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold shadow-md border-2 border-white">3</span>
            </a> --}}

            <!-- User Profile Button: Latar Putih, Gambar Lebih Besar -->
            {{-- <a href="#"
                class="relative w-11 h-11 rounded-full bg-white hover:bg-slate-50 border border-slate-200 flex items-center justify-center transition shadow-sm">
                <!-- Gambar diperbesar ukurannya -->
                <img src="aset/logo-profil.png" alt="Profil" class="w-6 h-6 object-contain">
            </a> --}}
            <div>
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-2 bg-white border border-slate-200 px-3.5 py-2 rounded-lg text-slate-700 hover:bg-slate-50 transition font-medium text-xs shadow-sm">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-slate-500 transition-transform" :class="{ 'rotate-180': open }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown Content -->
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white border border-slate-200 rounded-xl shadow-lg py-1.5 z-50 text-xs">
                            <div class="px-4 py-2 border-b border-slate-100">
                                <p class="text-slate-400 text-[10px]">Masuk sebagai</p>
                                <p class="font-semibold text-slate-800 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="{{ url('/admin/dashboard') }}"
                                class="block px-4 py-2 text-slate-700 hover:bg-slate-100 transition">Dashboard</a>

                            <form action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition font-medium">
                                    Keluar (Logout)
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Tombol Login Jika Belum Login -->
                    <a href="{{ url('login') }}"
                        class="bg-blue-600 px-4 py-2 text-white rounded-md font-extrabold hover:bg-blue-700 transition text-xs shadow-md">
                        Login
                    </a>
                @endauth
            </div>
        </div>
</header>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>