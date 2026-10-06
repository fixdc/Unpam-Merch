<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - UNPAM Merchandise</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>

<body class="bg-[#f8f9ff] text-slate-800 antialiased selection:bg-blue-200 selection:text-blue-900 min-h-screen" x-data="checkoutData()">

    <header class="fixed top-0 w-full z-40 bg-[#f8f9ff]/90 backdrop-blur-md shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-blue-700 font-bold text-lg leading-none tracking-tight">UNPAM</span>
                <span class="text-[10px] text-slate-500 font-bold tracking-widest uppercase">Merchandise</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('cart.index') }}" class="flex items-center gap-2 text-sm text-slate-600 hover:text-blue-700 font-medium transition-colors">
                    Kembali ke Keranjang <i class="fa-solid fa-arrow-right"></i>
                </a>
                <div class="w-8 h-8 bg-blue-700 rounded-full flex items-center justify-center text-white">
                    <i class="fa-solid fa-user text-sm"></i>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 pt-24 pb-12">
        
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl font-medium">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-100 text-emerald-700 rounded-xl font-medium">{{ session('success') }}</div>
        @endif

        <div class="flex flex-col lg:flex-row gap-8 items-start">
            
            <!-- KOLOM KIRI (Form Checkout Utama) -->
            <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST" class="w-full lg:w-[60%] xl:w-[65%] flex flex-col gap-6">
                @csrf
                
                <!-- Section 1: Informasi Pengiriman -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-blue-700">
                        <i class="fa-solid fa-location-dot text-lg"></i>
                        <h2 class="text-lg font-bold text-slate-800">Informasi Pengiriman</h2>
                    </div>
                    
                    @if($address)
                        <div class="bg-[#f0f4f8] p-4 rounded-xl flex flex-col gap-1.5 relative border border-transparent">
                            <span class="absolute top-4 right-4 text-[10px] font-bold px-2 py-1 rounded bg-[#dce7ff] text-blue-700 uppercase tracking-wider">Tersimpan</span>
                            <span class="font-bold text-slate-800 text-sm">{{ $address->recipient_name }}</span>
                            <span class="text-sm text-slate-600">{{ $address->phone_number }}</span>
                            <span class="text-sm text-slate-600 leading-relaxed mt-1">{{ $address->full_address }}</span>
                        </div>
                    @else
                        <div class="bg-yellow-50 p-4 rounded-xl flex items-center gap-3 text-yellow-800 text-sm border border-yellow-200">
                            <i class="fa-solid fa-circle-exclamation"></i> Anda belum menambahkan alamat pengiriman.
                        </div>
                    @endif

                    <button @click="showAddressModal = true" type="button" class="w-full py-3 rounded-xl border-2 border-blue-100 text-blue-700 font-bold text-sm hover:bg-[#ebf1ff] transition-all flex items-center justify-center gap-2 mt-1">
                        <i class="fa-solid fa-pen-to-square"></i> {{ $address ? 'Ubah Alamat' : 'Tambah Alamat Baru' }}
                    </button>
                </div>

                <!-- Section 2: Opsi Pengiriman -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-blue-700">
                        <i class="fa-solid fa-truck-fast text-lg"></i>
                        <h2 class="text-lg font-bold text-slate-800">Opsi Pengiriman</h2>
                    </div>
                    
                    <div class="flex flex-col gap-3">
                        <label class="cursor-pointer p-4 rounded-xl transition-all flex items-start gap-3 border border-transparent" :class="shipping === 15000 ? 'bg-[#ebf1ff] border-blue-200' : 'bg-[#f8f9ff] hover:bg-slate-100'">
                            <input type="radio" name="shipping_cost" value="15000" x-model.number="shipping" class="mt-1 w-4 h-4 text-blue-700">
                            <div class="flex flex-col flex-1">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-bold text-slate-800 text-sm">Pengiriman Reguler</span>
                                    <span class="font-bold text-blue-700 text-sm">Rp 15.000</span>
                                </div>
                                <span class="text-xs text-slate-500 mt-1">Estimasi 2-3 Hari • SiCepat / J&T Express</span>
                            </div>
                        </label>

                        <label class="cursor-pointer p-4 rounded-xl transition-all flex items-start gap-3 border border-transparent" :class="shipping === 0 ? 'bg-[#ebf1ff] border-blue-200' : 'bg-[#f8f9ff] hover:bg-slate-100'">
                            <input type="radio" name="shipping_cost" value="0" x-model.number="shipping" class="mt-1 w-4 h-4 text-blue-700">
                            <div class="flex flex-col flex-1">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-bold text-slate-800 text-sm">Ambil Mandiri di Kampus</span>
                                    <span class="font-bold text-blue-700 text-sm">Gratis</span>
                                </div>
                                <span class="text-xs text-slate-500 mt-1">Koperasi Kampus Viktor Lt. 1</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Section 3: Catatan Pesanan -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-blue-700">
                        <i class="fa-solid fa-note-sticky text-lg"></i>
                        <h2 class="text-lg font-bold text-slate-800">Catatan Pesanan <span class="text-sm font-normal text-slate-500">(Opsional)</span></h2>
                    </div>
                    <textarea name="catatan" rows="2" placeholder="Contoh: Tolong packing yang rapi ya, atau pastikan ukurannya L." class="w-full bg-[#f8fafc] border border-slate-200 text-slate-800 rounded-xl px-4 py-3 outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-sm resize-none"></textarea>
                </div>

                <!-- Section 4: Metode Pembayaran -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-4">
                    <div class="flex items-center gap-2 text-blue-700">
                        <i class="fa-solid fa-wallet text-lg"></i>
                        <h2 class="text-lg font-bold text-slate-800">Metode Pembayaran</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-3">
                        <label class="cursor-pointer p-4 rounded-xl transition-all flex items-center justify-between border border-transparent bg-[#ebf1ff] border-blue-200">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" value="xendit_gateway" checked class="w-4 h-4 text-blue-700">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 text-sm">Transfer Bank / QRIS / E-Wallet</span>
                                    <span class="text-[11px] text-slate-500">Anda akan diarahkan ke halaman pembayaran Xendit.</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </form>

            <!-- KOLOM KANAN (Ringkasan) -->
            <div class="w-full lg:w-[40%] xl:w-[35%] sticky top-24 flex flex-col gap-6">
                <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold text-slate-800">Ringkasan Pesanan</h2>
                        <span class="text-[11px] font-bold px-2 py-1 rounded bg-[#ebf1ff] text-blue-700">{{ $cartItems->sum('qty') }} Barang</span>
                    </div>
                    
                    <div class="max-h-64 overflow-y-auto pr-2 space-y-3">
                        @foreach($cartItems as $item)
                        <div class="flex items-center gap-4 p-3 bg-[#f8f9ff] rounded-xl">
                            <div class="w-16 h-16 rounded-lg bg-[#ebf1ff] overflow-hidden flex-shrink-0 flex items-center justify-center">
                                @if(is_array($item->product->image) && count($item->product->image) > 0)
                                    <img src="{{ asset('storage/'.$item->product->image[0]) }}" class="w-full h-full object-cover">
                                @else
                                    <i class="fa-solid fa-shirt text-blue-300 text-2xl"></i>
                                @endif
                            </div>
                            <div class="flex flex-col flex-1">
                                <span class="font-bold text-slate-800 text-sm line-clamp-1">{{ $item->product->nama }}</span>
                                <div class="flex items-center justify-between mt-1">
                                    <span class="text-xs text-slate-500">{{ $item->qty }} x Rp {{ number_format($item->product->harga, 0, ',', '.') }}</span>
                                    <span class="font-bold text-slate-800 text-sm">Rp {{ number_format($item->product->harga * $item->qty, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="flex flex-col gap-3 pt-2">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500">Subtotal Produk</span>
                            <span class="font-medium text-slate-800">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500">Biaya Pengiriman</span>
                            <span class="font-medium text-slate-800" x-text="shipping === 0 ? 'Gratis' : formatRupiah(shipping)">Rp 15.000</span>
                        </div>
                        
                        <div class="w-full h-[1px] bg-gray-200 my-2"></div>
                        
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-slate-800 text-sm">Total Pembayaran</span>
                            <span class="text-2xl font-bold text-blue-700" x-text="formatRupiah(total)">Rp 0</span>
                        </div>
                    </div>

                    <button type="submit" form="checkout-form"
                            :disabled="shipping > 0 && {{ $address ? 'false' : 'true' }}"
                            class="w-full py-4 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold text-sm shadow-[0_4px_14px_0_rgba(6,81,237,0.39)] transition-all flex items-center justify-center gap-2 mt-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span x-text="shipping > 0 && {{ $address ? 'false' : 'true' }} ? 'Isi Alamat Terlebih Dahulu' : 'Lanjut Pembayaran'"></span>
                        <i class="fa-solid fa-arrow-right ml-1"></i>
                    </button>
                    
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL ALAMAT -->
    <div x-show="showAddressModal" style="display: none;" class="fixed inset-0 z-[100] bg-slate-900/30 backdrop-blur-md flex items-center justify-center p-4 sm:p-6" @keydown.escape.window="showAddressModal = false">
        <div x-show="showAddressModal" @click.away="showAddressModal = false" class="max-w-md w-full bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.15)] flex flex-col relative overflow-hidden">
            <button @click="showAddressModal = false" type="button" class="absolute top-6 right-6 w-8 h-8 rounded-full bg-slate-50 hover:bg-slate-200 text-slate-400 flex items-center justify-center z-10"><i class="fa-solid fa-xmark"></i></button>
            <div class="p-6 pb-2 flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-[#ebf1ff] text-blue-600 flex items-center justify-center"><i class="fa-solid fa-location-dot text-xl"></i></div>
                <div>
                    <h2 class="font-bold text-xl text-slate-800">Data Pengiriman</h2>
                    <p class="text-sm text-slate-500 font-medium">Lengkapi alamat Anda</p>
                </div>
            </div>
            <form action="{{ route('checkout.address') }}" method="POST" class="flex flex-col">
                @csrf
                <div class="p-6 flex flex-col gap-5">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">Nama Lengkap Penerima</label>
                        <input type="text" name="nama" placeholder="Masukkan nama lengkap" required class="w-full bg-[#f8fafc] border border-slate-200 text-slate-800 rounded-2xl px-4 py-3.5 outline-none focus:border-blue-500 text-sm">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">Nomor HP</label>
                        <input type="tel" name="no_hp" placeholder="Contoh: 081234567890" required class="w-full bg-[#f8fafc] border border-slate-200 text-slate-800 rounded-2xl px-4 py-3.5 outline-none focus:border-blue-500 text-sm">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" placeholder="Tuliskan jalan, patokan, RT/RW..." required class="w-full bg-[#f8fafc] border border-slate-200 text-slate-800 rounded-2xl px-4 py-3.5 outline-none focus:border-blue-500 text-sm resize-none"></textarea>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-2">
                    <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold text-base shadow-[0_8px_24px_-8px_rgba(37,99,235,0.6)]">Simpan Alamat <i class="fa-solid fa-check ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('checkoutData', () => ({
                showAddressModal: false, 
                shipping: 15000, 
                basePrice: {{ $subtotal }}, 
                
                get total() {
                    return this.basePrice + this.shipping;
                },
                
                formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
                }
            }))
        })
    </script>
</body>
</html>