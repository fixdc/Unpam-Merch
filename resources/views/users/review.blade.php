<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Ulasan | UNPAM Merch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Alpine.js untuk fitur Bintang -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        
        @include('components.sidebar')

        <main class="flex-1 flex flex-col h-full overflow-y-auto">
            @include('components.admin_navbar')

            <div class="p-6 md:p-8 space-y-6 w-full mx-auto">
                
                <div class="mb-4">
                    <h2 class="text-2xl font-extrabold text-gray-900">Nilai Produk</h2>
                    <p class="text-sm text-gray-500 mt-1">Bagaimana kepuasan kamu terhadap merchandise dari pesanan <strong>{{ $order->order_number }}</strong>?</p>
                </div>

                <form action="{{ route('user.order.submit_review', $order->id) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    @foreach($order->orderItems as $item)
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm flex flex-col md:flex-row gap-6">
                        
                        <!-- Info Produk -->
                        <div class="w-full md:w-1/3 flex items-start gap-4 border-b md:border-b-0 md:border-r border-gray-100 pb-4 md:pb-0 pr-0 md:pr-4">
                            <div class="w-20 h-20 rounded-xl bg-gray-100 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                                @if($item->product && $item->product->image && is_array($item->product->image) && count($item->product->image) > 0)
                                    <img src="{{ asset('storage/' . $item->product->image[0]) }}" alt="{{ $item->product->nama }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-2xl">👕</span>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-900 line-clamp-2">{{ $item->product->nama ?? 'Produk Dihapus' }}</h4>
                                <p class="text-xs text-gray-500 mt-1">Total: {{ $item->quantity }} pcs</p>
                            </div>
                        </div>

                        <!-- Area Input Review -->
                        <div class="w-full md:w-2/3 flex flex-col gap-4" x-data="{ rating: 5 }">
                            
                            <!-- Input Rating Bintang Tersembunyi (Dikirim ke Controller) -->
                            <input type="hidden" name="reviews[{{ $item->product_id }}][rating]" x-model="rating">
                            
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kualitas Produk</label>
                                <!-- Interaksi Bintang -->
                                <div class="flex gap-2 text-2xl">
                                    <template x-for="i in 5">
                                        <i class="cursor-pointer transition-colors" 
                                           :class="i <= rating ? 'fa-solid fa-star text-yellow-400' : 'fa-regular fa-star text-gray-300'" 
                                           @click="rating = i"></i>
                                    </template>
                                </div>
                                <p class="text-xs font-bold mt-1 text-gray-500" x-text="
                                    rating == 1 ? 'Sangat Buruk' : 
                                    rating == 2 ? 'Buruk' : 
                                    rating == 3 ? 'Cukup' : 
                                    rating == 4 ? 'Bagus' : 'Sangat Bagus!'
                                "></p>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tulis Ulasan (Opsional)</label>
                                <textarea name="reviews[{{ $item->product_id }}][coment]" rows="3" placeholder="Ceritakan pengalamanmu menggunakan merchandise ini..." class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl px-4 py-3 outline-none focus:bg-white focus:border-blue-500 transition-all text-sm resize-none"></textarea>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach

                    <!-- Tombol Submit -->
                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition shadow-md flex items-center gap-2">
                            Kirim Ulasan <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>

                </form>

            </div>
        </main>
    </div>

</body>
</html>