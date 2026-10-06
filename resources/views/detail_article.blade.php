<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->judul }} - UNPAM Merchandise</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-manrope text-slate-900 antialiased min-h-screen flex flex-col">

    @include('components.navbar')

    <main class="flex-1 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 w-full">
        
        <!-- Tombol Kembali & Kategori -->
        <div class="mb-8">
            <a href="{{ url('/articles') }}" class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-blue-600 transition-colors mb-6">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Artikel
            </a>
            
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100 uppercase tracking-wider">
                    <i class="fa-solid fa-tag text-[10px]"></i> {{ $article->category->nama ?? 'Umum' }}
                </span>
                <span class="text-sm text-slate-400 font-medium flex items-center gap-1.5">
                    <i class="fa-regular fa-calendar"></i> {{ $article->created_at->format('d M Y') }}
                </span>
            </div>
        </div>

        <!-- Judul Artikel -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-8 font-[Plus_Jakarta_Sans]">
            {{ $article->judul }}
        </h1>

        <!-- Gambar Utama -->
        <div class="w-full h-[300px] sm:h-[450px] rounded-3xl overflow-hidden bg-slate-100 mb-12 shadow-sm border border-slate-200 relative">
            @if(is_array($article->image) && count($article->image) > 0)
                <img src="{{ asset('storage/' . $article->image[0]) }}" alt="{{ $article->judul }}" class="w-full h-full object-cover">
            @elseif(is_string($article->image))
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->judul }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                    <i class="fa-regular fa-image text-4xl mb-2"></i>
                    <span class="text-sm font-medium">Ilustrasi Artikel</span>
                </div>
            @endif
        </div>

        <!-- Isi Artikel / Deskripsi -->
        <article class="prose prose-slate prose-blue max-w-none lg:prose-lg text-slate-600 leading-loose">
            <!-- Jika kamu menggunakan editor WYSIWYG seperti CKEditor/TinyMCE yang menyimpan tag HTML, gunakan {!! $article->desc !!} -->
            <!-- Jika hanya text biasa, gunakan nl2br agar enter/paragraf terbaca -->
            {!! nl2br(e($article->desc)) !!}
        </article>

        <!-- Share & Tags Section -->
        <div class="mt-12 pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="text-sm font-bold text-slate-900">Bagikan:</span>
                <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-blue-100 text-slate-600 hover:text-blue-600 flex items-center justify-center transition-colors">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                </button>
                <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-blue-100 text-slate-600 hover:text-blue-600 flex items-center justify-center transition-colors">
                    <i class="fa-brands fa-twitter text-lg"></i>
                </button>
                <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-blue-100 text-slate-600 hover:text-blue-600 flex items-center justify-center transition-colors">
                    <i class="fa-solid fa-link text-lg"></i>
                </button>
            </div>
            
            <a href="{{ url('/product') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl transition shadow-sm inline-flex items-center gap-2 text-sm">
                <i class="fa-solid fa-bag-shopping"></i> Belanja Merch Sekarang
            </a>
        </div>
        
    </main>

</body>
</html>