<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Saya | unpam-merch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            <!-- HEADER -->
            @include('components.admin_navbar')

            <!-- ISI KONTEN KERANJANG -->
            <div class="p-6 md:p-8 w-full">
                
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Keranjang Belanja</h2>

                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-emerald-700 bg-emerald-100 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                @if($cartItems->isEmpty())
                    <div class="bg-white p-10 rounded-2xl border border-gray-200 text-center flex flex-col items-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 mb-4">
                            <i class="fa-solid fa-cart-shopping text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Keranjangmu masih kosong</h3>
                        <p class="text-sm text-gray-500 mb-6">Yuk, cari merchandise kampus favoritmu sekarang!</p>
                        <a href="/product" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition">Mulai Belanja</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        
                        <!-- KIRI: DAFTAR PRODUK -->
                        <div class="lg:col-span-2 space-y-4">
                            @foreach($cartItems as $item)
                            <div class="bg-white p-4 rounded-2xl border border-gray-200 flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                                <!-- Gambar Produk -->
                                @if($item->product && $item->product->image && is_array($item->product->image) && count($item->product->image) > 0)
                                    <img src="{{ asset('storage/' . $item->product->image[0]) }}" alt="{{ $item->product->nama }}" class="w-24 h-24 rounded-xl object-cover border border-gray-100">
                                @else
                                    <div class="w-24 h-24 rounded-xl bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-400 text-3xl">
                                        📷
                                    </div>
                                @endif
                                
                                <!-- Info Produk -->
                                <div class="flex-1 w-full">
                                    <h4 class="text-base font-bold text-gray-900">{{ $item->product->nama }}</h4>
                                    <p class="text-xs text-gray-500 mb-2">Kategori: {{ $item->product->category->nama ?? 'Merchandise' }}</p>
                                    <p class="text-sm font-bold text-blue-600">Rp {{ number_format($item->product->harga, 0, ',', '.') }}</p>
                                </div>

                                <!-- Aksi & Qty -->
                                <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end mt-2 sm:mt-0">
                                    
                                    <!-- Form Update Qty -->
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center border border-gray-200 rounded-lg">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="qty" value="{{ $item->qty - 1 }}" class="px-3 py-1 text-gray-500 hover:bg-gray-100 rounded-l-lg transition" {{ $item->qty <= 1 ? 'disabled' : '' }}>-</button>
                                        
                                        <input type="text" value="{{ $item->qty }}" class="w-10 text-center text-sm font-medium border-x-0 border-y-0 p-0 focus:ring-0 text-gray-900" readonly>
                                        
                                        <button type="submit" name="qty" value="{{ $item->qty + 1 }}" class="px-3 py-1 text-gray-500 hover:bg-gray-100 rounded-r-lg transition">+</button>
                                    </form>

                                    <!-- Form Hapus -->
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus produk dari keranjang?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-lg transition">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- KANAN: RINGKASAN PESANAN -->
                        <div class="lg:col-span-1">
                            <div class="bg-white p-6 rounded-2xl border border-gray-200 sticky top-24">
                                <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-3">Ringkasan Pesanan</h3>
                                
                                <div class="space-y-3 mb-4">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-500">Total Harga ({{ $cartItems->sum('qty') }} barang)</span>
                                        <span class="font-medium text-gray-900">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                    </div>
                                </div>

                                <div class="border-t pt-4 mb-6">
                                    <div class="flex justify-between items-center">
                                        <span class="text-base font-bold text-gray-900">Total Belanja</span>
                                        <span class="text-lg font-extrabold text-blue-600">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                    </div>
                                </div>

                                <a href="#" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-xl transition">
                                    Lanjut ke Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>

</body>
</html>