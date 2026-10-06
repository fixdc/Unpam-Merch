<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | unpam-merch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: { fontFamily: { jakarta: ['"Plus Jakarta Sans"', 'sans-serif'], } }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-jakarta text-gray-800">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        @include('components.sidebar')

        <main class="flex-1 flex flex-col h-full overflow-y-auto">
            <!-- HEADER -->
            @include('components.admin_navbar')

            <!-- ISI DASHBOARD -->
            <div class="p-6 md:p-8 space-y-6 max-w-7xl w-full mx-auto">

                <!-- BANNER SELAMAT DATANG -->
                <div
                    class="bg-white p-6 rounded-2xl border border-gray-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                            alt="Profile" class="w-16 h-16 rounded-full object-cover border-2 border-blue-500">
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h2 class="text-xl font-bold text-gray-900">Halo, {{ explode(' ', $user->name)[0] }}! 👋
                                </h2>
                                <span
                                    class="bg-blue-50 text-blue-600 text-xs px-2.5 py-0.5 rounded-full font-medium flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check text-[10px]"></i> Mahasiswa Aktif
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">NIM: {{ $user->nim ?? '-' }} •
                                {{ $user->major ?? 'Teknik Informatika' }} • {{ $user->campus ?? 'Kampus Viktor' }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">Kelola pesanan merchandise kampus dan pengaturan
                                profil kamu dalam satu tempat.</p>
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
                            </div>
                            <p class="text-xs text-gray-500 font-medium">Pesanan Aktif</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $activeOrders->count() }} Pesanan</h3>
                        </div>
                        <div class="border-t border-gray-100 mt-4 pt-3 flex justify-between items-center text-xs">
                            <span class="text-gray-500">Loket Viktor Lt. 1</span>
                            <a href="#orders" class="text-blue-600 font-semibold hover:underline">Lihat Pesanan ></a>
                        </div>
                    </div>

                    <!-- Kartu 2: Total Belanja -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded-xl">
                                    <i class="fa-solid fa-wallet"></i>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 font-medium">Total Belanja</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">Rp
                                {{ number_format($totalSpent, 0, ',', '.') }}</h3>
                            <p class="text-xs text-gray-500 mt-1">{{ $completedCount }} transaksi selesai</p>
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
                            </div>
                            <p class="text-xs text-gray-500 font-medium">Voucher Tersedia</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $activeVouchersCount }} Voucher</h3>
                        </div>
                        <div class="border-t border-gray-100 mt-4 pt-3 flex justify-between items-center text-xs">
                            <a href="#" class="text-blue-600 font-semibold hover:underline">Lihat Voucher</a>
                        </div>
                    </div>
                </div>

                <!-- SECTION: TAB MENU PESANAN SAYA -->
                <div id="orders" class="space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                        <div class="flex items-center gap-6">
                            <button
                                class="flex items-center gap-2 text-sm font-bold text-blue-600 border-b-2 border-blue-600 pb-3 -mb-3">
                                <i class="fa-solid fa-bag-shopping"></i> Pesanan Saya
                            </button>
                        </div>
                    </div>

                    <div class="space-y-4">

                        @forelse($activeOrders as $order)
                            <!-- Item Aktif -->
                            <div
                                class="bg-white p-5 rounded-2xl border border-gray-200 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full lg:w-auto">
                                    @php
                                        // Ambil item/barang pertama dari pesanan ini
                                        $firstItem = $order->orderItems->first();
                                    @endphp

                                    @if($firstItem && $firstItem->product && is_array($firstItem->product->image) && count($firstItem->product->image) > 0)
                                        <img src="{{ asset('storage/' . $firstItem->product->image[0]) }}"
                                            class=" w-24 rounded-md object-cover">
                                    @else
                                        <i class="fa-solid fa-shirt text-blue-300 text-2xl"></i>
                                    @endif
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span
                                                class="bg-emerald-50 text-emerald-600 text-[10px] px-2 py-0.5 rounded-md font-medium uppercase">
                                                ● {{ str_replace('_', ' ', $order->status) }}
                                            </span>
                                            <span class="text-xs text-gray-400">{{ $order->invoice_number }}</span>
                                        </div>
                                        <h4 class="text-sm font-bold text-gray-900">
                                            {{ $order->items->first()->product->nama }}</h4>
                                        <p class="text-xs text-gray-500">Total Item: {{ $order->items->sum('quantity') }}
                                            pcs</p>
                                        <div class="flex items-center gap-3 pt-1">
                                            <span class="text-sm font-bold text-gray-900">Rp
                                                {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>

                                @if($order->status == 'ready_for_pickup')
                                    <!-- QR Verifikasi Box untuk Pickup -->
                                    <div
                                        class="w-full lg:w-auto bg-gray-50 border border-gray-200/80 p-4 rounded-xl flex flex-col sm:flex-row items-center justify-between lg:justify-end gap-4">
                                        <div class="text-left lg:text-right">
                                            <p class="text-[11px] text-gray-500">Kode Verifikasi Loket:</p>
                                            <p class="text-base font-extrabold text-gray-900 tracking-wider">
                                                #{{ substr($order->invoice_number, -4) }}</p>
                                        </div>
                                        <div class="flex items-center gap-2 w-full sm:w-auto">
                                            <button
                                                class="flex-1 sm:flex-none bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium px-4 py-2.5 rounded-xl transition flex items-center justify-center gap-2">
                                                <i class="fa-solid fa-qrcode"></i> QR Pickup
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="text-center py-8 text-sm text-gray-500 bg-white rounded-2xl border border-gray-200">
                                Tidak ada pesanan aktif saat ini.
                            </div>
                        @endforelse

                        @foreach($completedOrders as $order)
                            <!-- Item Selesai -->
                            <div class="bg-white p-5 rounded-2xl border border-gray-200 space-y-4">
                                <div class="flex justify-between items-center text-xs border-b border-gray-100 pb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="text-emerald-600 font-semibold flex items-center gap-1">
                                            <i class="fa-solid fa-circle-check"></i> Pesanan Selesai
                                        </span>
                                        <span class="text-gray-300">•</span>
                                        <span class="text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}
                                            WIB</span>
                                    </div>
                                    <span class="text-gray-500 font-medium">No. Order: {{ $order->invoice_number }}</span>
                                </div>
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('storage/' . $order->items->first()->product->image) }}"
                                            alt="Product Image"
                                            class="w-14 h-14 rounded-xl object-cover border border-gray-100">
                                        <div>
                                            <h4 class="text-sm font-bold text-gray-900">
                                                {{ $order->items->first()->product->name }}</h4>
                                            <p class="text-xs text-gray-500">Total Item:
                                                {{ $order->items->sum('quantity') }} pcs</p>
                                            <p class="text-xs font-bold text-gray-900 mt-1">Rp
                                                {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 w-full sm:w-auto justify-end">
                                        <button
                                            class="px-4 py-2 border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-medium rounded-xl transition">Beri
                                            Ulasan</button>
                                        <a href="#"
                                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-xl transition">Beli
                                            Lagi</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </main>
    </div>

</body>

</html>