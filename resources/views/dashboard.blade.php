<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unpam.merch Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font Plus Jakarta Sans jika ingin dipastikan aktif -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        jakarta: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-jakarta text-gray-800">

    <!-- PERBAIKAN DI SINI: Gunakan h-screen dan overflow-hidden pada pembungkus utama -->
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar (Otomatis diam di tempat karena parent-nya h-screen) -->
        @include('components.sidebar')

        <!-- KONTEN UTAMA: overflow-y-auto membuat bagian ini saja yang bisa di-scroll -->
        <main class="flex-1 flex flex-col h-full overflow-y-auto">
            <!-- HEADER / NAVBAR ATAS -->
            <header class="h-16 bg-white border-b border-gray-200 px-6 flex items-center justify-between sticky top-0 z-20 shrink-0">
                <!-- Search Bar -->
                <div class="w-full max-w-md">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" placeholder="Cari pesanan saya, merchandise, atau..." class="w-full pl-10 pr-4 py-2 bg-gray-100 border-none rounded-full text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- User Profile & Notifikasi -->
                <div class="flex items-center gap-4">
                    <button class="relative text-gray-500 hover:text-gray-700">
                        <i class="fa-solid fa-cart-shopping text-lg"></i>
                    </button>
                    <button class="relative text-gray-500 hover:text-gray-700">
                        <i class="fa-regular fa-bell text-lg"></i>
                    </button>
                    <div class="flex items-center gap-3 pl-2 border-l border-gray-200">
                        <img src="https://i.ibb.co.com/dswNQTfY/Whats-App-Image-2026-09-16-at-22-47-20.jpg" alt="Avatar" class="w-9 h-9 rounded-full object-cover">
                        <div class="hidden sm:block text-right">
                            <p class="text-xs font-bold text-gray-900">Fandi Tuankotta</p>
                            <p class="text-[10px] text-gray-500">241011400402 • Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ISI DASHBOARD -->
            <div class="p-6 md:p-8 space-y-6 max-w-7xl w-full mx-auto">
                
                <!-- BANNER SELAMAT DATANG -->
                <div class="bg-white p-6 rounded-2xl border border-gray-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <img src="https://i.ibb.co.com/dswNQTfY/Whats-App-Image-2026-09-16-at-22-47-20.jpg" alt="Profile" class="w-16 h-16 rounded-full object-cover border-2 border-blue-500">
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h2 class="text-xl font-bold text-gray-900">Halo, Fandi Tuankotta! 👋</h2>
                                <span class="bg-blue-50 text-blue-600 text-xs px-2.5 py-0.5 rounded-full font-medium flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check text-[10px]"></i> Mahasiswa Aktif
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">NIM: 241011400402 • Teknik Informatika • Kampus Viktor</p>
                            <p class="text-xs text-gray-500 mt-0.5">Kelola pesanan merchandise kampus, tiket pickup loket Viktor, dan pengaturan profil kamu dalam satu tempat.</p>
                        </div>
                    </div>
                </div>

                <!-- 3 KARTU INFORMASI UTAMA -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <!-- Kartu 1: Pesanan Aktif -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded-xl">
                                    <i class="fa-solid fa-box-open"></i>
                                </div>
                                <span class="bg-emerald-50 text-emerald-600 text-[11px] px-2.5 py-1 rounded-full font-medium">
                                    ● Siap Diambil
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 font-medium">Pesanan Aktif</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">1 Pesanan</h3>
                            <p class="text-xs text-gray-600 mt-1 truncate">Jaket Varsity UNPAM Navy • Kode: #UNP-...</p>
                        </div>
                        <div class="border-t border-gray-100 mt-4 pt-3 flex justify-between items-center text-xs">
                            <span class="text-gray-500">Loket Viktor Lt. 1</span>
                            <a href="#" class="text-blue-600 font-semibold hover:underline">QR Loket ></a>
                        </div>
                    </div>

                    <!-- Kartu 2: Total Belanja -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded-xl">
                                    <i class="fa-solid fa-wallet"></i>
                                </div>
                                <span class="bg-gray-100 text-gray-600 text-[11px] px-2.5 py-1 rounded-full font-medium">
                                    Semester Genap
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 font-medium">Total Belanja</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">Rp 000.00</h3>
                            <p class="text-xs text-gray-500 mt-1">3 transaksi selesai • Hemat Rp 00.000 via diskon mahasiswa</p>
                        </div>
                        <div class="border-t border-gray-100 mt-4 pt-3 flex justify-between items-center text-xs">
                            <span class="text-gray-500">Riwayat Faktur</span>
                            <i class="fa-solid fa-rotate-right text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Kartu 3: Voucher Mahasiswa -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded-xl">
                                    <i class="fa-solid fa-ticket"></i>
                                </div>
                                <span class="bg-blue-50 text-blue-600 text-[11px] px-2.5 py-1 rounded-full font-medium">
                                    Aktif
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 font-medium">Voucher Mahasiswa</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">2 Tersedia</h3>
                            <p class="text-xs text-gray-500 mt-1">Diskon 15% Dies Natalis & Gratis Ongkir Viktor</p>
                        </div>
                        <div class="border-t border-gray-100 mt-4 pt-3 flex justify-between items-center text-xs">
                            <span class="text-gray-500">Berlaku s/d 30 Juni</span>
                            <a href="#" class="text-blue-600 font-semibold hover:underline">Gunakan</a>
                        </div>
                    </div>
                </div>

                <!-- SECTION: TAB MENU PESANAN SAYA -->
                <div class="space-y-4">
                    <!-- Tab Navigation -->
                    <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                        <div class="flex items-center gap-6">
                            <button class="flex items-center gap-2 text-sm font-bold text-blue-600 border-b-2 border-blue-600 pb-3 -mb-3">
                                <i class="fa-solid fa-bag-shopping"></i> Pesanan Saya
                            </button>
                            <button class="flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-800 pb-3 -mb-3">
                                <i class="fa-solid fa-user-gear"></i> Pengaturan Akun & Preferensi
                            </button>
                        </div>

                        <!-- Filter Status Pesanan -->
                        <div class="hidden sm:flex items-center gap-2">
                            <button class="px-3.5 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-full">Semua (3)</button>
                            <button class="px-3.5 py-1.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full hover:bg-gray-200">Siap Pickup (1)</button>
                            <button class="px-3.5 py-1.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full hover:bg-gray-200">Selesai (2)</button>
                        </div>
                    </div>

                    <!-- LIST ITEM PESANAN -->
                    <div class="space-y-4">

                        <!-- Item 1: Siap Diambil -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-200 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full lg:w-auto">
                                <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=200&q=80" alt="Jaket Varsity" class="w-20 h-20 rounded-xl object-cover border border-gray-100">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="bg-emerald-50 text-emerald-600 text-[10px] px-2 py-0.5 rounded-md font-medium">
                                            ● Siap Diambil di Loket Viktor
                                        </span>
                                        <span class="text-xs text-gray-400">INV-202405-089</span>
                                    </div>
                                    <h4 class="text-sm font-bold text-gray-900">Jaket Varsity UNPAM Navy • Official Edition</h4>
                                    <p class="text-xs text-gray-500">Ukuran: L • Jumlah: 1 pcs • Bahan Premium Fleece Wool</p>
                                    <div class="flex items-center gap-3 pt-1">
                                        <span class="text-sm font-bold text-gray-900">Rp 000.000</span>
                                        <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-0.5 rounded font-medium">Metode: QRIS Kampus</span>
                                    </div>
                                </div>
                            </div>

                            <!-- QR Verifikasi Box -->
                            <div class="w-full lg:w-auto bg-gray-50 border border-gray-200/80 p-4 rounded-xl flex flex-col sm:flex-row items-center justify-between lg:justify-end gap-4">
                                <div class="text-left lg:text-right">
                                    <p class="text-[11px] text-gray-500">Kode Verifikasi Loket:</p>
                                    <p class="text-base font-extrabold text-gray-900 tracking-wider">#UNP-8921</p>
                                    <p class="text-[10px] text-gray-400">Loket Merch Gd. Viktor Lt. 1 (Jam 09:00 - 17:00)</p>
                                </div>
                                <div class="flex items-center gap-2 w-full sm:w-auto">
                                    <button class="flex-1 sm:flex-none bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium px-4 py-2.5 rounded-xl transition flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-qrcode"></i> Tampilkan QR Pickup
                                    </button>
                                    <button class="bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-medium px-3.5 py-2.5 rounded-xl transition flex items-center justify-center gap-1.5">
                                        <i class="fa-solid fa-file-invoice"></i> Invoice
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Item 2: Selesai -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-200 space-y-4">
                            <div class="flex justify-between items-center text-xs border-b border-gray-100 pb-3">
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-600 font-semibold flex items-center gap-1">
                                        <i class="fa-solid fa-circle-check"></i> Pesanan Selesai
                                    </span>
                                    <span class="text-gray-300">•</span>
                                    <span class="text-gray-500">12 Mei 2024, 00:00 WIB</span>
                                </div>
                                <span class="text-gray-500 font-medium">No. Order: #UNP-7740</span>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=150&q=80" alt="Kaos" class="w-14 h-14 rounded-xl object-cover border border-gray-100">
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-900">Kaos Katun 'Rep Your Campus' UNPAM</h4>
                                        <p class="text-xs text-gray-500">Ukuran: XL • Warna: Jet Black • 1 pcs</p>
                                        <p class="text-xs font-bold text-gray-900 mt-1">Rp 000.000</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 w-full sm:w-auto justify-end">
                                    <button class="px-4 py-2 border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-medium rounded-xl transition">Beri Ulasan</button>
                                    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-xl transition">Beli Lagi</button>
                                </div>
                            </div>
                        </div>

                        <!-- Item 3: Selesai -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-200 space-y-4">
                            <div class="flex justify-between items-center text-xs border-b border-gray-100 pb-3">
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-600 font-semibold flex items-center gap-1">
                                        <i class="fa-solid fa-circle-check"></i> Pesanan Selesai
                                    </span>
                                    <span class="text-gray-300">•</span>
                                    <span class="text-gray-500">20 April 2024, 00:00 WIB</span>
                                </div>
                                <span class="text-gray-500 font-medium">No. Order: #UNP-6112</span>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?auto=format&fit=crop&w=150&q=80" alt="Lanyard" class="w-14 h-14 rounded-xl object-cover border border-gray-100">
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-900">Lanyard Holder & Sticker Pack Dies Natalis</h4>
                                        <p class="text-xs text-gray-500">1x Lanyard Royal Blue + 5x Die Cut Waterproof Vinyl Sticker</p>
                                        <p class="text-xs font-bold text-gray-900 mt-1">Rp 000.000</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 w-full sm:w-auto justify-end">
                                    <button class="px-4 py-2 border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-medium rounded-xl transition">Lihat Bukti Ambil</button>
                                    <button class="px-4 py-2 border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-medium rounded-xl transition">Detail</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>