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
            <a href="{{ url('/articles') }}"
                class="{{ request()->is('articles*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-600 hover:text-blue-600 transition' }} px-4 py-2 rounded-full">Article</a>

            <a href="#"
                class="{{ request()->is('tracking*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-600 hover:text-blue-600 transition' }} px-4 py-2 rounded-full">Tracking</a>
        </nav>

        <!-- Right Search & Icons -->
        <div class="flex items-center space-x-2 sm:space-x-3">
            <!-- Wrapper Dropdown Cart dengan Alpine.js -->
            <div x-data="{ openCart: false }" class="relative">

                <!-- Tombol Trigger Keranjang -->
                <button @click="openCart = !openCart"
                    class="relative w-11 h-11 rounded-full bg-white hover:bg-slate-50 border border-slate-200 flex items-center justify-center transition shadow-sm outline-none">
                    <i class="fa-solid fa-bag-shopping text-slate-700"></i>

                    <!-- Badge angka dinamis -->
                    @if(isset($cartItems) && $cartItems->count() > 0)
                        <span id="cart-badge-icon"
                            class="absolute -top-1 -right-1 bg-amber-400 text-slate-900 text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold shadow-md border-2 border-white">
                            {{ $cartItems->count() }}
                        </span>
                    @endif
                </button>

                <!-- Dropdown Menu Keranjang -->
                <div x-show="openCart" @click.outside="openCart = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-3"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-3" style="display: none;"
                    class="absolute right-0 mt-3 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 z-50 flex flex-col overflow-hidden">

                    <!-- Header Cart -->
                    <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between bg-white">
                        <h3 class="font-extrabold text-slate-900 text-sm">Keranjang Belanja</h3>
                        <span id="cart-header-count"
                            class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-md">
                            {{ isset($cartItems) ? $cartItems->count() : 0 }} Item
                        </span>
                    </div>

                    <!-- List Cart Dinamis -->
                    <div id="cart-items-container" class="max-h-64 overflow-y-auto p-2 scrollbar-thin scrollbar-thumb-slate-200">
                        @if(isset($cartItems) && $cartItems->count() > 0)
                            @foreach ($cartItems as $cart)
                                <!-- Wrapper Item Cart dengan Alpine state untuk slide dan ID dinamis (cart-row) untuk AJAX -->
                                <div id="cart-row-{{ $cart->id }}" x-data="{ slide: false, startX: 0 }"
                                    class="relative overflow-hidden mb-2 rounded-xl bg-slate-100">

                                    <!-- LAYER BELAKANG: Tombol Aksi (Hapus, Kurang, Tambah) -->
                                    <div class="absolute inset-y-0 right-0 flex items-center justify-end pr-3 gap-2 w-[135px]">
                                        <!-- Tombol Kurang (Menggunakan onclick AJAX) -->
                                        <button type="button" onclick="updateCartAction('decrement', {{ $cart->id }})"
                                            class="w-8 h-8 flex items-center justify-center bg-white border border-slate-200 text-slate-600 rounded-lg shadow-sm hover:bg-slate-50 transition active:scale-95">
                                            <i class="fa-solid fa-minus text-[10px]"></i>
                                        </button>

                                        <!-- Tombol Tambah (Menggunakan onclick AJAX) -->
                                        <button type="button" onclick="updateCartAction('increment', {{ $cart->id }})"
                                            class="w-8 h-8 flex items-center justify-center bg-white border border-slate-200 text-slate-600 rounded-lg shadow-sm hover:bg-slate-50 transition active:scale-95">
                                            <i class="fa-solid fa-plus text-[10px]"></i>
                                        </button>

                                        <!-- Tombol Hapus (Menggunakan onclick AJAX) -->
                                        <button type="button" onclick="updateCartAction('remove', {{ $cart->id }})"
                                            class="w-8 h-8 flex items-center justify-center bg-red-50 border border-red-200 text-red-600 rounded-lg shadow-sm hover:bg-red-100 transition active:scale-95">
                                            <i class="fa-solid fa-trash-can text-[10px]"></i>
                                        </button>
                                    </div>

                                    <!-- LAYER DEPAN: Konten Utama Produk yang digeser -->
                                    <div class="relative flex items-center gap-3 p-3 bg-white border border-slate-100 rounded-xl transition-transform duration-300 ease-in-out cursor-pointer hover:bg-slate-50 z-10 shadow-sm"
                                        :class="slide ? '-translate-x-[140px]' : 'translate-x-0'"
                                        @touchstart="startX = $event.touches[0].clientX"
                                        @touchend="if (startX - $event.changedTouches[0].clientX > 30) { slide = true } else if ($event.changedTouches[0].clientX - startX > 30) { slide = false }"
                                        @click="slide = !slide" title="Klik atau geser untuk melihat aksi">

                                        <!-- Gambar Produk -->
                                        <div
                                            class="w-14 h-14 bg-slate-100 rounded-lg overflow-hidden shrink-0 border border-slate-200 p-1 flex items-center justify-center pointer-events-none">
                                            @php
                                                $img = $cart->product->image ?? null;
                                                if (is_string($img)) {
                                                    $decoded = json_decode($img, true);
                                                    $img = is_array($decoded) ? $decoded : [$img];
                                                }
                                            @endphp

                                            @if(!empty($img) && isset($img[0]))
                                                <img src="{{ asset('storage/' . $img[0]) }}" alt="{{ $cart->product->nama }}"
                                                    class="w-full h-full object-contain">
                                            @else
                                                <i class="fa-solid fa-box text-slate-300 text-xl"></i>
                                            @endif
                                        </div>

                                        <!-- Detail Produk -->
                                        <div class="flex-1 min-w-0 pointer-events-none">
                                            <h4 class="text-xs font-bold text-slate-900 truncate">
                                                {{ $cart->product->nama }}
                                            </h4>
                                            <div class="flex items-center gap-2 mt-1">
                                                <!-- Tambahan ID 'qty-text' agar bisa diubah Javascript -->
                                                <span id="qty-text-{{ $cart->id }}"
                                                    class="text-[10px] font-medium text-slate-500">
                                                    {{ $cart->qty }} x Rp
                                                    {{ number_format($cart->product->harga, 0, ',', '.') }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Subtotal Item & Indikator -->
                                        <div class="flex items-center gap-2 pointer-events-none shrink-0">
                                            <!-- Tambahan ID 'subtotal-text' agar bisa diubah Javascript -->
                                            <div id="subtotal-text-{{ $cart->id }}" class="text-xs font-black text-slate-800">
                                                Rp {{ number_format($cart->product->harga * $cart->qty, 0, ',', '.') }}
                                            </div>
                                            <div class="text-slate-300 text-xs">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-6 text-center text-slate-400 text-xs font-medium">
                                Keranjang belanjamu masih kosong.
                            </div>
                        @endif
                    </div>

                    <!-- Footer Cart (Total & Checkout) -->
                    <div class="p-5 border-t border-slate-100 bg-slate-50/80">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-semibold text-slate-500">Total Pembayaran</span>
                            <span id="cart-grand-total" class="text-base font-black text-blue-600">
                                Rp {{ number_format($totalHargaCart ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                        <div class="grid grid-cols-2 gap-2 justify-end">
                            <a href="/checkout"
                                class="col-span-2 text-center py-2.5 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 {{ (isset($cartItems) && $cartItems->count() == 0) ? 'pointer-events-none opacity-50' : '' }}">
                                Checkout <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

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

                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <a href="{{ url('/admin/dashboard') }}"
                                    class="block px-4 py-2 text-slate-700 hover:bg-slate-100 transition">Dashboard</a>
                            @else
                                <a href="{{ url('/user/dashboard') }}"
                                    class="block px-4 py-2 text-slate-700 hover:bg-slate-100 transition">Dashboard</a>
                            @endif

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
<script>
    // Fungsi untuk memformat angka jadi format Rupiah (ex: 100.000)
    const formatRupiah = (number) => {
        return new Intl.NumberFormat('id-ID').format(number);
    };

    function updateCartAction(action, cartId) {
        let url = '';
        let method = 'POST'; // Increment & Decrement pake POST

        if (action === 'increment') url = `/cart/increment/${cartId}`;
        else if (action === 'decrement') url = `/cart/decrement/${cartId}`;
        else if (action === 'remove') {
            url = `/cart/remove/${cartId}`;
            method = 'DELETE'; // Hapus pake DELETE
        }

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token keamanan wajib Laravel
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update Grand Total
                    let grandTotalEl = document.getElementById('cart-grand-total');
                    if (grandTotalEl) grandTotalEl.innerText = `Rp ${formatRupiah(data.total_harga)}`;

                    if (action === 'remove') {
                        // Hilangkan baris produk perlahan jika dihapus
                        let row = document.getElementById(`cart-row-${cartId}`);
                        if (row) row.remove();

                        // Update total item di badge
                        let badgeIcon = document.getElementById('cart-badge-icon');
                        let headerCount = document.getElementById('cart-header-count');

                        if (badgeIcon) badgeIcon.innerText = data.total_items;
                        if (headerCount) headerCount.innerText = `${data.total_items} Item`;

                    } else {
                        // Jika increment / decrement, update teks QTY dan Subtotal baris tersebut
                        let qtyText = document.getElementById(`qty-text-${cartId}`);
                        let subtotalText = document.getElementById(`subtotal-text-${cartId}`);

                        // Kita ambil harga satuan awal dari text dengan split 
                        let currentText = qtyText.innerText;
                        let hargaSatuan = currentText.split('x')[1].trim();

                        if (qtyText) qtyText.innerText = `${data.qty} x ${hargaSatuan}`;
                        if (subtotalText) subtotalText.innerText = `Rp ${formatRupiah(data.subtotal)}`;
                    }
                }
            })
            .catch(error => console.error('Error updating cart:', error));
    }
</script>