<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UNPAM Merchandise - Artikel</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">


  <!-- Import Google Fonts: Plus Jakarta Sans & Manrope -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- FontAwesome 6 CDN -->
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
        <div
          class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
          <i class="fa-solid fa-bullhorn text-[11px]"></i>
          <span>Journal & Editorial Merch</span>
        </div>
        <h1 class="font-extrabold text-3xl sm:text-4xl text-slate-900 tracking-tight mt-1 font-[Plus_Jakarta_Sans]">
          Editorial & Panduan Gaya UNPAM Store
        </h1>
        <p class="text-slate-500 text-sm sm:text-base max-w-2xl leading-relaxed">
          Inspirasi outfit kuliah, ulasan bahan merchandise resmi, panduan gaya mahasiswa, tips perawatan apparel, serta
          kabar rilis produk terbaru UNPAM Store.
        </p>
      </div>

      <div class="flex items-center gap-3 shrink-0">
        <div class="bg-white border border-slate-100 rounded-2xl p-3.5 px-5 shadow-sm flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-lg">
            <i class="fa-solid fa-newspaper text-base"></i>
          </div>
          <div>
            <div class="text-xs font-medium text-slate-500">Total Publikasi</div>
            <div class="text-base font-extrabold text-blue-600">{{ count($articles) }} Artikel</div>
          </div>
        </div>
        <div class="bg-white border border-slate-100 rounded-2xl p-3.5 px-5 shadow-sm flex items-center gap-3">
          <div
            class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 font-bold text-lg">
            <i class="fa-solid fa-award text-base"></i>
          </div>
          <div>
            <div class="text-xs font-medium text-slate-500">Edisi & Katalog</div>
            <div class="text-base font-extrabold text-emerald-600">100% Produk Resmi</div>
          </div>
        </div>
      </div>
    </header>

    <!-- 2. Filter & Sort Bar -->
    <section class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
      <div class="flex items-center gap-2.5 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
        <button
          class="shrink-0 bg-blue-600 text-white rounded-full px-5 py-2.5 font-bold text-sm shadow-md transition">Semua
          Artikel</button>
      </div>

      <div class="flex items-center justify-between sm:justify-end gap-4 shrink-0">
        <span class="text-xs sm:text-sm text-slate-500 font-medium">Menampilkan daftar artikel terbaru</span>
      </div>
    </section>

    <!-- 3. Dynamic Article Grid Layout -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      @forelse($articles as $article)
        <article
          class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group overflow-hidden">
          <div>
            <!-- Gambar Artikel dari Database -->
            <div
              class="w-full h-56 rounded-2xl overflow-hidden relative mb-5 bg-slate-100 flex items-center justify-center select-none">
                <img class="rounded-xl w-full h-full object-cover"
                    src="{{ asset('storage/' . (is_array($article->image) ? $article->image[0] : $article->image)) }}"
                    alt="{{ $article->judul }}">
              <!-- Badge Kategori di atas gambar -->
              <span
                class="absolute top-4 left-4 z-10 bg-white/95 backdrop-blur-md text-blue-700 font-extrabold text-xs px-3.5 py-1.5 rounded-full shadow-sm border border-white">
                <i class="fa-solid fa-tag text-[11px] mr-1"></i> {{ $article->category->nama ?? 'Umum' }}
              </span>
            </div>

            <!-- Judul Artikel -->
            <h3
              class="text-lg font-extrabold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-3 font-[Plus_Jakarta_Sans] line-clamp-2">
              {{ $article->judul }}
            </h3>

            <!-- Deskripsi / Isi Artikel -->
            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
              {{ $article->desc }}
            </p>
          </div>

          <!-- Footer Card (Tanggal & Aksi) -->
          <div class="border-t border-slate-100 pt-4 flex items-center justify-between">
            <div class="flex items-center gap-2 text-xs text-slate-400 font-medium">
              <span><i class="fa-regular fa-calendar mr-1"></i> {{ $article->created_at->format('d M Y') }}</span>
            </div>
            <!-- Menggunakan slug artikel untuk URL yang lebih rapi -->
            <a href="{{ url('/article/' . $article->slug) }}" class="text-blue-600 hover:text-blue-700 font-bold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center gap-1.5">
              <span>Baca Selengkapnya</span><i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
          </div>
        </article>
      @empty
        <div class="col-span-full text-center py-16 bg-white rounded-3xl border border-slate-100 shadow-sm">
          <div
            class="w-16 h-16 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mx-auto mb-4 text-2xl">
            <i class="fa-solid fa-folder-open"></i>
          </div>
          <h3 class="text-lg font-bold text-slate-800">Belum Ada Artikel</h3>
          <p class="text-slate-500 text-sm mt-1">Silakan tambahkan artikel baru melalui panel admin.</p>
        </div>
      @endforelse

    </section>

    <!-- 4. Pagination Section -->
    @if(method_exists($articles, 'links'))
      <div class="pt-4">
        {{ $articles->links() }}
      </div>
    @endif

    <!-- 5. Footer Value Proposition -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-5 pt-6">
      <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex items-start gap-4">
        <div
          class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 text-xl shrink-0">
          <i class="fa-solid fa-shield-halved"></i></div>
        <div class="space-y-1">
          <h4 class="font-bold text-slate-900 text-base font-[Plus_Jakarta_Sans]">Kurasi Produk Otentik</h4>
          <p class="text-xs text-slate-500 leading-relaxed">Semua artikel dan ulasan dibuat langsung berdasarkan
            spesifikasi riil merchandise resmi UNPAM.</p>
        </div>
      </div>
      <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex items-start gap-4">
        <div
          class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600 text-xl shrink-0">
          <i class="fa-solid fa-bolt"></i></div>
        <div class="space-y-1">
          <h4 class="font-bold text-slate-900 text-base font-[Plus_Jakarta_Sans]">Update Rilisan & Promo</h4>
          <p class="text-xs text-slate-500 leading-relaxed">Dapatkan informasi jadwal restock merchandise, diskon
            bundle, dan rilis edisi terbatas paling awal.</p>
        </div>
      </div>
      <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex items-start gap-4">
        <div
          class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 text-xl shrink-0">
          <i class="fa-solid fa-envelope-open-text"></i></div>
        <div class="space-y-1">
          <h4 class="font-bold text-slate-900 text-base font-[Plus_Jakarta_Sans]">Newsletter Diskon</h4>
          <p class="text-xs text-slate-500 leading-relaxed">Daftarkan email untuk kupon spesial khusus mahasiswa aktif.
          </p>
        </div>
      </div>
    </section>

  </main>

</body>

</html>