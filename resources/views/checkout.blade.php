<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - UNPAM Merchandise</title>

    <!-- Import Google Fonts: Plus Jakarta Sans & Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind CSS melalui Vite -->
    @vite('resources/css/app.css')

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#f8f9ff] text-slate-800 antialiased selection:bg-blue-200 selection:text-blue-900 min-h-screen" x-data="checkoutData()">

    <!-- ================= HEADER ================= -->
    <header class="fixed top-0 w-full z-40 bg-[#f8f9ff]/90 backdrop-blur-md shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-blue-700 font-bold text-lg leading-none tracking-tight">UNPAM</span>
                <span class="text-[10px] text-slate-500 font-bold tracking-widest uppercase">Merchandise</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="#" class="flex items-center gap-2 text-sm text-slate-600 hover:text-blue-700 font-medium transition-colors" onclick="history.back(); return false;">
                    Kembali ke Keranjang <i class="fa-solid fa-arrow-right"></i>
                </a>
                <div class="w-8 h-8 bg-blue-700 rounded-full flex items-center justify-center text-white">
                    <i class="fa-solid fa-user text-sm"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 pt-24 pb-12">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
            
            <!-- KOLOM KIRI (Form & Pembayaran) -->
            <div class="w-full lg:w-[60%] xl:w-[65%] flex flex-col gap-6">
                
                <!-- Progress Indicator -->
                <div class="bg-white p-4 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-700 flex items-center justify-center text-white font-bold text-sm">1</div>
                        <div class="flex flex-col">
                            <span class="font-bold text-slate-800">Checkout Pesanan</span>
                            <span class="text-xs text-slate-500">Langkah Terakhir</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 rounded-lg border border-blue-100">
                        <i class="fa-solid fa-certificate text-blue-600 text-[10px]"></i>
                        <span class="text-[10px] font-bold text-blue-700 uppercase tracking-wider">Koperasi Resmi</span>
                    </div>
                </div>

                <!-- Section 1: Informasi Pengiriman -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-blue-700">
                        <i class="fa-solid fa-location-dot text-lg"></i>
                        <h2 class="text-lg font-bold text-slate-800">Informasi Pengiriman</h2>
                    </div>
                    
                    <!-- Tampilan Alamat Tersimpan (Read Only) -->
                    <div class="bg-[#f0f4f8] p-4 rounded-xl flex flex-col gap-1.5 relative border border-transparent">
                        <span class="absolute top-4 right-4 text-[10px] font-bold px-2 py-1 rounded bg-[#dce7ff] text-blue-700 uppercase tracking-wider">Utama</span>
                        <span class="font-bold text-slate-800 text-sm">Budi Santoso</span>
                        <span class="text-sm text-slate-600">+62 812-3456-7890</span>
                        <span class="text-sm text-slate-600 leading-relaxed mt-1">Jl. Surya Kencana No. 1, Pamulang Barat, Tangerang Selatan (Dekat Kampus Utama)</span>
                    </div>

                    <!-- Tombol Pemicu Pop Up -->
                    <button @click="showAddressModal = true" type="button" class="w-full py-3 rounded-xl border-2 border-blue-100 text-blue-700 font-bold text-sm hover:bg-[#ebf1ff] transition-all flex items-center justify-center gap-2 mt-1">
                        <i class="fa-solid fa-pen-to-square"></i> Ubah / Tambah Alamat
                    </button>
                </div>

                <!-- Section 2: Opsi Pengiriman -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-blue-700">
                        <i class="fa-solid fa-truck-fast text-lg"></i>
                        <h2 class="text-lg font-bold text-slate-800">Opsi Pengiriman</h2>
                    </div>
                    
                    <div class="flex flex-col gap-3">
                        <label class="cursor-pointer p-4 rounded-xl transition-all flex items-start gap-3 border border-transparent"
                               :class="shipping === 15000 ? 'bg-[#ebf1ff] border-blue-200' : 'bg-[#f8f9ff] hover:bg-slate-100'">
                            <input type="radio" value="15000" x-model.number="shipping" class="mt-1 w-4 h-4 text-blue-700 border-gray-300 focus:ring-blue-500">
                            <div class="flex flex-col flex-1">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <span class="font-bold text-slate-800 text-sm">Pengiriman Reguler</span>
                                    <span class="font-bold text-blue-700 text-sm">Rp 15.000</span>
                                </div>
                                <span class="text-xs text-slate-500 mt-1">Estimasi 2-3 Hari • SiCepat / J&T Express</span>
                            </div>
                        </label>

                        <label class="cursor-pointer p-4 rounded-xl transition-all flex items-start gap-3 border border-transparent"
                               :class="shipping === 0 ? 'bg-[#ebf1ff] border-blue-200' : 'bg-[#f8f9ff] hover:bg-slate-100'">
                            <input type="radio" value="0" x-model.number="shipping" class="mt-1 w-4 h-4 text-blue-700 border-gray-300 focus:ring-blue-500">
                            <div class="flex flex-col flex-1">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <span class="font-bold text-slate-800 text-sm">Ambil Mandiri di Kampus</span>
                                    <span class="font-bold text-blue-700 text-sm">Gratis</span>
                                </div>
                                <span class="text-xs text-slate-500 mt-1">Siap dalam 24 Jam • Koperasi Kampus Viktor Lt. 1</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Section 3: Metode Pembayaran -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-blue-700">
                        <i class="fa-solid fa-wallet text-lg"></i>
                        <h2 class="text-lg font-bold text-slate-800">Metode Pembayaran</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="cursor-pointer p-4 rounded-xl transition-all flex items-center justify-between border border-transparent"
                               :class="payment === 'qris' ? 'bg-[#ebf1ff] border-blue-200' : 'bg-[#f8f9ff] hover:bg-slate-100'">
                            <div class="flex items-center gap-3">
                                <input type="radio" value="qris" x-model="payment" class="w-4 h-4 text-blue-700 border-gray-300 focus:ring-blue-500">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 text-sm">QRIS</span>
                                    <span class="text-[11px] text-slate-500">OVO, GoPay, DANA</span>
                                </div>
                            </div>
                        </label>

                        <label class="cursor-pointer p-4 rounded-xl transition-all flex items-center justify-between border border-transparent"
                               :class="payment === 'va' ? 'bg-[#ebf1ff] border-blue-200' : 'bg-[#f8f9ff] hover:bg-slate-100'">
                            <div class="flex items-center gap-3">
                                <input type="radio" value="va" x-model="payment" class="w-4 h-4 text-blue-700 border-gray-300 focus:ring-blue-500">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 text-sm">Virtual Account</span>
                                    <span class="text-[11px] text-slate-500">BCA, Mandiri, BNI</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN (Ringkasan - Sticky) -->
            <div class="w-full lg:w-[40%] xl:w-[35%] sticky top-24 flex flex-col gap-6">
                
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold text-slate-800">Ringkasan Pesanan</h2>
                        <span class="text-[11px] font-bold px-2 py-1 rounded bg-[#ebf1ff] text-blue-700">1 Barang</span>
                    </div>
                    
                    <!-- Item List -->
                    <div class="flex items-center gap-4 p-3 bg-[#f8f9ff] rounded-xl">
                        <div class="w-16 h-16 rounded-lg bg-[#ebf1ff] overflow-hidden flex-shrink-0 flex items-center justify-center">
                            <i class="fa-solid fa-shirt text-blue-300 text-2xl"></i>
                        </div>
                        <div class="flex flex-col flex-1">
                            <span class="font-bold text-slate-800 text-sm">Varsity Jacket UNPAM</span>
                            <span class="text-xs text-slate-500 mt-0.5">Navy/White • Size L</span>
                            <div class="flex items-center justify-between mt-1">
                                <span class="text-xs text-slate-500">1 x Rp 185.000</span>
                                <span class="font-bold text-slate-800 text-sm">Rp 185.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Diskon Mahasiswa -->
                    <div class="p-4 bg-[#f8f9ff] rounded-xl flex flex-col gap-3">
                        <div class="flex items-center gap-2 text-blue-700">
                            <i class="fa-solid fa-graduation-cap text-sm"></i>
                            <span class="text-xs font-bold uppercase tracking-wider">Klaim Diskon Mahasiswa</span>
                        </div>
                        <div class="flex gap-2">
                            <input type="text" value="211011400234" class="flex-1 bg-white border border-gray-200 text-slate-800 rounded-lg px-3 py-2 text-sm font-bold tracking-wider outline-none">
                            <button class="bg-slate-800 text-white px-4 py-2 rounded-lg text-xs font-bold">Tersimpan</button>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-500">Diskon 15% civitas akademika aktif</span>
                            <span class="text-[10px] text-blue-700 font-bold uppercase tracking-wider">Terverifikasi</span>
                        </div>
                    </div>

                    <!-- Rincian Biaya -->
                    <div class="flex flex-col gap-3 pt-2">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500">Subtotal Produk</span>
                            <span class="font-medium text-slate-800" x-text="formatRupiah(basePrice)">Rp 185.000</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500">Biaya Pengiriman</span>
                            <span class="font-medium text-slate-800" x-text="shipping === 0 ? 'Gratis' : formatRupiah(shipping)">Rp 15.000</span>
                        </div>
                        <div class="flex items-center justify-between text-sm text-blue-700">
                            <span class="flex items-center gap-1">Diskon Mahasiswa <i class="fa-regular fa-circle-check"></i></span>
                            <span class="font-medium" x-text="'-' + formatRupiah(discount)">-Rp 27.750</span>
                        </div>
                        
                        <div class="w-full h-[1px] bg-gray-200 my-2"></div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="font-bold text-slate-800 text-sm">Total Pembayaran</span>
                            </div>
                            <span class="text-2xl font-bold text-blue-700" x-text="formatRupiah(total)">Rp 172.250</span>
                        </div>
                    </div>

                    <!-- Button Bayar -->
                    <button @click="prosesBayar" :disabled="isProcessing" 
                            class="w-full py-4 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold text-sm shadow-[0_4px_14px_0_rgba(6,81,237,0.39)] transition-all flex items-center justify-center gap-2 mt-2 disabled:opacity-70">
                        <template x-if="!isProcessing">
                            <span>Bayar Sekarang <i class="fa-solid fa-arrow-right ml-1"></i></span>
                        </template>
                        <template x-if="isProcessing">
                            <span><i class="fa-solid fa-circle-notch fa-spin"></i> Memproses...</span>
                        </template>
                    </button>
                    
                    <div class="flex items-center justify-center gap-1.5 text-slate-500">
                        <i class="fa-solid fa-lock text-[10px]"></i>
                        <span class="text-[11px]">Transaksi aman & terverifikasi Koperasi UNPAM</span>
                    </div>
                </div>

                <!-- Campus Help Card -->
                <div class="bg-[#f0f4f8] p-4 rounded-2xl flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-slate-800">Butuh bantuan pesanan?</span>
                        <span class="text-[11px] text-slate-500">CS Koperasi siap membantu</span>
                    </div>
                    <a href="#" class="px-3 py-1.5 bg-[#e2e8f0] text-slate-700 text-xs font-bold rounded-lg hover:bg-slate-300 transition-colors">
                        Chat WA
                    </a>
                </div>

            </div>
        </div>
    </main>

    <!-- ================= ULTRA MODERN POP-UP MODAL ALAMAT ================= -->
    <div 
        x-show="showAddressModal" 
        style="display: none;"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] bg-slate-900/30 backdrop-blur-md flex items-center justify-center p-4 sm:p-6"
        @keydown.escape.window="showAddressModal = false">

        <!-- Modal Box -->
        <div 
            x-show="showAddressModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-6 scale-95"
            @click.away="showAddressModal = false"
            class="max-w-md w-full bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.15)] flex flex-col relative transform transition-all overflow-hidden border border-white/60">

            <!-- Close Button -->
            <button 
                @click="showAddressModal = false" 
                type="button"
                class="absolute top-6 right-6 w-8 h-8 rounded-full bg-slate-50 hover:bg-slate-200 text-slate-400 hover:text-slate-600 flex items-center justify-center transition-colors z-10">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Modern Header -->
            <div class="p-6 pb-2 flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-[#ebf1ff] text-blue-600 flex items-center justify-center flex-shrink-0 shadow-inner">
                    <i class="fa-solid fa-location-dot text-xl"></i>
                </div>
                <div class="pr-8">
                    <h2 class="font-bold text-xl text-slate-800 leading-snug">Ubah Alamat</h2>
                    <p class="text-sm text-slate-500 font-medium">Pastikan alamat pesananmu benar</p>
                </div>
            </div>

            <!-- FORM (Route diarahkan ke controller buatan Fikri) -->
            <form action="#" method="POST" class="flex flex-col">
                @csrf
                
                <!-- Form Body -->
                <div class="p-6 flex flex-col gap-5">
                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">Nama Lengkap Penerima</label>
                        <input type="text" name="nama" value="Budi Santoso" placeholder="Masukkan nama lengkap" required
                            class="w-full bg-[#f8fafc] border border-slate-200 text-slate-800 rounded-2xl px-4 py-3.5 outline-none focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-sm placeholder:text-slate-400">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">Nomor HP</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-sm font-semibold text-slate-400 select-none pointer-events-none">+62</span>
                            <input type="tel" name="no_hp" value="81234567890" placeholder="812xxxxxxx" required
                                class="w-full bg-[#f8fafc] border border-slate-200 text-slate-800 rounded-2xl pl-14 pr-4 py-3.5 outline-none focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-sm placeholder:text-slate-400">
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" placeholder="Tuliskan alamat pengiriman, patokan, RT/RW..." required
                            class="w-full bg-[#f8fafc] border border-slate-200 text-slate-800 rounded-2xl px-4 py-3.5 outline-none focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-sm placeholder:text-slate-400 resize-none leading-relaxed">Jl. Surya Kencana No. 1, Pamulang Barat, Tangerang Selatan (Dekat Kampus Utama)</textarea>
                    </div>
                </div>

                <!-- Bouncy Action Footer -->
                <div class="px-6 pb-6 pt-2">
                    <button type="submit"
                        class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold text-base shadow-[0_8px_24px_-8px_rgba(37,99,235,0.6)] hover:shadow-[0_12px_28px_-8px_rgba(37,99,235,0.7)] transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2">
                        <span>Simpan Alamat</span>
                        <i class="fa-solid fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ================= SCRIPT ALPINE.JS ================= -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('checkoutData', () => ({
                showAddressModal: false, // <-- Ini yang ngatur pop up buka tutup
                shipping: 15000,
                payment: 'qris',
                basePrice: 185000,
                discount: 27750,
                isProcessing: false,
                
                get total() {
                    return this.basePrice - this.discount + this.shipping;
                },
                
                formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
                },

                prosesBayar() {
                    this.isProcessing = true;
                    setTimeout(() => {
                        this.isProcessing = false;
                        alert('Pembayaran berhasil! Total: ' + this.formatRupiah(this.total));
                        // window.location.href = '/success';
                    }, 1500);
                }
            }))
        })
    </script>
</body>
</html>