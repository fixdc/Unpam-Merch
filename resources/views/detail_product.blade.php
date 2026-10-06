<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nama }} - UNPAM Merchandise</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite('resources/css/app.css')
</head>

<body class="antialiased font-manrope text-gray-900 bg-gray-50">

    @include('components.navbar')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        <!-- Breadcrumb Navigasi -->
        <div class="flex justify-between items-center">
            <a href="{{ url('/product') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-all font-bold text-sm">
                ← Kembali
            </a>
            <nav class="flex text-sm text-slate-500 gap-2">
                <a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a>
                <span>/</span>
                <a href="{{ url('/product') }}" class="hover:text-blue-600">Produk</a>
                <span>/</span>
                <span class="text-slate-900 font-semibold truncate">{{ $product->nama }}</span>
            </nav>
        </div>
        
        <!-- Card Detail Produk -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Gambar Produk -->
            <div class="space-y-4">
                <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 h-80 sm:h-96 flex items-center justify-center overflow-hidden relative">
                    @if($product->image && is_array($product->image) && count($product->image) > 0)
                        <img src="{{ asset('storage/' . $product->image[0]) }}" alt="{{ $product->nama }}" class="w-full h-full object-contain">
                    @else
                        <div class="text-center">
                            <span class="text-5xl text-gray-300">📷</span>
                            <p class="text-xs font-bold text-slate-400 mt-2">Gambar Tidak Tersedia</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Informasi Produk & Aksi -->
            <div class="flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    
                    <!-- Label Kategori & Badge -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-bold">
                            <i class="fa-solid fa-shield-halved"></i> Official UNPAM Merchandise
                        </div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-600 text-xs font-bold uppercase tracking-wider">
                            <i class="fa-solid fa-tag"></i> {{ $product->category->nama ?? 'Kategori Umum' }}
                        </div>
                    </div>

                    <!-- Judul Produk -->
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        {{ $product->nama }}
                    </h1>

                    <!-- Rating & Penjualan -->
                    <div class="flex items-center gap-3 text-sm">
                        <div class="flex items-center text-amber-400 text-sm gap-0.5">
                            <i class="fa-solid fa-star"></i>
                            <span class="font-extrabold text-slate-700 ml-1">{{ $product->rating ?? '0.0' }}</span>
                        </div>
                        <span class="text-slate-300">|</span>
                        <span class="text-slate-500 font-medium">Terjual {{ $product->terjual ?? 0 }}</span>
                        <span class="text-slate-300">|</span>
                        <span class="text-slate-500 font-medium">Stok: {{ $product->stok ?? 0 }} pcs</span>
                    </div>

                    <!-- Harga -->
                    <div class="flex items-center gap-3">
                        <span class="text-3xl font-black text-blue-600">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- Deskripsi -->
                    <p class="text-slate-600 text-sm leading-relaxed pt-2">
                        {{ $product->desc ?? 'Produk resmi merchandise Universitas Pamulang. Dibuat dengan bahan berkualitas tinggi dan desain eksklusif untuk mendukung identitas civitas akademika.' }}
                    </p>
                </div>

                <!-- Tombol Aksi Belanja (Menggunakan Form Cart) -->
                <div class="space-y-3 pt-6 border-t border-slate-100">
                    
                    @if(session('success'))
                        <div class="p-3 text-sm text-green-700 bg-green-100 rounded-xl mb-4 font-bold border border-green-200">
                            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('cart.store') }}" method="POST" class="flex flex-col sm:flex-row items-center gap-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <!-- Input Qty (Opsional, tapi bagus agar pembeli bisa beli lebih dari 1) -->
                        <div class="flex items-center bg-slate-50 border border-slate-200 rounded-2xl h-12 w-full sm:w-auto">
                            <button type="button" onclick="document.getElementById('qty').stepDown()" class="px-4 text-slate-500 hover:text-blue-600 font-bold">-</button>
                            <input type="number" id="qty" name="qty" value="1" min="1" max="{{ $product->stok }}" class="w-12 text-center bg-transparent outline-none font-bold text-slate-900 border-none p-0 focus:ring-0">
                            <button type="button" onclick="document.getElementById('qty').stepUp()" class="px-4 text-slate-500 hover:text-blue-600 font-bold">+</button>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="w-full sm:flex-1 bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-bold h-12 px-6 rounded-2xl flex items-center justify-center gap-2 transition">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Keranjang</span>
                        </button>

                        <button type="submit" name="buy_now" value="true" class="w-full sm:flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold h-12 px-6 rounded-2xl shadow-lg shadow-blue-500/20 text-center transition">
                            Beli Sekarang
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </main>

</body>
</html>