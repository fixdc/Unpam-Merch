<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - Admin UNPAM Merch</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>
<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        @include('components.admin_navbar')

        <div class="flex-1 overflow-auto p-8">
            <div class="mb-8 flex justify-between items-end">
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Kelola Pesanan</h2>
                    <p class="text-gray-500 text-sm mt-1">Pantau dan perbarui status transaksi pelanggan.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider">
                                <th class="p-4 font-semibold">Order ID</th>
                                <th class="p-4 font-semibold">Pelanggan</th>
                                <th class="p-4 font-semibold">Tanggal</th>
                                <th class="p-4 font-semibold">Total</th>
                                <th class="p-4 font-semibold">Status</th>
                                <th class="p-4 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @forelse($orders as $order)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="p-4 font-bold text-gray-900">{{ $order->order_number }}</td>
                                <td class="p-4">{{ $order->user->name }}</td>
                                <td class="p-4 text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}</td>
                                <td class="p-4 font-semibold text-blue-600">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                <td class="p-4">
                                    @if($order->status == 'pending') <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded text-[10px] font-bold uppercase">Pending</span>
                                    @elseif(in_array($order->status, ['dibayar', 'diproses'])) <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded text-[10px] font-bold uppercase">Diproses</span>
                                    @elseif($order->status == 'siap_ambil') <span class="px-2.5 py-1 bg-purple-50 text-purple-600 rounded text-[10px] font-bold uppercase">Siap Ambil</span>
                                    @elseif($order->status == 'dikirim') <span class="px-2.5 py-1 bg-indigo-50 text-indigo-600 rounded text-[10px] font-bold uppercase">Dikirim</span>
                                    @elseif($order->status == 'selesai') <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded text-[10px] font-bold uppercase">Selesai</span>
                                    @else <span class="px-2.5 py-1 bg-red-50 text-red-600 rounded text-[10px] font-bold uppercase">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-block bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-500">Belum ada pesanan masuk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>