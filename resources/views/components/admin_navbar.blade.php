<header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 sm:px-6 lg:px-8 shrink-0">
    
    <!-- BAGIAN KIRI: Hamburger, Tombol Home, dan Search Bar -->
    <div class="flex items-center gap-3 md:gap-5">

        <!-- Tombol Home -->
        <div>
            <a href="/home" class="bg-blue-500 text-white px-3 py-2 md:px-4 md:py-2 rounded-md hover:bg-blue-700 transition-all flex items-center justify-center gap-2 text-xs md:text-sm font-medium">
                <i class="fa-solid fa-arrow-left-long"></i>
                <!-- Teks "Home" disembunyikan di layar sangat kecil agar tidak makan tempat -->
                <span class="hidden sm:inline">Home</span>
            </a>
        </div>

        <!-- Search Bar (Disembunyikan di Mobile, Muncul di Tablet/Desktop) -->
        <div class="relative hidden md:block md:w-56 lg:w-96">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 py-2">🔍</span>
            <input type="text" placeholder="Cari artikel, kategori..."
                class="w-full bg-gray-50 text-sm border-none rounded-full pl-10 pr-4 py-2 focus:ring-2 focus:ring-blue-100 outline-none transition">
        </div>
    </div>

    <!-- BAGIAN KANAN: Ikon Mobile & Profil User -->
    <div class="flex items-center gap-4">
        
        <!-- Ikon Search Mobile (Sebagai ganti search bar yang disembunyikan) -->
        <button class="md:hidden text-gray-500 hover:text-blue-600">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>

        <div class="flex items-center gap-3 md:border-l border-gray-200 md:pl-6">
            <!-- Teks Nama & Email (Disembunyikan di Mobile, hanya menampilkan Avatar) -->
            <div class="text-right hidden sm:block">
                <p class="text-sm font-bold text-gray-900 leading-none">{{ Auth::user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->email ?? 'store@unpam.ac.id' }}</p>
            </div>
            
            <!-- Avatar Profil -->
            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? 'Admin') . '&background=0D8ABC&color=fff' }}" 
                alt="Profile"
                class="w-8 h-8 md:w-9 md:h-9 rounded-full object-cover border border-gray-100 shadow-sm">
        </div>
    </div>
</header>