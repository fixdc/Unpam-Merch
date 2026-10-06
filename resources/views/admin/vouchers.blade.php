<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Voucher - UNPAM Merch</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>

<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <!-- MAIN CONTENT (Dibungkus x-data Alpine) -->
    <main class="flex-1 flex flex-col h-full overflow-hidden" 
          x-data="{ 
              openModal: false, 
              isEdit: false, 
              form: { id: '', kode_voucher: '', type_voucher: 'percent', nilai_diskon: '', kuota: '', expired_at: '', is_active: '1' },
              openAddModal() {
                  this.isEdit = false;
                  this.form = { id: '', kode_voucher: '', type_voucher: 'percent', nilai_diskon: '', kuota: '', expired_at: '', is_active: '1' };
                  this.openModal = true;
              },
              openEditModal(voucher) {
                  this.isEdit = true;
                  // Mengambil format YYYY-MM-DD
                  let dateOnly = voucher.expired_at ? voucher.expired_at.split(' ')[0] : '';
                  this.form = { 
                      id: voucher.id, 
                      kode_voucher: voucher.kode_voucher, 
                      type_voucher: voucher.type_voucher, 
                      nilai_diskon: voucher.nilai_diskon, 
                      kuota: voucher.kuota,
                      expired_at: dateOnly,
                      is_active: voucher.is_active ? '1' : '0'
                  };
                  this.openModal = true;
              }
          }">

        @include('components.admin_navbar')

        <!-- PAGE CONTENT -->
        <div class="flex-1 overflow-auto p-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Manajemen Voucher</h2>
                    <p class="text-gray-500 text-sm mt-1">Buat dan kelola kode promo untuk pelanggan.</p>
                </div>
                
                <button @click="openAddModal()" type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition shadow-md flex items-center gap-2">
                    <span>+</span> Tambah Voucher
                </button>
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-emerald-700 bg-emerald-100 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <!-- TABEL VOUCHER -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50/80 text-gray-500 font-semibold text-xs uppercase tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 whitespace-nowrap">Kode Promo</th>
                                <th class="px-6 py-4 whitespace-nowrap">Nilai Diskon</th>
                                <th class="px-6 py-4 whitespace-nowrap">Sisa Kuota</th>
                                <th class="px-6 py-4 whitespace-nowrap">Berlaku S/D</th>
                                <th class="px-6 py-4 whitespace-nowrap">Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($vouchers as $voucher)
                                <tr class="hover:bg-blue-50/50 transition-colors">
                                    <td class="px-6 py-4 font-bold text-gray-900 tracking-wider">
                                        <span class="bg-blue-100 text-blue-800 px-2.5 py-1 rounded-md">{{ $voucher->kode_voucher }}</span>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        @if($voucher->type_voucher == 'percent')
                                            {{ $voucher->nilai_diskon }}%
                                        @else
                                            Rp {{ number_format($voucher->nilai_diskon, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-700">
                                        {{ $voucher->kuota }} <span class="text-xs text-gray-400">kali</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">
                                        {{ \Carbon\Carbon::parse($voucher->expired_at)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($voucher->is_active && \Carbon\Carbon::parse($voucher->expired_at)->isFuture() && $voucher->kuota > 0)
                                            <span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-[10px] font-bold">Aktif</span>
                                        @else
                                            <span class="px-2.5 py-1 bg-gray-100 text-gray-600 rounded-md text-[10px] font-bold">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <button @click="openEditModal({{ json_encode($voucher) }})" class="text-yellow-800 bg-yellow-200 rounded-md py-1.5 px-2.5 hover:bg-yellow-500 hover:text-white transition text-xs font-semibold">✏️</button>
                                            
                                            <form action="{{ route('voucher.destroy', $voucher->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus voucher ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-200 rounded-md py-1.5 px-2.5 hover:bg-red-600 text-red-600 hover:text-white transition text-xs font-semibold">🗑️</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada voucher.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- MODAL FORM VOUCHER -->
        <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 flex justify-center items-center px-4">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="openModal = false"></div>
            
            <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-lg flex flex-col z-10" x-show="openModal" x-transition>
                
                <div class="flex items-center justify-between border-b border-slate-100 p-5">
                    <h3 class="text-lg font-bold text-slate-800" x-text="isEdit ? 'Edit Voucher' : 'Tambah Voucher Baru'"></h3>
                    <button @click="openModal = false" class="text-slate-400 hover:text-slate-900 text-sm w-8 h-8">✕</button>
                </div>
                
                <div class="p-5">
                    <form :action="isEdit ? '/admin/vouchers/' + form.id : '{{ url('/admin/vouchers') }}'" method="POST" id="formVoucher">
                        @csrf
                        <template x-if="isEdit"><input type="hidden" name="_method" value="PUT"></template>

                        <div class="space-y-4">
                            <!-- Kode Promo -->
                            <div>
                                <label class="block mb-1 text-xs font-semibold text-slate-700 uppercase">Kode Promo</label>
                                <input type="text" name="kode_voucher" x-model="form.kode_voucher" required class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2" placeholder="Cth: UNPAMMERCH26">
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Tipe Diskon -->
                                <div>
                                    <label class="block mb-1 text-xs font-semibold text-slate-700 uppercase">Tipe Diskon</label>
                                    <select name="type_voucher" x-model="form.type_voucher" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2">
                                        <option value="percent">Persentase (%)</option>
                                        <option value="fixed">Nominal Rupiah (Rp)</option>
                                    </select>
                                </div>
                                <!-- Nilai Diskon -->
                                <div>
                                    <label class="block mb-1 text-xs font-semibold text-slate-700 uppercase">Nilai Diskon</label>
                                    <input type="number" name="nilai_diskon" x-model="form.nilai_diskon" required min="1" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2" placeholder="Cth: 15">
                                </div>
                            </div>

                            <!-- Kuota Pemakaian -->
                            <div>
                                <label class="block mb-1 text-xs font-semibold text-slate-700 uppercase">Kuota Pemakaian</label>
                                <input type="number" name="kuota" x-model="form.kuota" required min="0" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2" placeholder="Cth: 100">
                            </div>

                            <!-- Berlaku Sampai -->
                            <div>
                                <label class="block mb-1 text-xs font-semibold text-slate-700 uppercase">Berlaku Sampai (Expired)</label>
                                <input type="date" name="expired_at" x-model="form.expired_at" required class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2">
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block mb-1 text-xs font-semibold text-slate-700 uppercase">Status</label>
                                <select name="is_active" x-model="form.is_active" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2">
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="flex items-center justify-end space-x-3 border-t border-slate-100 p-4 bg-slate-50 rounded-b-2xl">
                    <button @click="openModal = false" type="button" class="text-slate-600 bg-white border hover:bg-slate-100 font-semibold rounded-xl text-sm px-4 py-2">Batal</button>
                    <button type="submit" form="formVoucher" class="text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-xl text-sm px-4 py-2" x-text="isEdit ? 'Simpan' : 'Tambah'"></button>
                </div>
            </div>
        </div>

    </main>
</body>
</html>