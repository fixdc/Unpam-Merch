<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNPAM Merchandise</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">

    <!-- Import Google Fonts: Plus Jakarta Sans & Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<!-- Tambahkan class font-manrope di body -->

<body class="antialiased font-manrope text-gray-900 bg-gray-50">

    <!-- Top Notification Banner -->
    <div class="bg-blue-600 text-white text-[11px] sm:text-xs py-2 px-4 text-center font-medium flex items-center justify-center gap-2">
        <i class="fa-solid fa-truck-fast"></i> Gratis Ongkir ke Seluruh Kampus UNPAM Min. Rp50.000 & Free Exclusive Sticker Pack! <i class="fa-solid fa-circle-check text-white"></i>
    </div>

    @include('components.navbar')

    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class=" grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
                <div class="inline-flex items-center gap-2 bg-white px-3.5 py-1.5 rounded-full text-[11px] font-bold text-blue-600 shadow-sm mb-6">
                    <i class="fa-solid fa-sparkles"></i> OFFICIAL MERCHANDISE UNPAM <i class="fa-solid fa-arrow-right text-[9px]"></i>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-[1.15] mb-4">
                    Gaya Kampus, Kebanggaan Kita. Tampil <span class="text-blue-600 underline decoration-blue-300">Stylish & Keren!</span>
                </h1>
                <p class="text-slate-600 text-xs sm:text-sm mb-8 leading-relaxed">
                    Temukan berbagai pilihan atribut resmi Universitas Pamulang mulai dari jaket almamater, hoodie, kaos eksklusif, hingga aksesoris kampus berkualitas tinggi.
                </p>
                <div class="flex flex-wrap items-center gap-3 sm:gap-4 mb-8">
                    <!-- LINK: Arahkan ke halaman semua produk -->
                    <a href="{{ url('/product') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3.5 rounded-full shadow-lg shadow-blue-600/20 transition text-xs flex items-center gap-2">
                        Belanja Sekarang <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-2 pt-4 border-t border-blue-200/50 text-[11px] font-semibold text-slate-600">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-blue-600"></i> 100% Original Kampus</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-blue-600"></i> Bahan Premium & Nyaman</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-blue-600"></i> Awet Dan Kokoh</div>
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

    <!-- Marquee Slider Logo (Dipertahankan sesuai aslinya) -->
    <div class="h-16 flex items-center overflow-hidden relative text-gray-500">
        <div class="flex animate-marquee items-center w-max">
            @php
                $items = [
                    ['text' => 'CAMPUS WEAR', 'logo' => asset('assets/images/1.png')],
                    ['text' => 'STREET STYLE', 'logo' => asset('assets/images/2.png')],
                    ['text' => 'PREMIUM APPAREL', 'logo' => asset('assets/images/3.png')],
                    ['text' => 'EVERYDAY ESSENTIAL', 'logo' => asset('assets/images/4.png')],
                    ['text' => 'OFFICIAL MERCH', 'logo' => asset('assets/images/5.png')],
                ];
            @endphp
            @foreach (array_merge($items, $items) as $item)
                <div class="flex items-center mx-10 flex-shrink-0 gap-4">
                    <img src="{{ $item['logo'] }}" alt="{{ $item['text'] }}" class="h-9 w-auto object-contain grayscale opacity-60 hover:opacity-100 hover:grayscale-0 transition-all duration-300">
                    <span class="text-sm md:text-base text-slate-500 font-semibold tracking-wider whitespace-nowrap">{{ $item['text'] }}</span>
                    <span class="text-slate-300 text-lg">✦</span>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        @keyframes marquee { 0% { transform: translateX(0%); } 100% { transform: translateX(-50%); } }
        .animate-marquee { display: flex; width: max-content; animation: marquee 25s linear infinite; }
        .animate-marquee:hover { animation-play-state: paused; }
    </style>

    <!-- Product Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-6">
            <span class="text-[11px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full">KATALOG EKSKLUSIF</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-3">Merchandise Pilihan Wajib Mahasiswa UNPAM</h2>
            <p class="text-slate-500 text-xs sm:text-sm mt-1 max-w-md mx-auto">Lengkapi hari-harimu di kampus dengan atribut resmi yang keren dan nyaman dipakai.</p>
        </div>

        <!-- Filter Tabs -->
        <div class="flex items-center justify-center gap-2 flex-wrap mb-8">
            <a href="{{ url('/product') }}" class="{{ request('category') ? 'bg-white text-slate-600 border border-slate-200' : 'bg-blue-600 text-white' }} font-bold text-xs px-5 py-2.5 rounded-full shadow-sm transition">Semua</a>
            <a href="{{ url('/product?category=pakaian') }}" class="{{ request('category') == 'pakaian' ? 'bg-blue-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }} font-semibold text-xs px-5 py-2.5 rounded-full transition shadow-sm">Hoodie & Jaket</a>
            <a href="{{ url('/product?category=aksesoris') }}" class="{{ request('category') == 'aksesoris' ? 'bg-blue-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }} font-semibold text-xs px-5 py-2.5 rounded-full transition shadow-sm">Aksesoris & Lainya</a>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($product as $item)
                <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm hover:shadow-md transition flex flex-col justify-between relative group">
                    <span class="absolute top-5 left-5 bg-sky-50 text-blue-600 text-[10px] font-bold px-2.5 py-1 rounded-md z-10">Bestseller</span>
                    <button class="absolute top-5 right-5 text-slate-300 hover:text-blue-600 z-10"><i class="fa-regular fa-heart text-base"></i></button>
                    
                    <!-- LINK: Membungkus gambar & judul agar bisa diklik ke halaman detail produk -->
                    <a href="{{ url('/product/' . $item->slug) }}" class="block">
                        <div class="bg-slate-50 rounded-xl mb-4 flex items-center justify-center h-44 border border-slate-100">
                            <img src="{{ !empty($item->image) ? asset('storage/' . $item->image[0]) : '' }}" alt="{{ $item->nama }}" class="w-full h-full object-cover rounded-xl group-hover:scale-105 transition">
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-xs sm:text-sm mt-0.5 hover:text-blue-600 transition">{{ $item->nama }}</h3>
                            <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">{{ $item->desc }}</p>
                            <div class="flex items-center gap-1 mt-2 text-xs">
                                <i class="fa-solid fa-star text-amber-400 text-[11px]"></i>
                                <span class="font-bold text-slate-800 text-[11px]">{{ $item->rating }}</span>
                                <span class="text-slate-400 text-[11px]">({{ $item->terjual }} terjual)</span>
                            </div>
                        </div>
                    </a>

                    <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 block">Harga</span>
                            <span class="font-extrabold text-blue-600 text-sm">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                        </div>
                        <!-- FORM: Tombol Keranjang agar langsung menyimpan data ke controller keranjang -->
                        <form action="{{ route('cart.store') }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-[11px] font-bold px-3.5 py-2 rounded-xl transition flex items-center gap-1 shadow-sm">
                                <i class="fa-solid fa-bag-shopping text-[10px]"></i> Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ url('/product') }}" class="border border-blue-300 text-blue-600 hover:bg-blue-50 font-bold px-8 py-3 rounded-full text-xs transition inline-flex items-center gap-2 shadow-sm">
                Lihat Semua Koleksi Merchandise UNPAM <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>
    </section>

    <!-- Cerita Kami Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Kontainer utama dengan efek hover bayangan -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-10 lg:p-12 shadow-sm hover:shadow-xl transition-shadow duration-500 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative overflow-hidden">
        
        <!-- Ornamen dekoratif background (Blob) -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-50 rounded-full blur-3xl opacity-60 pointer-events-none"></div>

        <!-- Kolom Teks -->
        <div class="relative z-10">
            <span class="inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-4 py-1.5 rounded-full mb-2 hover:bg-blue-100 transition-colors cursor-default">
                <i class="fa-solid fa-book-open"></i> Tentang Kami
            </span>
            
            <!-- Judul dengan gradient dan efek scale saat di-hover -->
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-4 leading-snug">
                Wadah Resmi Kebanggaan Civitas Akademika 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 inline-block hover:scale-105 transition-transform duration-300 cursor-default">UNPAM</span>
            </h2>
            
            <p class="text-slate-600 text-sm sm:text-base mt-4 leading-relaxed max-w-lg">
                App Unpam Merch hadir sebagai platform resmi penyediaan atribut dan buah tangan universitas. Kami menghubungkan kebanggaan kampus dengan gaya hidup modern.
            </p>
            
            <div class="space-y-4 mt-8">
                <!-- Kartu Fitur 1 (Interaktif) -->
                <div class="group flex items-center gap-4 p-4 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-300 hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                    <div class="bg-blue-50 group-hover:bg-blue-600 group-hover:text-white text-blue-600 p-3.5 rounded-xl text-base transition-colors duration-300">
                        <i class="fa-solid fa-shield-halved group-hover:rotate-12 transition-transform duration-300"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-900 group-hover:text-blue-600 transition-colors">Produk Resmi & Berlisensi</h4>
                        <p class="text-xs text-slate-500 mt-1">Kualitas terjamin standar universitas</p>
                    </div>
                </div>
                
                <!-- Kartu Fitur 2 (Interaktif) -->
                <div class="group flex items-center gap-4 p-4 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-300 hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                    <div class="bg-blue-50 group-hover:bg-blue-600 group-hover:text-white text-blue-600 p-3.5 rounded-xl text-base transition-colors duration-300">
                        <i class="fa-solid fa-tags group-hover:rotate-12 transition-transform duration-300"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-900 group-hover:text-blue-600 transition-colors">Harga Ramah Mahasiswa</h4>
                        <p class="text-xs text-slate-500 mt-1">Terjangkau untuk seluruh civitas</p>
                    </div>
                </div>
            </div>

            <!-- Tombol CTA -->
            <div class="mt-8">
                <a href="#" class="group inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-200 hover:-translate-y-0.5 transition-all duration-300">
                    Jelajahi Katalog <i class="fa-solid fa-arrow-right group-hover:translate-x-1.5 transition-transform duration-300"></i>
                </a>
            </div>
        </div>

        <!-- Kolom Gambar -->
        <div class="relative group z-10 mt-8 lg:mt-0">
            <!-- Aksen bingkai di belakang gambar -->
            <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-cyan-400 rounded-2xl rotate-2 group-hover:rotate-3 transition-transform duration-500 opacity-20"></div>
            
            <div class="relative overflow-hidden rounded-2xl shadow-lg border-4 border-white">
                <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&q=80&w=800" 
                     alt="UNPAM Campus Life" 
                     class="w-full h-[360px] sm:h-[450px] object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
            </div>

            <!-- Floating Badge Stats -->
            <div class="absolute -bottom-6 -left-4 sm:-left-8 bg-white p-3.5 sm:p-4 rounded-2xl shadow-xl border border-slate-100 animate-bounce" style="animation-duration: 3s;">
                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 border-2 border-white flex items-center justify-center text-xs font-bold text-blue-600">U</div>
                        <div class="w-8 h-8 rounded-full bg-indigo-100 border-2 border-white flex items-center justify-center text-xs font-bold text-indigo-600">N</div>
                        <div class="w-8 h-8 rounded-full bg-cyan-100 border-2 border-white flex items-center justify-center text-xs font-bold text-cyan-600">+</div>
                    </div>
                    <div>
                        <p class="text-[10px] sm:text-xs text-slate-500 font-medium">Dipercaya oleh</p>
                        <p class="text-xs sm:text-sm font-bold text-slate-900">Ribuan Mahasiswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Article Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <h1 class="text-3xl font-semibold text-center mx-auto">Latest Article</h1>
        <p class="text-sm text-slate-500 text-center mt-2 max-w-lg mx-auto">Stay ahead of the curve with fresh content on code, design, startups, and everything in between.</p>

        @if ($articles->isEmpty())
            <p class="text-sm text-slate-500 text-center mt-8">Belum ada artikel terbaru saat ini.</p>
        @else
            <div class="flex flex-wrap items-center items-start justify-center gap-8 pt-12 w-full">
                @foreach ($articles as $item)
                    <!-- LINK: Membungkus artikel agar bisa diklik menuju detail artikel -->
                    <a href="{{ url('/article/' . $item->slug) }}" class="max-w-96 w-full block hover:-translate-y-1 transition duration-300">
                        <img class="rounded-xl w-full h-52 object-cover shadow-sm" src="{{ asset('storage/' . (is_array($item->image) ? $item->image[0] : $item->image)) }}" alt="{{ $item->judul }}">
                        <h3 class="text-base text-slate-900 font-bold mt-3 hover:text-blue-600 transition">{{ $item->judul }}</h3>
                        <p class="text-xs text-blue-600 font-bold mt-1 uppercase tracking-wider">{{ $item->category->nama ?? 'Umum' }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </section>


    <!-- FAQ Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col md:flex-row items-start justify-center gap-8">

            <!-- FAQ Image -->
            <div class="w-full md:w-[38%]">
                <img class="w-full rounded-xl h-[380px] md:h-[450px] object-cover"
                    src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?q=80&w=830&h=844&auto=format&fit=crop"
                    alt="FAQ UNPAM Merchandise" />
            </div>

            <!-- FAQ Content -->
            <div class="w-full md:w-[62%] pt-2">
                <p class="text-blue-600 text-sm font-medium">FAQ's</p>

                <h1 class="text-3xl font-semibold text-slate-900">
                    Looking for answer?
                </h1>

                <p class="text-sm text-slate-500 mt-2 pb-4">
                    Temukan jawaban dari pertanyaan yang sering ditanyakan
                    seputar UNPAM Merchandise, pemesanan, pembayaran, dan pengiriman.
                </p>

                <!-- FAQ Items -->
                <div id="faqContainer"></div>
            </div>

        </div>
    </section>

    <script>
        const faqs = [
            {
                question: "Apakah produk ini resmi dari Universitas Pamulang?",
                answer: "Tentu saja! Semua produk yang tersedia di aplikasi Unpam Merch adalah merchandise resmi dan berlisensi. Dengan membeli di sini, kamu mendapatkan produk original dengan kualitas standar universitas.",
            },
            {
                question: "Bagaimana jika ukuran baju (size) yang saya pesan tidak pas?",
                answer: "Kami menyediakan kebijakan retur (penukaran ukuran) maksimal 3 hari setelah barang diterima, dengan syarat tag harga belum dilepas dan pakaian belum dicuci. Ongkos kirim penukaran ditanggung oleh pembeli.",
            },
            {
                question: "Metode pembayaran apa saja yang didukung?",
                answer: "Kami mendukung berbagai metode pembayaran untuk kemudahan mahasiswa. Kamu bisa membayar menggunakan Virtual Account (BCA, BNI, Mandiri, BRI), E-Wallet (Gopay, ShopeePay, Dana), dan juga pembayaran tunai (COD) khusus untuk area sekitar kampus.",
            },
            {
                question: "Apakah melayani pengiriman ke luar kota/provinsi?",
                answer: "Tentu! Walaupun berpusat di Tangerang Selatan, kami telah bekerja sama dengan ekspedisi terpercaya (JNE, J&T, SiCepat) untuk mengirimkan kebanggaan Unpam ke seluruh pelosok Indonesia.",
            },
        ];

        const container = document.getElementById("faqContainer");

        faqs.forEach((faq, index) => {
            const wrapper = document.createElement("div");
            wrapper.className = "border-b border-slate-200 py-4 cursor-pointer";

            const header = document.createElement("div");
            header.className = "flex items-center justify-between";
            header.innerHTML = `
            <h3 class="text-base font-medium">${faq.question}</h3>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="transition-all duration-500 ease-in-out icon">
                <path d="m4.5 7.2 3.793 3.793a1 1 0 0 0 1.414 0L13.5 7.2"
                    stroke="#1D293D" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        `;

            const answer = document.createElement("p");
            answer.className = "text-sm text-slate-500 transition-all duration-500 ease-in-out max-w-md opacity-0 max-h-0 -translate-y-2 pt-0 answer";
            answer.textContent = faq.answer;

            wrapper.appendChild(header);
            wrapper.appendChild(answer);
            container.appendChild(wrapper);

            header.addEventListener("click", () => {
                const allAnswers = document.querySelectorAll(".answer");
                const allIcons = document.querySelectorAll(".icon");

                allAnswers.forEach((el, i) => {
                    if (i === index) {
                        const isOpen = el.classList.contains("opacity-100");
                        el.classList.toggle("opacity-100", !isOpen);
                        el.classList.toggle("max-h-[300px]", !isOpen);
                        el.classList.toggle("translate-y-0", !isOpen);
                        el.classList.toggle("pt-4", !isOpen);
                        el.classList.toggle("opacity-0", isOpen);
                        el.classList.toggle("max-h-0", isOpen);
                        el.classList.toggle("-translate-y-2", isOpen);

                        allIcons[i].classList.toggle("rotate-180", !isOpen);
                    } else {
                        el.classList.remove("opacity-100", "max-h-[300px]", "translate-y-0", "pt-4");
                        el.classList.add("opacity-0", "max-h-0", "-translate-y-2");
                        allIcons[i].classList.remove("rotate-180");
                    }
                });
            });
        });
    </script>
 
 @include('components.footer')


</body>
</html>