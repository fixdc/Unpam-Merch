<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Admin UNPAM Merch</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>
<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        @include('components.admin_navbar')

        <div class="flex-1 overflow-auto p-8">
            
            <div class="mb-6 flex items-center gap-4">
                <a href="{{ route('admin.orders.index') }}" class="w-10 h-10 bg-white border border-gray-200 rounded-xl flex items-center justify-center text-gray-600 hover:bg-gray-50 transition">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Detail Pesanan #{{ $order->order_number }}</h2>
                    <p class="text-gray-500 text-sm mt-1">{{ $order->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>

            @if(session('success'))
                <div class="p-4 mb-6 text-sm text-emerald-700 bg-emerald-100 rounded-xl font-medium border border-emerald-200">
                    <i class="fa-solid fa-circle-check mr-1"></i> {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- KOLOM KIRI: Informasi Pesanan -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Rincian Produk -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Produk yang Dipesan</h3>
                        <div class="space-y-4">
                            @foreach($order->orderItems as $item)
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-xl bg-gray-50 border border-gray-100 overflow-hidden flex items-center justify-center">
                                    @if(is_array($item->product->image) && count($item->product->image) > 0)
                                        <img src="{{ asset('storage/'.$item->product->image[0]) }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fa-solid fa-shirt text-gray-300 text-xl"></i>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-sm text-gray-900">{{ $item->product->nama }}</p>
                                    <p class="text-xs text-gray-500 mt-1">Harga: Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold text-gray-900">x{{ $item->quantity }}</p>
                                    <p class="text-sm font-extrabold text-blue-600 mt-1">Rp {{ number_format($item->harga_satuan * $item->quantity, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Informasi Pelanggan & Pengiriman -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                            <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Informasi Pelanggan</h3>
                            <div class="space-y-2 text-sm">
                                <p><span class="text-gray-500">Nama:</span> <span class="font-semibold">{{ $order->user->name }}</span></p>
                                <p><span class="text-gray-500">Email:</span> <span class="font-semibold">{{ $order->user->email }}</span></p>
                                <p><span class="text-gray-500">No. HP Akun:</span> <span class="font-semibold">{{ $order->user->no_telp ?? '-' }}</span></p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                            <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Pengiriman</h3>
                            @if($order->address)
                                <span class="inline-block px-2 py-1 bg-indigo-50 text-indigo-700 text-[10px] font-bold rounded mb-2 uppercase tracking-wider">Kurir Online</span>
                                <div class="text-sm space-y-1">
                                    <p class="font-bold text-gray-900">{{ $order->address->recipient_name }}</p>
                                    <p class="text-gray-600">{{ $order->address->phone_number }}</p>
                                    <p class="text-gray-500">{{ $order->address->full_address }}</p>
                                </div>
                            @else
                                <span class="inline-block px-2 py-1 bg-purple-50 text-purple-700 text-[10px] font-bold rounded mb-2 uppercase tracking-wider">Ambil Mandiri (Pickup)</span>
                                <p class="text-sm text-gray-500">Pembeli akan mengambil pesanan secara mandiri di Loket Koperasi Gedung Viktor.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Catatan Pesanan -->
                    @if($order->catatan)
                    <div class="bg-yellow-50 rounded-2xl border border-yellow-200 p-6">
                        <h3 class="font-bold text-yellow-900 mb-2 flex items-center gap-2"><i class="fa-solid fa-note-sticky"></i> Catatan Pembeli</h3>
                        <p class="text-sm text-yellow-800">{{ $order->catatan }}</p>
                    </div>
                    @endif

                </div>

                <!-- KOLOM KANAN: Update Status -->
                <div class="lg:col-span-1 space-y-6">
                    
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Ringkasan Pembayaran</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Metode:</span>
                                <span class="font-semibold">{{ $order->metode_pembayaran }}</span>
                            </div>
                            <div class="w-full h-px bg-gray-100"></div>
                            <div class="flex justify-between font-bold">
                                <span class="text-gray-900">Total Harga:</span>
                                <span class="text-blue-600 text-lg">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Update Status & Resi -->
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6 relative overflow-hidden" x-data="{ status: '{{ $order->status }}' }">
                        @csrf
                        @method('PUT')
                        <div class="absolute top-0 left-0 w-full h-1 bg-blue-500"></div>
                        
                        <h3 class="font-bold text-gray-900 mb-4">Perbarui Status Pesanan</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">Status Saat Ini</label>
                                <select name="status" x-model="status" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl px-4 py-3 outline-none focus:border-blue-500 transition cursor-pointer font-medium">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending (Belum Dibayar)</option>
                                    <option value="dibayar" {{ $order->status == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                                    <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses (Packing)</option>
                                    
                                    @if($order->address)
                                        <!-- Khusus pesanan online -->
                                        <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>Dikirim (Input Resi)</option>
                                        <option value="terkirim" {{ $order->status == 'terkirim' ? 'selected' : '' }}>Terkirim</option>
                                        @else
                                        <!-- Khusus pesanan pickup -->
                                        <option value="siap_ambil" {{ $order->status == 'siap_ambil' ? 'selected' : '' }}>Siap Ambil di Kampus</option>
                                    @endif
                                    
                                    <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $order->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>

                            <!-- Input Resi (Hanya muncul jika pesanan punya alamat/online DAN statusnya 'dikirim') -->
                            @if($order->address)
                            <div x-show="status === 'dikirim'" x-transition class="bg-blue-50 p-4 rounded-xl border border-blue-100 space-y-2" style="display: {{ $order->status == 'dikirim' ? 'block' : 'none' }};">
                                <label class="block text-xs font-semibold text-blue-900">Nomor Resi Pengiriman</label>
                                <input type="text" name="resi" value="{{ old('resi', $order->resi) }}" placeholder="Contoh: JP8383839292" class="w-full bg-white border border-blue-200 text-gray-900 text-sm rounded-lg px-4 py-2.5 outline-none focus:border-blue-500 transition uppercase tracking-wider">
                                <p class="text-[10px] text-blue-600">Masukkan resi agar pelanggan bisa melacak paketnya.</p>
                            </div>
                            @endif

                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition shadow-md flex items-center justify-center gap-2 mt-2">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </main>
</body>
</html>