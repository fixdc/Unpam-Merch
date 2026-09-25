<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UNPAM Merchandise</title>

  <!-- Import Google Fonts: Plus Jakarta Sans & Manrope -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

  @vite('resources/css/app.css')
</head>

<body class="antialiased font-manrope text-gray-900 bg-gray-50">

  @include('components.navbar')

  <!-- Container Utama -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- 1. Page Header -->
    <header class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
      <div class="space-y-2">
        <div
          class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-semibold tracking-wide">
          <i class="fa-solid fa-certificate text-[11px]"></i>
          <span>Official Merch</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
          Katalog Merchandise UNPAM
        </h1>
        <p class="text-slate-500 text-sm sm:text-base max-w-2xl leading-relaxed">
          Koleksi apparel, merchandise resmi, dan atribut mahasiswa Universitas Pamulang berkualitas tinggi dengan
          jaminan keaslian resmi kampus.
        </p>
      </div>

      <div class="flex items-center gap-3 shrink-0">
        <div class="bg-white border border-slate-100 rounded-2xl p-3.5 px-5 shadow-sm flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-lg">
            <i class="fa-solid fa-boxes-stacked text-base"></i>
          </div>
          <div>
            <div class="text-xs font-medium text-slate-500">Total Koleksi</div>
            <div class="text-base font-extrabold text-blue-600">{{ count($products) }} SKU</div>
          </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-2xl p-3.5 px-5 shadow-sm flex items-center gap-3">
          <div
            class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 font-bold text-lg">
            <i class="fa-solid fa-shield-halved text-base"></i>
          </div>
          <div>
            <div class="text-xs font-medium text-slate-500">Jaminan Kualitas</div>
            <div class="text-base font-extrabold text-emerald-600">100% Ori</div>
          </div>
        </div>
      </div>
    </header>

    <!-- 2. Promo Banner -->
    <section class="relative overflow-hidden bg-blue-600 rounded-2xl p-6 sm:p-8 shadow-sm">
      <div class="absolute -right-8 -top-8 w-44 h-44 rounded-full bg-blue-500/30 blur-2xl pointer-events-none"></div>
      <div class="absolute right-1/4 -bottom-10 w-36 h-36 rounded-full bg-blue-400/20 blur-xl pointer-events-none">
      </div>

      <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-5">
        <div class="flex items-center gap-4">
          <div
            class="w-12 h-12 rounded-2xl bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-white shrink-0">
            <i class="fa-solid fa-graduation-cap text-2xl"></i>
          </div>
          <div>
            <div
              class="inline-flex items-center gap-2 text-blue-100 text-xs font-semibold uppercase tracking-wider mb-0.5">
              <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
              Khusus Civitas Akademika
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
              Diskon Mahasiswa 15% Menggunakan NIM Aktif
            </h2>
            <p class="text-blue-100 text-xs sm:text-sm mt-0.5">
              Gunakan NIM mahasiswa aktif saat checkout untuk potongan harga langsung seluruh produk.
            </p>
          </div>
        </div>
        <div class="shrink-0">
          <button
            class="inline-flex items-center gap-2 bg-white text-blue-600 hover:bg-blue-50 rounded-full font-bold px-6 py-3 text-sm shadow-md hover:shadow-lg transition-all active:scale-95">
            <i class="fa-solid fa-ticket"></i>
            <span>Klaim Voucher</span>
          </button>
        </div>
      </div>
    </section>

    <!-- 3. Filter & Sort Bar (Foreach Kategori) -->
    <section class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
      <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
        <button
          class="shrink-0 bg-blue-600 text-white rounded-full px-5 py-2 text-xs sm:text-sm font-bold shadow-sm transition">
          Semua Produk
        </button>

        @foreach($categories as $category)
          <button
            class="shrink-0 bg-white border border-slate-200 text-slate-600 hover:text-slate-900 hover:border-slate-300 rounded-full px-5 py-2 text-xs sm:text-sm font-medium transition">
            {{ $category->nama }} <!-- Sesuaikan dengan nama kolom di database kategori kamu -->
          </button>
        @endforeach
      </div>

      <div class="flex items-center justify-between sm:justify-end gap-4 shrink-0">
        <span class="text-xs sm:text-sm text-slate-500 font-medium">
          Menampilkan <strong class="text-slate-800">1-{{ count($products) }}</strong> dari {{ count($products) }} item
        </span>
        <div class="relative">
          <select
            class="appearance-none bg-white border border-slate-200 text-slate-700 text-xs sm:text-sm font-medium rounded-xl pl-3.5 pr-8 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent cursor-pointer shadow-sm">
            <option>Urutkan: Terpopuler</option>
            <option>Terbaru</option>
            <option>Harga: Terendah</option>
            <option>Harga: Tertinggi</option>
            <option>Rating Tertinggi</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-slate-500">
            <i class="fa-solid fa-chevron-down text-[10px]"></i>
          </div>
        </div>
      </div>
    </section>

    <!-- 4. Product Grid & Cards (Foreach Produk) -->
    <section class="grid grid-cols-2 lg:grid-cols-4 gap-6">

      @forelse($products as $product)
        <div
          class="bg-white border border-slate-100 rounded-2xl p-4 shadow-sm relative group hover:shadow-md transition-all flex flex-col justify-between">
          <span
            class="absolute top-4 left-4 z-10 text-[10px] font-bold px-2 py-1 rounded-md bg-sky-50 text-blue-600 border border-blue-100">
            OFFICIAL
          </span>
          <button
            class="absolute top-4 right-4 z-10 w-8 h-8 rounded-full bg-white/90 border border-slate-200 text-slate-400 hover:text-rose-500 hover:border-rose-200 flex items-center justify-center transition shadow-sm"
            title="Tambah ke Wishlist">
            <i class="fa-regular fa-heart text-xs"></i>
          </button>

          <div>
            <!-- Image Box -->
            <div
              class="bg-slate-50 rounded-xl p-4 h-48 flex items-center justify-center mb-4 group-hover:scale-[1.02] transition-transform overflow-hidden relative">
              @if($product->image && count($product->image) > 0)
                <img src="{{ asset('storage/' . $product->image[0]) }}" alt="{{ $product->nama }}"
                  class="w-full h-full object-cover rounded-2xl absolute inset-0">
              @else
                <div
                  class="w-32 h-32 rounded-2xl bg-blue-100/60 border border-blue-200 flex flex-col items-center justify-center text-blue-600 relative shadow-inner">
                  <span class="text-xl text-gray-300">📷</span>
                  <span
                    class="text-[9px] font-extrabold tracking-widest uppercase mt-2 text-blue-700 bg-white/80 px-2 py-0.5 rounded">UNPAM
                    MERCH</span>
                </div>
              @endif
            </div>

            <!-- Info -->
            <div class="space-y-1.5 mb-4">
              <div class="flex items-center gap-1.5 text-xs text-amber-500 font-semibold">
                <div class="flex items-center text-[10px]">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <span class="text-slate-700 font-bold text-[11px]">4.9</span>
                <span class="text-slate-400 text-[10px]">(50+)</span>
              </div>

              <!-- Nama Produk dari Database -->
              <h3 class="font-bold text-sm text-slate-900 leading-snug line-clamp-2">
                {{ $product->nama ?? $product->title }}
              </h3>

              <!-- Harga Produk dari Database -->
              <div class="flex items-baseline gap-2 pt-1">
                <span class="text-blue-600 font-extrabold text-lg">Rp
                  {{ number_format($product->harga, 0, ',', '.') }}</span>
              </div>
            </div>
          </div>

          <!-- Tombol Aksi -->
          <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100">
            <button
              class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 rounded-xl px-3 py-2 text-xs font-semibold flex items-center justify-center gap-1.5 transition">
              <i class="fa-solid fa-cart-plus text-[11px]"></i>
              <span>+ Keranjang</span>
            </button>
            <button
              class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-4 py-2 text-xs font-bold transition shadow-sm">
              Beli
            </button>
          </div>
        </div>
      @empty
        <div class="col-span-full text-center py-12 text-slate-500">
          Belum ada produk tersedia.
        </div>
      @endforelse

    </section>

    <!-- 5. Pagination -->
    <section
      class="flex flex-col sm:flex-row items-center justify-center sm:justify-between gap-4 pt-4 border-t border-slate-200">
      <div class="text-xs text-slate-500 font-medium order-2 sm:order-1">
        Menampilkan data produk merchandise UNPAM
      </div>

      <nav class="inline-flex items-center gap-1.5 order-1 sm:order-2" aria-label="Pagination">
        <button disabled
          class="inline-flex items-center gap-1 px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-100 text-slate-400 text-xs font-semibold cursor-not-allowed">
          <i class="fa-solid fa-chevron-left text-[10px]"></i>
          <span>Sebelumnya</span>
        </button>

        <button
          class="w-9 h-9 rounded-xl bg-blue-600 text-white font-bold text-xs shadow-sm flex items-center justify-center">
          1
        </button>

        <button
          class="inline-flex items-center gap-1 px-3.5 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold shadow-sm transition">
          <span>Selanjutnya</span>
          <i class="fa-solid fa-chevron-right text-[10px]"></i>
        </button>
      </nav>
    </section>

    <!-- 6. Value Proposition Footer -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
      <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm flex items-start gap-4">
        <div
          class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 text-xl shrink-0">
          <i class="fa-solid fa-shield-check"></i>
        </div>
        <div class="space-y-1">
          <h4 class="font-bold text-slate-900 text-sm">100% Resmi Kampus</h4>
          <p class="text-xs text-slate-500 leading-relaxed">
            Diproduksi resmi dengan izin lisensi Universitas Pamulang dan standar bahan teruji.
          </p>
        </div>
      </div>

      <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm flex items-start gap-4">
        <div
          class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600 text-xl shrink-0">
          <i class="fa-solid fa-truck-fast"></i>
        </div>
        <div class="space-y-1">
          <h4 class="font-bold text-slate-900 text-sm">Ambil Cepat</h4>
          <p class="text-xs text-slate-500 leading-relaxed">
            Bisa ambil langsung di Koperasi Kampus Viktor & Pusat atau dikirim instan via kurir.
          </p>
        </div>
      </div>

      <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm flex items-start gap-4">
        <div
          class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 text-xl shrink-0">
          <i class="fa-solid fa-arrow-rotate-left"></i>
        </div>
        <div class="space-y-1">
          <h4 class="font-bold text-slate-900 text-sm">Tukar Ukuran 3 Hari</h4>
          <p class="text-xs text-slate-500 leading-relaxed">
            Ukuran tidak pas? Garansi retur dan tukar ukuran mudah maksimal 3 hari kerja setelah barang tiba.
          </p>
        </div>
      </div>
    </section>

  </main>

</body>

</html>