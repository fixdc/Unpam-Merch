<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pesanan {{ $order->order_number }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body { background-color: white !important; }
            .no-print { display: none !important; }
        }
        body { font-family: 'Courier New', Courier, monospace; }
    </style>
</head>
<body class="bg-gray-100 flex justify-center py-8" onload="window.print()">

    <div class="bg-white p-8 w-full max-w-md shadow-lg rounded-xl border border-gray-200 text-sm text-gray-800">
        
        <!-- Header Toko -->
        <div class="text-center mb-6 border-b-2 border-dashed border-gray-300 pb-6">
            <h1 class="text-2xl font-bold uppercase tracking-wider">UNPAM MERCH</h1>
            <p class="text-xs text-gray-500 mt-1">Gedung Viktor Lt. 1, Universitas Pamulang</p>
            <p class="text-xs text-gray-500">Tangerang Selatan, Banten</p>
        </div>

        <!-- Info Pesanan -->
        <div class="mb-6 space-y-1">
            <div class="flex justify-between">
                <span>No. Pesanan:</span>
                <span class="font-bold">{{ $order->order_number }}</span>
            </div>
            <div class="flex justify-between">
                <span>Tanggal:</span>
                <span>{{ $order->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Pelanggan:</span>
                <span class="uppercase">{{ $order->user->name }}</span>
            </div>
            <div class="flex justify-between">
                <span>Status:</span>
                <span class="uppercase font-bold">{{ $order->status }}</span>
            </div>
        </div>

        <!-- Daftar Barang -->
        <div class="border-t-2 border-b-2 border-dashed border-gray-300 py-4 mb-6 space-y-4">
            @foreach($order->orderItems as $item)
                <div class="flex justify-between flex-col">
                    <span class="font-bold uppercase">{{ $item->product->nama ?? 'Produk Dihapus' }}</span>
                    <div class="flex justify-between mt-1 text-gray-600">
                        <span>{{ $item->quantity }}x @ Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}</span>
                        <span>Rp{{ number_format($item->harga_satuan * $item->quantity, 0, ',', '.') }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Rincian Biaya -->
        <div class="mb-6 space-y-2">
            <div class="flex justify-between font-bold text-lg">
                <span>TOTAL:</span>
                <span>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between text-xs text-gray-500">
                <span>Metode Pembayaran:</span>
                <span class="uppercase">{{ $order->metode_pembayaran }}</span>
            </div>
        </div>

        <!-- Footer Struk -->
        <div class="text-center text-xs text-gray-500 mt-8">
            <p>Terima kasih telah berbelanja di UNPAM Merch!</p>
            <p class="mt-1">Barang yang sudah dibeli tidak dapat ditukar/dikembalikan.</p>
        </div>

        <!-- Tombol Print Manual (Sembunyi saat dicetak) -->
        <div class="mt-8 text-center no-print">
            <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold shadow-md hover:bg-blue-700 font-sans">
                Cetak Ulang
            </button>
            <button onclick="window.close()" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-bold shadow-sm hover:bg-gray-300 font-sans ml-2">
                Tutup
            </button>
        </div>

    </div>

</body>
</html>