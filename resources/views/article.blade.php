<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editorial & Panduan Gaya UNPAM Store - Merchandise Resmi</title>

  <!-- Import Google Fonts: Plus Jakarta Sans & Manrope -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- FontAwesome 6 CDN -->
  <link rel="cdnjs" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Memanggil Tailwind dari Laravel -->
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 font-manrope text-slate-900 antialiased min-h-screen">

  <!-- Menampilkan Navbar -->
  @include('components.navbar')

  <!-- Container Utama -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-9">
    
    <!-- 1. Header Section -->
    <header class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
      <div class="space-y-2">
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
          <i class="fa-solid fa-bullhorn text-[11px]"></i>
          <span>Journal & Editorial Merch</span>
        </div>
        <h1 class="font-extrabold text-3xl sm:text-4xl text-slate-900 tracking-tight mt-1 font-[Plus_Jakarta_Sans]">
          Editorial & Panduan Gaya UNPAM Store
        </h1>
        <p class="text-slate-500 text-sm sm:text-base max-w-2xl leading-relaxed">
          Inspirasi outfit kuliah, ulasan bahan merchandise resmi, panduan gaya mahasiswa, tips perawatan apparel, serta kabar rilis produk terbaru UNPAM Store.
        </p>
      </div>

      <div class="flex items-center gap-3 shrink-0">
        <div class="bg-white border border-slate-100 rounded-2xl p-3.5 px-5 shadow-sm flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-lg">
            <i class="fa-solid fa-newspaper text-base"></i>
          </div>
          <div>
            <div class="text-xs font-medium text-slate-500">Total Panduan</div>
            <div class="text-base font-extrabold text-blue-600">24 Artikel & Tips</div>
          </div>
        </div>
        <div class="bg-white border border-slate-100 rounded-2xl p-3.5 px-5 shadow-sm flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 font-bold text-lg">
            <i class="fa-solid fa-award text-base"></i>
          </div>
          <div>
            <div class="text-xs font-medium text-slate-500">Edisi & Katalog</div>
            <div class="text-base font-extrabold text-emerald-600">100% Produk Resmi</div>
          </div>
        </div>
      </div>
    </header>

    <!-- 2. Headline News Banner -->
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700 p-8 sm:p-10 lg:p-12 text-white shadow-xl">
      <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-white/10 blur-3xl pointer-events-none"></div>
      <div class="absolute right-1/4 -bottom-20 w-72 h-72 rounded-full bg-indigo-500/20 blur-2xl pointer-events-none"></div>
      <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>
      
      <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8">
        <div class="space-y-4 max-w-3xl">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-sm border border-white/20 text-xs font-bold uppercase tracking-wider text-amber-300">
            <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span> EDITORIAL PILIHAN • EDISI SPESIAL
          </div>
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-snug font-[Plus_Jakarta_Sans]">
            Panduan Mix & Match Hoodie Signature & Jaket Varsity UNPAM untuk Outfit Kuliah Harian yang Rapi dan Trendy
          </h2>
          <p class="text-blue-100 text-sm sm:text-base leading-relaxed max-w-2xl font-normal">
            Temukan inspirasi padu padan merchandise resmi Universitas Pamulang agar tetap tampil percaya diri di ruang kelas maupun saat kegiatan organisasi. Lengkap dengan rekomendasi paduan warna dan promo bundling mahasiswa.
          </p>
          <div class="flex flex-wrap items-center gap-4 text-xs text-blue-100/90 pt-1 font-medium">
            <span class="inline-flex items-center gap-1.5"><i class="fa-regular fa-calendar-check text-blue-200"></i> Kamis, 24 Oktober 2024</span>
            <span class="opacity-50">•</span>
            <span class="inline-flex items-center gap-1.5"><i class="fa-solid fa-shirt text-blue-200"></i> Tim Fashion & Merch UNPAM Store</span>
            <span class="opacity-50">•</span>
            <span class="inline-flex items-center gap-1.5 text-amber-300 font-semibold"><i class="fa-solid fa-clock"></i> 5 Menit Baca</span>
          </div>
        </div>
        <div class="relative z-10 shrink-0 self-start lg:self-center">
          <a class="inline-flex items-center gap-2.5 bg-white text-blue-700 hover:bg-blue-50 font-bold px-7 py-3.5 rounded-full text-sm sm:text-base shadow-lg hover:shadow-xl transition-all duration-200 active:scale-95 group" href="#">
            <span>Baca Panduan Lengkap</span>
            <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>
      </div>
    </section>

    <!-- 3. Filter & Sort Bar -->
    <section class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
      <div class="flex items-center gap-2.5 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
        <button class="shrink-0 bg-blue-600 text-white rounded-full px-5 py-2.5 font-bold text-sm shadow-md transition">Semua Artikel</button>
        <button class="shrink-0 bg-white border border-slate-200 text-slate-600 hover:border-slate-300 hover:text-slate-900 rounded-full px-5 py-2.5 text-sm font-medium transition shadow-xs">Panduan Gaya & Outfit</button>
        <button class="shrink-0 bg-white border border-slate-200 text-slate-600 hover:border-slate-300 hover:text-slate-900 rounded-full px-5 py-2.5 text-sm font-medium transition shadow-xs">Review Bahan & Kualitas</button>
        <button class="shrink-0 bg-white border border-slate-200 text-slate-600 hover:border-slate-300 hover:text-slate-900 rounded-full px-5 py-2.5 text-sm font-medium transition shadow-xs">Tips Perawatan</button>
      </div>

      <div class="flex items-center justify-between sm:justify-end gap-4 shrink-0">
        <span class="text-xs sm:text-sm text-slate-500 font-medium">Menampilkan <strong class="text-slate-800">1-6</strong> dari 24 panduan</span>
        <div class="relative">
          <select class="appearance-none bg-white border border-slate-200 text-slate-700 text-xs sm:text-sm font-semibold rounded-xl pl-4 pr-9 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent cursor-pointer shadow-sm">
            <option>Urutkan: Terbaru</option>
            <option>Terpopuler</option>
            <option>Prestasi Utama</option>
            <option>Arsip Lama</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500">
            <i class="fa-solid fa-chevron-down text-xs"></i>
          </div>
        </div>
      </div>
    </section>

    <!-- 4. Grand 2-Column News Grid Layout -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Card 1 -->
      <article class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group overflow-hidden">
        <div>
          <div class="w-full h-64 md:h-72 rounded-2xl overflow-hidden relative mb-5 bg-gradient-to-br from-blue-900 via-indigo-800 to-sky-700 flex items-center justify-center p-6 select-none">
            <span class="absolute top-4 left-4 z-10 bg-white/95 backdrop-blur-md text-blue-700 font-extrabold text-xs px-3.5 py-1.5 rounded-full shadow-sm border border-white">
              <i class="fa-solid fa-shirt text-[11px] mr-1"></i> Panduan Outfit
            </span>
            <button class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-600 hover:text-blue-600 flex items-center justify-center transition shadow-sm" title="Simpan Artikel">
              <i class="fa-regular fa-bookmark text-sm"></i>
            </button>
            <div class="relative z-0 text-center flex flex-col items-center justify-center transform group-hover:scale-105 transition-transform duration-500">
              <div class="w-24 h-24 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white shadow-2xl mb-3">
                <i class="fa-solid fa-shirt text-4xl text-cyan-300"></i>
              </div>
              <span class="text-xs font-extrabold uppercase tracking-widest text-cyan-200 bg-black/25 px-3 py-1 rounded-full border border-white/10">COTTON FLEECE 330 GSM</span>
            </div>
          </div>
          <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-3 font-[Plus_Jakarta_Sans]">
            Review Hoodie UNPAM Signature Fleece: Kenapa Jadi Koleksi Best Seller Mahasiswa?
          </h3>
          <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
            Mengupas kenyamanan bahan cotton fleece tebal, ketahanan bordir logo monogram, dan panduan memilih size chart yang pas untuk dipakai kuliah dari pagi hingga malam.
          </p>
        </div>
        <div class="border-t border-slate-100 pt-4 flex items-center justify-between">
          <div class="flex items-center gap-3 text-xs text-slate-500 font-medium">
            <span class="text-slate-700 font-semibold"><i class="fa-regular fa-user text-blue-600 mr-1"></i> UNPAM Merch Lab</span>
            <span>•</span>
            <span><i class="fa-regular fa-calendar text-slate-400 mr-1"></i> 24 Okt 2024</span>
          </div>
          <a class="text-blue-600 hover:text-blue-700 font-bold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center gap-1.5" href="#">
            <span>Baca Selengkapnya</span><i class="fa-solid fa-arrow-right text-xs"></i>
          </a>
        </div>
      </article>

      <!-- Card 2 -->
      <article class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group overflow-hidden">
        <div>
          <div class="w-full h-64 md:h-72 rounded-2xl overflow-hidden relative mb-5 bg-gradient-to-br from-emerald-900 via-teal-800 to-emerald-600 flex items-center justify-center p-6 select-none">
            <span class="absolute top-4 left-4 z-10 bg-white/95 backdrop-blur-md text-emerald-800 font-extrabold text-xs px-3.5 py-1.5 rounded-full shadow-sm border border-white">
              <i class="fa-solid fa-bolt text-[11px] mr-1"></i> Tips Belanja & Hemat
            </span>
            <button class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-600 hover:text-emerald-600 flex items-center justify-center transition shadow-sm" title="Simpan Artikel">
              <i class="fa-regular fa-bookmark text-sm"></i>
            </button>
            <div class="relative z-0 text-center flex flex-col items-center justify-center transform group-hover:scale-105 transition-transform duration-500">
              <div class="w-24 h-24 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white shadow-2xl mb-3">
                <i class="fa-solid fa-graduation-cap text-4xl text-emerald-300"></i>
              </div>
              <span class="text-xs font-extrabold uppercase tracking-widest text-emerald-200 bg-black/25 px-3 py-1 rounded-full border border-white/10">DISKON MAHASISWA 15%</span>
            </div>
          </div>
          <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-3 font-[Plus_Jakarta_Sans]">
            Cara Klaim Diskon Mahasiswa 15% Menggunakan NIM Aktif Saat Beli Merchandise
          </h3>
          <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
            Jangan lewatkan potongan harga spesial khusus civitas akademika UNPAM. Berikut tutorial langkah demi langkah verifikasi kartu mahasiswa di kasir koperasi dan online store.
          </p>
        </div>
        <div class="border-t border-slate-100 pt-4 flex items-center justify-between">
          <div class="flex items-center gap-3 text-xs text-slate-500 font-medium">
            <span class="text-slate-700 font-semibold"><i class="fa-regular fa-user text-emerald-600 mr-1"></i> Admin Toko Kampus</span>
            <span>•</span>
            <span><i class="fa-regular fa-calendar text-slate-400 mr-1"></i> 23 Okt 2024</span>
          </div>
          <a class="text-blue-600 hover:text-blue-700 font-bold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center gap-1.5" href="#">
            <span>Baca Selengkapnya</span><i class="fa-solid fa-arrow-right text-xs"></i>
          </a>
        </div>
      </article>

      <!-- Card 3 -->
      <article class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group overflow-hidden">
        <div>
          <div class="w-full h-64 md:h-72 rounded-2xl overflow-hidden relative mb-5 bg-gradient-to-br from-purple-900 via-indigo-900 to-purple-700 flex items-center justify-center p-6 select-none">
            <span class="absolute top-4 left-4 z-10 bg-white/95 backdrop-blur-md text-purple-800 font-extrabold text-xs px-3.5 py-1.5 rounded-full shadow-sm border border-white">
              <i class="fa-solid fa-handshake text-[11px] mr-1"></i> Perawatan Produk
            </span>
            <button class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-600 hover:text-purple-600 flex items-center justify-center transition shadow-sm" title="Simpan Artikel">
              <i class="fa-regular fa-bookmark text-sm"></i>
            </button>
            <div class="relative z-0 text-center flex flex-col items-center justify-center transform group-hover:scale-105 transition-transform duration-500">
              <div class="w-24 h-24 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white shadow-2xl mb-3">
                <i class="fa-solid fa-layer-group text-4xl text-purple-300"></i>
              </div>
              <span class="text-xs font-extrabold uppercase tracking-widest text-purple-200 bg-black/25 px-3 py-1 rounded-full border border-white/10">COTTON COMBED 24S</span>
            </div>
          </div>
          <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-3 font-[Plus_Jakarta_Sans]">
            Tips Merawat Sablon & Bahan Kaos Cotton Combed 24s Agar Awet Bertahun-tahun
          </h3>
          <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
            Panduan mencuci, menjemur, dan menyetrika t-shirt merchandise kampus agar sablon tidak retak, warna tidak pudar, dan kain tetap lembut dipakai seharian.
          </p>
        </div>
        <div class="border-t border-slate-100 pt-4 flex items-center justify-between">
          <div class="flex items-center gap-3 text-xs text-slate-500 font-medium">
            <span class="text-slate-700 font-semibold"><i class="fa-regular fa-user text-purple-600 mr-1"></i> Divisi Produksi</span>
            <span>•</span>
            <span><i class="fa-regular fa-calendar text-slate-400 mr-1"></i> 21 Okt 2024</span>
          </div>
          <a class="text-blue-600 hover:text-blue-700 font-bold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center gap-1.5" href="#">
            <span>Baca Selengkapnya</span><i class="fa-solid fa-arrow-right text-xs"></i>
          </a>
        </div>
      </article>

      <!-- Card 4 -->
      <article class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group overflow-hidden">
        <div>
          <div class="w-full h-64 md:h-72 rounded-2xl overflow-hidden relative mb-5 bg-gradient-to-br from-amber-900 via-orange-800 to-amber-600 flex items-center justify-center p-6 select-none">
            <span class="absolute top-4 left-4 z-10 bg-white/95 backdrop-blur-md text-amber-800 font-extrabold text-xs px-3.5 py-1.5 rounded-full shadow-sm border border-white">
              <i class="fa-solid fa-award text-[11px] mr-1"></i> Koleksi Aksesoris
            </span>
            <button class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-600 hover:text-amber-600 flex items-center justify-center transition shadow-sm" title="Simpan Artikel">
              <i class="fa-regular fa-bookmark text-sm"></i>
            </button>
            <div class="relative z-0 text-center flex flex-col items-center justify-center transform group-hover:scale-105 transition-transform duration-500">
              <div class="w-24 h-24 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white shadow-2xl mb-3">
                <i class="fa-solid fa-bottle-water text-4xl text-amber-300"></i>
              </div>
              <span class="text-xs font-extrabold uppercase tracking-widest text-amber-200 bg-black/25 px-3 py-1 rounded-full border border-white/10">THERMAL TEST • 12 JAM</span>
            </div>
          </div>
          <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-3 font-[Plus_Jakarta_Sans]">
            Uji Ketahanan Tumbler Vacuum Insulated 500ml: Es Tahan Dingin 12 Jam di Kampus
          </h3>
          <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
            Hasil pengujian ketahanan suhu panas dan dingin tumbler laser logo UNPAM. Solusi praktis dan ramah lingkungan untuk mahasiswa yang aktif berpindah gedung kuliah.
          </p>
        </div>
        <div class="border-t border-slate-100 pt-4 flex items-center justify-between">
          <div class="flex items-center gap-3 text-xs text-slate-500 font-medium">
            <span class="text-slate-700 font-semibold"><i class="fa-regular fa-user text-amber-600 mr-1"></i> Quality Control</span>
            <span>•</span>
            <span><i class="fa-regular fa-calendar text-slate-400 mr-1"></i> 19 Okt 2024</span>
          </div>
          <a class="text-blue-600 hover:text-blue-700 font-bold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center gap-1.5" href="#">
            <span>Baca Selengkapnya</span><i class="fa-solid fa-arrow-right text-xs"></i>
          </a>
        </div>
      </article>

    </section>

    <!-- 5. Pagination Section -->
    <section class="flex flex-col sm:flex-row items-center justify-center sm:justify-between gap-4 pt-4 border-t border-slate-200">
      <div class="text-xs text-slate-500 font-medium order-2 sm:order-1">Halaman <span class="font-bold text-slate-800">1</span> dari 4 (24 Panduan)</div>
      <nav aria-label="Pagination" class="inline-flex items-center gap-1.5 order-1 sm:order-2">
        <button class="inline-flex items-center gap-1 px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-100 text-slate-400 text-xs font-semibold cursor-not-allowed" disabled>
          <i class="fa-solid fa-chevron-left text-[10px]"></i> Sebelumnya
        </button>
        <button class="w-9 h-9 rounded-xl bg-blue-600 text-white font-bold text-xs shadow-sm flex items-center justify-center">1</button>
        <button class="w-9 h-9 rounded-xl bg-white border border-slate-200 hover:border-slate-300 text-slate-600 font-semibold text-xs flex items-center justify-center transition">2</button>
        <span class="w-6 text-center text-slate-400 font-bold text-xs">...</span>
        <button class="inline-flex items-center gap-1 px-3.5 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold shadow-sm transition">
          Selanjutnya <i class="fa-solid fa-chevron-right text-[10px]"></i>
        </button>
      </nav>
    </section>

    <!-- 6. Footer Value Proposition -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-5 pt-2">
      <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 text-xl shrink-0"><i class="fa-solid fa-shield-halved"></i></div>
        <div class="space-y-1">
          <h4 class="font-bold text-slate-900 text-base font-[Plus_Jakarta_Sans]">Kurasi Produk Otentik</h4>
          <p class="text-xs text-slate-500 leading-relaxed">Semua artikel dan ulasan dibuat langsung berdasarkan spesifikasi riil merchandise resmi UNPAM.</p>
        </div>
      </div>
      <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600 text-xl shrink-0"><i class="fa-solid fa-bolt"></i></div>
        <div class="space-y-1">
          <h4 class="font-bold text-slate-900 text-base font-[Plus_Jakarta_Sans]">Update Rilisan & Promo</h4>
          <p class="text-xs text-slate-500 leading-relaxed">Dapatkan informasi jadwal restock merchandise, diskon bundle, dan rilis edisi terbatas paling awal.</p>
        </div>
      </div>
      <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 text-xl shrink-0"><i class="fa-solid fa-envelope-open-text"></i></div>
          <div class="space-y-1">
            <h4 class="font-bold text-slate-900 text-base font-[Plus_Jakarta_Sans]">Newsletter Diskon</h4>
            <p class="text-xs text-slate-500 leading-relaxed">Daftarkan email untuk kupon Rp 20.000 pertama.</p>
          </div>
        </div>
      </div>
    </section>

  </main>

</body>
</html>