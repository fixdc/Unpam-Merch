<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Keuangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body { background-color: white !important; }
            .no-print { display: none !important; }
        }
        body { font-family: 'Courier New', Courier, monospace; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f3f4f6; }
    </style>
</head>
<body class="bg-gray-100 p-8" onload="window.print()">

    <div class="max-w-4xl mx-auto bg-white p-8 shadow-md">
        
        <div class="text-center mb-8 border-b-2 border-black pb-4">
            <h1 class="text-2xl font-bold uppercase">Laporan Pendapatan UNPAM Merch</h1>
            <p class="mt-1">Periode: {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</p>
        </div>

        <div class="mb-4">
            <p><strong>Total Transaksi Selesai:</strong> {{ $orders->count() }}</p>
            <p><strong>Total Pendapatan:</strong> Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pesanan</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Metode Pembayaran</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->metode_pembayaran }}</td>
                    <td class="font-bold">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada transaksi pada periode ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-8 text-right">
            <p>Tangerang Selatan, {{ date('d M Y') }}</p>
            <br><br><br>
            <p><strong>( Admin UNPAM Merch )</strong></p>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-10 text-center no-print">
            <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded shadow font-sans">Simpan sebagai PDF / Cetak</button>
            <button onclick="window.close()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded shadow font-sans ml-2">Tutup</button>
        </div>
    </div>

</body>
</html>