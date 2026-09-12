<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNPAM Merchandise</title>
    
    <!-- Import Google Fonts: Plus Jakarta Sans & Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<!-- Tambahkan class font-manrope di body -->
<body class="antialiased font-manrope text-gray-900 bg-gray-50">

<!-- Top Notification Banner -->
        <div class="bg-blue-600 text-white text-[11px] sm:text-xs py-2 px-4 text-center font-medium flex items-center justify-center gap-2">
            <i class="fa-solid fa-truck-fast"></i> Gratis Ongkir ke Seluruh Kampus UNPAM Min. Rp50.000 & Free Exclusive Sticker Pack! <i class="fa-solid fa-circle-check text-white"></i>
        </div>

        <!-- Navigation Bar -->
        <header class="bg-white border-b border-slate-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                
            <!-- Left: UNPAM Logo -->
                    <div class="flex items-center gap-3 sm:gap-4">
                        <div class="flex items-center gap-2">
                            <img src="aset/Code_Generated_Image.png" alt="Logo UNPAM" class="h-14 w-auto object-contain">
                        </div>
                    </div>

                    <!-- Center Nav Links -->
                    <nav class="hidden md:flex items-center space-x-1 font-semibold text-xs">
                        <a href="#" class="bg-blue-600 text-white px-5 py-2 rounded-full shadow-sm">Home</a>
                        <a href="#" class="text-slate-600 hover:text-blue-600 px-4 py-2 transition">Product</a>
                        <a href="#" class="text-slate-600 hover:text-blue-600 px-4 py-2 transition">About Us</a>
                        <a href="#" class="text-slate-600 hover:text-blue-600 px-4 py-2 transition">FAQ</a>
                        <a href="#" class="text-slate-600 hover:text-blue-600 px-4 py-2 transition">Contact</a>
                    </nav>

            <!-- Right Search & Icons -->
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="hidden lg:flex items-center bg-slate-100 rounded-full px-4 py-2 w-64 border border-slate-200/60 focus-within:border-blue-400">
                            <i class="fa-solid fa-magnifying-glass text-slate-400 mr-2 text-xs"></i>
                            <input type="text" placeholder="Cari hoodie, almamater, kaos..." class="bg-transparent text-xs w-full focus:outline-none text-slate-700">
                        </div>
                        
                        <!-- Wishlist Button: Latar Putih, Gambar Lebih Besar, Badge Real-time -->
                        <a href="#" class="relative w-11 h-11 rounded-full bg-white hover:bg-slate-50 border border-slate-200 flex items-center justify-center transition shadow-sm">
                            <!-- Gambar diperbesar ukurannya -->
                            <img src="aset/logo-wishlist.png" alt="Wishlist" class="w-6 h-6 object-contain">
                            <!-- Badge angka terpisah untuk real-time -->
                            <span id="wishlist-badge" class="absolute -top-1 -right-1 bg-rose-500 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold shadow-md border-2 border-white">2</span>
                        </a>

                        <!-- Shopping Bag Button: Latar Putih, Gambar Lebih Besar, Badge Real-time -->
                        <a href="#" class="relative w-11 h-11 rounded-full bg-white hover:bg-slate-50 border border-slate-200 flex items-center justify-center transition shadow-sm">
                            <!-- Gambar diperbesar ukurannya -->
                            <img src="aset/logo-keranjang.png" alt="Keranjang" class="w-6 h-6 object-contain">
                            <!-- Badge angka terpisah untuk real-time -->
                            <span id="cart-badge" class="absolute -top-1 -right-1 bg-amber-400 text-slate-900 text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold shadow-md border-2 border-white">3</span>
                        </a>

                        <!-- User Profile Button: Latar Putih, Gambar Lebih Besar -->
                        <a href="#" class="relative w-11 h-11 rounded-full bg-white hover:bg-slate-50 border border-slate-200 flex items-center justify-center transition shadow-sm">
                            <!-- Gambar diperbesar ukurannya -->
                            <img src="aset/logo-profil.png" alt="Profil" class="w-6 h-6 object-contain">
                        </a>
                    </div>
            </header>

        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <div class="bg-gradient-to-r from-blue-50/80 via-sky-50/40 to-blue-50/60 rounded-3xl p-6 sm:p-10 lg:p-12 border border-blue-100/80 shadow-sm grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                
                <!-- Hero Text -->
                <div>
                    <div class="inline-flex items-center gap-2 bg-white px-3.5 py-1.5 rounded-full text-[11px] font-bold text-blue-600 shadow-sm mb-6 border border-blue-100">
                        <i class="fa-solid fa-sparkles"></i> OFFICIAL MERCHANDISE UNPAM <i class="fa-solid fa-arrow-right text-[9px]"></i>
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-[1.15] mb-4">
                        Gaya Kampus, Kebanggaan Kita. Tampil <span class="text-blue-600 underline decoration-blue-300">Stylish & Keren!</span>
                    </h1>
                    <p class="text-slate-600 text-xs sm:text-sm mb-8 leading-relaxed">
                        Temukan berbagai pilihan atribut resmi Universitas Pamulang mulai dari jaket almamater, hoodie, kaos eksklusif, hingga aksesoris kampus berkualitas tinggi.
                    </p>
                    <div class="flex flex-wrap items-center gap-3 sm:gap-4 mb-8">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3.5 rounded-full shadow-lg shadow-blue-600/20 transition text-xs flex items-center gap-2">
                            Belanja Sekarang <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </button>
                        <button class="bg-white hover:bg-slate-50 text-blue-600 font-bold px-6 py-3.5 rounded-full border border-blue-200 transition text-xs flex items-center gap-2 shadow-sm">
                            <i class="fa-solid fa-graduation-cap"></i> Lihat Katalog Prodi
                        </button>
                    </div>
                    
                    <!-- Badges -->
                    <div class="grid grid-cols-3 gap-2 pt-4 border-t border-blue-200/50 text-[11px] font-semibold text-slate-600">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-blue-600"></i> 100% Original Kampus</div>
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-blue-600"></i> Bahan Premium & Nyaman</div>
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-blue-600"></i> Khusus Civitas UNPAM</div>
                    </div>
                </div>

                <!-- Hero Image Banner -->
                <div class="relative">
                    <div class="bg-white/90 backdrop-blur-md rounded-2xl p-4 shadow-lg border border-white">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=800" alt="UNPAM Merch Bundle" class="rounded-xl w-full h-[280px] sm:h-[320px] object-cover">
                        <div class="mt-4 flex items-center justify-between">
                            <span class="bg-blue-50 text-blue-600 font-bold text-[11px] px-3 py-1 rounded-full">Koleksi Terlaris 2026</span>
                            <div class="flex items-center text-[11px] font-bold text-slate-700 bg-slate-50 px-3 py-1 rounded-full border border-slate-100">
                                <i class="fa-solid fa-star text-amber-400 mr-1"></i> 4.9 / 5.0 <span class="text-slate-400 font-normal ml-1">Rating Mahasiswa</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Product Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center mb-6">
                <span class="text-[11px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full">KATALOG EKSKLUSIF</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-3">Merchandise Pilihan Wajib Mahasiswa UNPAM</h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-1 max-w-md mx-auto">Lengkapi hari-harimu di kampus dengan atribut resmi yang keren dan nyaman dipakai.</p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex items-center justify-center gap-2 flex-wrap mb-8">
                <button class="bg-blue-600 text-white font-bold text-xs px-5 py-2.5 rounded-full shadow-sm">Semua</button>
                <button class="bg-white text-slate-600 hover:bg-slate-50 font-semibold text-xs px-5 py-2.5 rounded-full border border-slate-200 transition shadow-sm">Hoodie & Jaket</button>
                <button class="bg-white text-slate-600 hover:bg-slate-50 font-semibold text-xs px-5 py-2.5 rounded-full border border-slate-200 transition shadow-sm">Kaos Kampus</button>
                <button class="bg-white text-slate-600 hover:bg-slate-50 font-semibold text-xs px-5 py-2.5 rounded-full border border-slate-200 transition shadow-sm">Totebag & Tas</button>
                <button class="bg-white text-slate-600 hover:bg-slate-50 font-semibold text-xs px-5 py-2.5 rounded-full border border-slate-200 transition shadow-sm">Aksesoris & Lainya</button>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm hover:shadow-md transition flex flex-col justify-between relative group">
                    <span class="absolute top-5 left-5 bg-sky-50 text-blue-600 text-[10px] font-bold px-2.5 py-1 rounded-md z-10">Bestseller</span>
                    <button class="absolute top-5 right-5 text-slate-300 hover:text-blue-600 z-10"><i class="fa-regular fa-heart text-base"></i></button>
                    <div class="bg-slate-50 rounded-xl p-4 mb-4 flex items-center justify-center h-44 border border-slate-100">
                        <img src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?auto=format&fit=crop&q=80&w=400" alt="Hoodie UNPAM" class="h-32 object-contain group-hover:scale-105 transition">
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Unisex Apparel</span>
                        <h3 class="font-bold text-slate-900 text-xs sm:text-sm mt-0.5">Hoodie Resmi UNPAM Navy</h3>
                        <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">Bahan fleece tebal, lembut, dan hangat dipakai malam hari.</p>
                        <div class="flex items-center gap-1 mt-2 text-xs">
                            <i class="fa-solid fa-star text-amber-400 text-[11px]"></i>
                            <span class="font-bold text-slate-800 text-[11px]">4.9</span>
                            <span class="text-slate-400 text-[11px]">(320 ulasan)</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 block">Harga</span>
                            <span class="font-extrabold text-blue-600 text-sm">Rp165.000</span>
                        </div>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white text-[11px] font-bold px-3.5 py-2 rounded-xl transition flex items-center gap-1 shadow-sm">
                            <i class="fa-solid fa-bag-shopping text-[10px]"></i> Keranjang
                        </button>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm hover:shadow-md transition flex flex-col justify-between relative group">
                    <span class="absolute top-5 left-5 bg-amber-50 text-amber-600 text-[10px] font-bold px-2.5 py-1 rounded-md z-10">Must Have</span>
                    <button class="absolute top-5 right-5 text-slate-300 hover:text-blue-600 z-10"><i class="fa-regular fa-heart text-base"></i></button>
                    <div class="bg-slate-50 rounded-xl p-4 mb-4 flex items-center justify-center h-44 border border-slate-100">
                        <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&q=80&w=400" alt="Kaos UNPAM" class="h-32 object-contain group-hover:scale-105 transition">
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Cotton Combed 30s</span>
                        <h3 class="font-bold text-slate-900 text-xs sm:text-sm mt-0.5">T-Shirt Official UNPAM Kampus</h3>
                        <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">Adem, menyerap keringat, cocok untuk kuliah harian.</p>
                        <div class="flex items-center gap-1 mt-2 text-xs">
                            <i class="fa-solid fa-star text-amber-400 text-[11px]"></i>
                            <span class="font-bold text-slate-800 text-[11px]">4.8</span>
                            <span class="text-slate-400 text-[11px]">(510 ulasan)</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 block">Harga</span>
                            <span class="font-extrabold text-blue-600 text-sm">Rp85.000</span>
                        </div>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white text-[11px] font-bold px-3.5 py-2 rounded-xl transition flex items-center gap-1 shadow-sm">
                            <i class="fa-solid fa-bag-shopping text-[10px]"></i> Keranjang
                        </button>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm hover:shadow-md transition flex flex-col justify-between relative group">
                    <span class="absolute top-5 left-5 bg-purple-50 text-purple-600 text-[10px] font-bold px-2.5 py-1 rounded-md z-10">Trending</span>
                    <button class="absolute top-5 right-5 text-slate-300 hover:text-blue-600 z-10"><i class="fa-regular fa-heart text-base"></i></button>
                    <div class="bg-slate-50 rounded-xl p-4 mb-4 flex items-center justify-center h-44 border border-slate-100">
                        <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&q=80&w=400" alt="Totebag UNPAM" class="h-32 object-contain group-hover:scale-105 transition">
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Canvas Premium</span>
                        <h3 class="font-bold text-slate-900 text-xs sm:text-sm mt-0.5">Totebag Kanvas Eksklusif UNPAM</h3>
                        <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">Kuat muat laptop dan buku tebal, stylish dibawa ke kelas.</p>
                        <div class="flex items-center gap-1 mt-2 text-xs">
                            <i class="fa-solid fa-star text-amber-400 text-[11px]"></i>
                            <span class="font-bold text-slate-800 text-[11px]">4.9</span>
                            <span class="text-slate-400 text-[11px]">(180 ulasan)</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 block">Harga</span>
                            <span class="font-extrabold text-blue-600 text-sm">Rp45.000</span>
                        </div>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white text-[11px] font-bold px-3.5 py-2 rounded-xl transition flex items-center gap-1 shadow-sm">
                            <i class="fa-solid fa-bag-shopping text-[10px]"></i> Keranjang
                        </button>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm hover:shadow-md transition flex flex-col justify-between relative group">
                    <span class="absolute top-5 left-5 bg-teal-50 text-teal-600 text-[10px] font-bold px-2.5 py-1 rounded-md z-10">New Item</span>
                    <button class="absolute top-5 right-5 text-slate-300 hover:text-blue-600 z-10"><i class="fa-regular fa-heart text-base"></i></button>
                    <div class="bg-slate-50 rounded-xl p-4 mb-4 flex items-center justify-center h-44 border border-slate-100">
                        <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&q=80&w=400" alt="Lanyard UNPAM" class="h-32 object-contain group-hover:scale-105 transition">
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Accessory</span>
                        <h3 class="font-bold text-slate-900 text-xs sm:text-sm mt-0.5">Lanyard & ID Card Holder UNPAM</h3>
                        <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">Tali ID card tebal dengan sablon logo kampus anti luntur.</p>
                        <div class="flex items-center gap-1 mt-2 text-xs">
                            <i class="fa-solid fa-star text-amber-400 text-[11px]"></i>
                            <span class="font-bold text-slate-800 text-[11px]">4.7</span>
                            <span class="text-slate-400 text-[11px]">(240 ulasan)</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 block">Harga</span>
                            <span class="font-extrabold text-blue-600 text-sm">Rp25.000</span>
                        </div>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white text-[11px] font-bold px-3.5 py-2 rounded-xl transition flex items-center gap-1 shadow-sm">
                            <i class="fa-solid fa-bag-shopping text-[10px]"></i> Keranjang
                        </button>
                    </div>
                </div>

            </div>

            <!-- Lihat Semua Button -->
            <div class="text-center mt-10">
                <button class="border border-blue-300 text-blue-600 hover:bg-blue-50 font-bold px-8 py-3 rounded-full text-xs transition inline-flex items-center gap-2 shadow-sm">
                    Lihat Semua Koleksi Merchandise UNPAM <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </button>
            </div>
        </section>

        <!-- Cerita Kami Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-10 lg:p-12 shadow-sm grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full"><i class="fa-solid fa-book-open"></i> TENTANG KAMI</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-3 leading-snug">
                        Wadah Resmi Kebanggaan Civitas Akademika <span class="text-blue-600">UNPAM</span>
                    </h2>
                    <p class="text-slate-600 text-xs sm:text-sm mt-4 leading-relaxed">
                        App Unpam Merch hadir sebagai platform resmi penyediaan atribut dan buah tangan universitas. Kami berkomitmen menyediakan produk berkualitas tinggi yang merefleksikan identitas dan kebanggaan mahasiswa Universitas Pamulang.
                    </p>

                    <div class="space-y-3 mt-6">
                        <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="bg-blue-100 text-blue-600 p-2.5 rounded-xl text-sm"><i class="fa-solid fa-shield-halved"></i></div>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-slate-900">Produk Resmi & Berlisensi</h4>
                                <p class="text-[11px] text-slate-500 mt-0.5">Seluruh desain dan atribut telah disesuaikan dengan standar identitas resmi universitas.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="bg-blue-100 text-blue-600 p-2.5 rounded-xl text-sm"><i class="fa-solid fa-tags"></i></div>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-slate-900">Harga Ramah Mahasiswa</h4>
                                <p class="text-[11px] text-slate-500 mt-0.5">Kualitas distro premium dengan harga khusus yang ramah di kantong mahasiswa.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="bg-blue-100 text-blue-600 p-2.5 rounded-xl text-sm"><i class="fa-solid fa-truck-fast"></i></div>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-slate-900">Pengiriman Cepat & Ambil di Kampus</h4>
                                <p class="text-[11px] text-slate-500 mt-0.5">Pilih opsi kirim ke rumah atau ambil langsung di gerai resmi kampus.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Image Banner -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&q=80&w=800" alt="UNPAM Campus Life" class="rounded-2xl shadow-md w-full h-[360px] sm:h-[420px] object-cover">
                    <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-md px-4 py-2 rounded-full shadow-md text-[11px] font-bold text-slate-700 flex items-center gap-1.5 border border-slate-100">
                        <i class="fa-solid fa-graduation-cap text-blue-600"></i> Universitas Pamulang • <span class="text-blue-600">Kampus Unggul</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="max-w-4xl mx-auto px-4 py-12">
            <div class="text-center mb-8">
                <span class="text-[11px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full"><i class="fa-solid fa-circle-question"></i> BANTUAN & INFORMASI</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-3">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">Temukan jawaban seputar pemesanan merchandise, ukuran, dan pengiriman.</p>
            </div>

            <div class="space-y-3">
                <!-- FAQ 1 (Active) -->
                <div class="bg-white border border-blue-200 rounded-2xl p-5 shadow-sm">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="font-bold text-xs sm:text-sm text-slate-900">Bagaimana cara memesan jaket almamater atau hoodie custom prodi?</h3>
                        <i class="fa-solid fa-chevron-up text-blue-600 text-xs"></i>
                    </div>
                    <p class="text-xs text-slate-600 mt-3 pt-3 border-t border-slate-100 leading-relaxed">
                        Kamu cukup pilih produk yang diinginkan, tentukan ukuran (S, M, L, XL, XXL), lalu masukkan ke keranjang belanja atau klik beli langsung melalui aplikasi App Unpam Merch.
                    </p>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="font-bold text-xs sm:text-sm text-slate-900">Apakah produk merchandise ini resmi dari pihak universitas?</h3>
                        <i class="fa-solid fa-chevron-down text-slate-400 text-xs"></i>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="font-bold text-xs sm:text-sm text-slate-900">Bisakah pesanan diambil langsung di area kampus UNPAM?</h3>
                        <i class="fa-solid fa-chevron-down text-slate-400 text-xs"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Footer -->
        <footer class="bg-white py-12 border-t border-slate-100 mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <!-- Col 1 -->
                <div>
                    <a href="#" class="flex items-center gap-1 text-2xl font-black text-blue-600 tracking-tight mb-3">
                        UNPAM <span class="w-2 h-2 rounded-full bg-blue-600 inline-block mb-2"></span>
                    </a>
                    <p class="text-xs text-slate-500 leading-relaxed mb-4">
                        Pusat resmi merchandise dan atribut Universitas Pamulang. Tampil bangga dengan identitas kampus tercinta!
                    </p>
                    <div class="flex space-x-2.5">
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition"><i class="fa-brands fa-instagram text-xs"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition"><i class="fa-brands fa-tiktok text-xs"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition"><i class="fa-brands fa-youtube text-xs"></i></a>
                    </div>
                </div>

                <!-- Col 2 -->
                <div>
                    <h4 class="font-bold text-xs uppercase text-slate-900 tracking-wider mb-3">Kategori Produk</h4>
                    <ul class="space-y-2 text-xs text-slate-500">
                        <li><a href="#" class="hover:text-blue-600 transition">Jaket Almamater</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Hoodie & Sweater</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Kaos Kampus</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Totebag & Tas</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Aksesoris & Lanyard</a></li>
                    </ul>
                </div>

                <!-- Col 3 -->
                <div>
                    <h4 class="font-bold text-xs uppercase text-slate-900 tracking-wider mb-3">Bantuan & Info</h4>
                    <ul class="space-y-2 text-xs text-slate-500">
                        <li><a href="#" class="hover:text-blue-600 transition">Cara Pesan</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Panduan Ukuran (Size Chart)</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Pengiriman & Resi</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Col 4 -->
                <div>
                    <h4 class="font-bold text-xs uppercase text-slate-900 tracking-wider mb-3">Newsletter UNPAM Merch</h4>
                    <p class="text-xs text-slate-500 mb-3">Dapatkan info promo diskon dan rilis produk merchandise terbaru.</p>
                    <div class="flex flex-col space-y-2">
                        <input type="email" placeholder="Ketik alamat emailmu..." class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs focus:outline-none focus:border-blue-500 text-slate-800">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-xl text-xs transition shadow-sm">Berlangganan</button>
                    </div>
                </div>

            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400">
                <p>© 2026 App Unpam Merch. Universitas Pamulang.</p>
                <div class="flex space-x-6 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-blue-600 transition">Privacy Policy</a>
                    <a href="#" class="hover:text-blue-600 transition">Terms & Conditions</a>
                </div>
            </div>
        </footer>

</body>
</html>