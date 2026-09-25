<header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 shrink-0">
    <div class="flex items-center gap-5">
        <div>
            <a href="/home" class="bg-blue-500 text-white px-4 py-1.5 rounded-md hover:bg-blue-700 transition-all ">←
                Home</a>
        </div>
        <div class="relative w-96">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">🔍</span>
            <input type="text" placeholder="Cari artikel, kategori, atau penulis..."
                class="w-full bg-gray-50 text-sm border-none rounded-full pl-10 pr-4 py-2 focus:ring-2 focus:ring-blue-100 outline-none transition">
        </div>
    </div>

    <div class="flex items-center gap-6">
        <div class="flex items-center gap-3 border-l border-gray-200 pl-6">
            <div class="text-right">
                <p class="text-sm font-bold text-gray-900 leading-none">{{ Auth::user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->email ?? 'store@unpam.ac.id' }}</p>
            </div>
            <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" alt="Profile"
                class="w-9 h-9 rounded-full object-cover">
        </div>
    </div>
</header>