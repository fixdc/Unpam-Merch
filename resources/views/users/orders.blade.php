<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya | UNPAM Merch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
            <!-- Navbar -->
            @include('components.admin_navbar')

            <!-- Konten Utama -->
            <div class="p-6 md:p-8 space-y-6 w-full mx-auto">
                
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-900">Pesanan Saya</h2>
                        <p class="text-sm text-gray-500 mt-1">Daftar riwayat dan status transaksi merchandise kamu.</p>
                    </div>
                </div>

                <!-- Daftar Pesanan -->
                <div class="space-y-4">
                    @forelse($orders as $order)
                        <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm flex flex-col gap-4">
                            
                            <!-- Header Kartu Pesanan -->
                            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-gray-100 pb-3">
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-gray-900 text-sm">{{ $order->order_number }}</span>
                                    <span class="text-xs text-gray-400">•</span>
                                    <span class="text-xs text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div>
                                    @if($order->status == 'pending')
                                        <span class="px-2.5 py-1 bg-amber-50 text-amber-600 border border-amber-200 rounded-md text-[10px] font-extrabold uppercase">Pending</span>
                                    @elseif($order->status == 'dibayar' || $order->status == 'diproses')
                                        <span class="px-2.5 py-1 bg-blue-50 text-blue-600 border border-blue-200 rounded-md text-[10px] font-extrabold uppercase">Diproses</span>
                                    @elseif($order->status == 'siap_ambil')
                                        <span class="px-2.5 py-1 bg-purple-50 text-purple-600 border border-purple-200 rounded-md text-[10px] font-extrabold uppercase">Siap Ambil</span>
                                    @elseif($order->status == 'dikirim')
                                        <span class="px-2.5 py-1 bg-indigo-50 text-indigo-600 border border-indigo-200 rounded-md text-[10px] font-extrabold uppercase">Dikirim</span>
                                    @elseif($order->status == 'terkirim') <!-- TAMBAHAN STATUS BARU -->
                                        <span class="px-2.5 py-1 bg-cyan-50 text-cyan-600 border border-cyan-200 rounded-md text-[10px] font-extrabold uppercase">Terkirim</span>
                                    @elseif($order->status == 'selesai')
                                        <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-md text-[10px] font-extrabold uppercase">Selesai</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 border border-gray-200 rounded-md text-[10px] font-extrabold uppercase">{{ $order->status }}</span>
                                    @endif  
                                </div>
                            </div>

                            <!-- Detail Produk dalam Pesanan -->
                            <div class="space-y-3">
                                @foreach($order->orderItems as $item)
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-16 rounded-xl bg-gray-100 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                                            @if($item->product && $item->product->image && is_array($item->product->image) && count($item->product->image) > 0)
                                                <img src="{{ asset('storage/' . $item->product->image[0]) }}" alt="{{ $item->product->nama }}" class="w-full h-full object-cover">
                                            @else
                                                <span class="text-xl">👕</span>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-sm text-gray-900">{{ $item->product->nama ?? 'Produk Dihapus' }}</h4>
                                            <p class="text-xs text-gray-500 mt-0.5">{{ $item->quantity }} pcs x Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- KOTAK INFO TAMBAHAN (Catatan & Resi) -->
                            @if($order->catatan || $order->resi)
                                <div class="bg-blue-50/50 rounded-xl p-3.5 text-xs space-y-2 border border-blue-100 mt-1">
                                    @if($order->catatan)
                                        <p class="text-slate-700">
                                            <span class="font-bold text-slate-900"><i class="fa-solid fa-note-sticky mr-1 text-blue-600"></i> Catatan:</span> {{ $order->catatan }}
                                        </p>
                                    @endif
                                    
                                    @if($order->resi)
                                        <p class="text-slate-700 flex items-center gap-2">
                                            <span class="font-bold text-slate-900"><i class="fa-solid fa-truck-fast mr-1 text-blue-600"></i> No. Resi Kurir:</span> 
                                            <span class="font-mono bg-white px-2.5 py-1 rounded-md border border-blue-200 text-blue-700 font-bold tracking-widest uppercase shadow-sm">{{ $order->resi }}</span>
                                        </p>
                                    @endif
                                </div>
                            @endif
                            <!-- Footer Kartu (Total Harga & Tombol Cetak) -->
                            <div class="flex flex-wrap items-center justify-between gap-4 pt-3 border-t border-gray-100 mt-1">
                                <div>
                                    <span class="text-xs text-gray-500">Total Pembayaran:</span>
                                    <p class="text-base font-extrabold text-blue-600">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-gray-500 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-200 font-medium flex items-center">
                                        <i class="fa-solid fa-wallet mr-1.5 text-gray-400"></i> {{ $order->metode_pembayaran }}
                                    </span>
                                    
                                    <a href="{{ route('user.order.invoice', $order->id) }}" target="_blank" class="text-xs text-blue-600 bg-white hover:bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-200 font-bold flex items-center transition shadow-sm">
                                        <i class="fa-solid fa-print mr-1.5"></i> Cetak Struk
                                    </a>

                                    <!-- TOMBOL SELESAI (Hanya muncul jika status siap_ambil atau terkirim) -->
                                    @if(in_array($order->status, ['siap_ambil', 'terkirim']))
                                        <form action="{{ route('user.order.complete', $order->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-xs text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-lg font-bold flex items-center transition shadow-sm">
                                                <i class="fa-solid fa-check-circle mr-1.5"></i> Pesanan Diterima
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="bg-white rounded-2xl border border-gray-200 p-12 text-center">
                            <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                                <i class="fa-solid fa-box-open"></i>
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg">Belum Ada Pesanan</h3>
                            <p class="text-gray-500 text-sm mt-1 mb-6">Kamu belum pernah melakukan transaksi merchandise kampus.</p>
                            <a href="{{ route('product.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-2.5 rounded-xl transition shadow-md">
                                Belanja Sekarang
                            </a>
                        </div>
                    @endforelse
                </div>

            </div>
        </main>
    </div>

</body>
</html>