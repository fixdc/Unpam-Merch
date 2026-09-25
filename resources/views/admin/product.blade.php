<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - UNPAM Merch</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <!-- MAIN CONTENT (Dibungkus x-data Alpine untuk kontrol Modal Tambah & Edit) -->
    <main class="flex-1 flex flex-col h-full overflow-hidden" 
          x-data="{ 
              openModal: false, 
              isEdit: false, 
              form: { id: '', nama: '', category_id: '', is_active: '1', harga: '', berat: '', stok: '', desc: '' },
              openAddModal() {
                  this.isEdit = false;
                  this.form = { id: '', nama: '', category_id: '', is_active: '1', harga: '', berat: '', stok: '', desc: '' };
                  this.openModal = true;
              },
              openEditModal(product) {
                  this.isEdit = true;
                  this.form = { 
                      id: product.id, 
                      nama: product.nama, 
                      category_id: product.category_id, 
                      is_active: product.is_active ? '1' : '0', 
                      harga: product.harga, 
                      berat: product.berat, 
                      stok: product.stok, 
                      desc: product.desc || '' 
                  };
                  this.openModal = true;
              }
          }">

        @include('components.admin_navbar')

        <!-- PAGE CONTENT SCROLLABLE AREA -->
        <div class="flex-1 overflow-auto p-8">

            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-jakarta font-extrabold text-gray-900">Manajemen Produk</h2>
                    <p class="text-gray-500 text-sm mt-1">Kelola katalog merchandise, harga, dan ketersediaan stok.</p>
                </div>
                
                <!-- Tombol Tambah Produk Baru -->
                <button @click="openAddModal()" type="button"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                    <span>+</span> Tambah Produk Baru
                </button>
            </div>

            <!-- TABEL & FILTER CARD -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">

                <!-- Filter Controls -->
                <div class="p-6 border-b border-gray-100 bg-white flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <!-- Search Produk -->
                    <div class="relative w-full lg:w-1/3">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">🔍</span>
                        <input type="text" placeholder="Cari nama produk atau SKU..."
                            class="w-full bg-white border border-gray-200 text-sm rounded-lg pl-9 pr-4 py-2.5 focus:ring-2 focus:ring-blue-100 focus:border-blue-500 outline-none transition">
                    </div>

                    <!-- Filter Dropdowns -->
                    <div class="flex flex-wrap items-center gap-3">
                        <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg px-4 py-2.5 outline-none cursor-pointer">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                            @endforeach
                        </select>
                        
                        <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg px-4 py-2.5 outline-none cursor-pointer">
                            <option value="">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="habis">Stok Habis</option>
                            <option value="draft">Draft</option>
                        </select>

                        <button class="flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-50 transition shadow-sm">
                            <span class="text-xs">⇅</span> Terkini
                        </button>
                    </div>
                </div>

                <!-- Tabel Produk -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50/80 text-gray-500 font-semibold text-xs uppercase tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 whitespace-nowrap">Info Produk</th>
                                <th class="px-6 py-4 whitespace-nowrap">Kategori</th>
                                <th class="px-6 py-4 whitespace-nowrap">Harga Jual</th>
                                <th class="px-6 py-4 whitespace-nowrap">Stok</th>
                                <th class="px-6 py-4 whitespace-nowrap">Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($products as $product)
                                <tr class="hover:bg-blue-50/50 transition-colors group {{ $product->stok == 0 ? 'opacity-75' : '' }}">
                                    <!-- Info Produk & Gambar -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-lg bg-gray-100 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                                                @if($product->image && count($product->image) > 0)
                                                    <img src="{{ asset('storage/' . $product->image[0]) }}" alt="{{ $product->nama }}" class="w-full h-full object-cover">
                                                @else
                                                    <span class="text-xl text-gray-300">📷</span>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="font-bold text-gray-900 text-sm group-hover:text-blue-600 transition-colors">{{ $product->nama }}</p>
                                                <p class="text-[11px] text-gray-500 mt-0.5">Slug: {{ $product->slug }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Kategori -->
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $product->category->nama ?? 'Tanpa Kategori' }}
                                    </td>

                                    <!-- Harga -->
                                    <td class="px-6 py-4 font-bold text-gray-900">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </td>

                                    <!-- Stok -->
                                    <td class="px-6 py-4">
                                        @if($product->stok > 0)
                                            <span class="font-bold text-gray-700">{{ $product->stok }}</span> <span class="text-xs text-gray-400">pcs</span>
                                        @else
                                            <span class="font-bold text-red-600">0</span> <span class="text-xs text-gray-400">pcs</span>
                                        @endif
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4">
                                        @if(!$product->is_active)
                                            <span class="px-2.5 py-1 bg-gray-100 text-gray-600 border border-gray-200 rounded-md text-[10px] font-extrabold whitespace-nowrap">Draft</span>
                                        @elseif($product->stok == 0)
                                            <span class="px-2.5 py-1 bg-red-50 text-red-600 border border-red-200 rounded-md text-[10px] font-extrabold whitespace-nowrap">Habis</span>
                                        @else
                                            <span class="px-2.5 py-1 bg-green-100 text-green-700 border border-green-200 rounded-md text-[10px] font-extrabold whitespace-nowrap">Aktif</span>
                                        @endif
                                    </td>

                                    <!-- Aksi -->
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Tombol Edit (Memicu openEditModal dengan data produk JSON) -->
                                            <button @click="openEditModal({{ json_encode($product) }})" type="button" 
                                                class="text-yellow-800 bg-yellow-200 rounded-md py-2 px-3 hover:bg-yellow-500 transition hover:text-white text-xs font-semibold" title="Edit">
                                                ✏️ Edit
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->nama }} beserta gambarnya?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-300 rounded-md py-2 px-3 hover:bg-red-800 text-red-500 transition hover:text-white text-xs font-semibold" title="Hapus">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400 text-sm">
                                        Belum ada produk yang ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer Tabel / Pagination -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                    <p class="text-xs font-semibold text-gray-500">Menampilkan daftar produk</p>
                    <div class="flex items-center gap-1">
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-400 shadow-sm" disabled>❮</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-blue-600 text-white font-bold shadow-sm">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-700 shadow-sm">❯</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- MAIN MODAL (Digunakan Bersama untuk Tambah & Edit Produk) -->
        <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 flex justify-center items-center px-4">
            
            <!-- Background Overlay -->
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" @click="openModal = false"></div>
            
            <!-- Modal Content -->
            <div class="relative bg-white border border-slate-200 rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] flex flex-col z-10"
                 x-show="openModal" x-transition>
                
                <!-- Modal Header -->
                <div class="flex items-center justify-between border-b border-slate-100 p-5 shrink-0">
                    <h3 class="text-lg font-bold text-slate-800" x-text="isEdit ? 'Edit Produk' : 'Tambah Produk Baru'"></h3>
                    <button @click="openModal = false" type="button" class="text-slate-400 hover:text-slate-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center transition">✕</button>
                </div>
                
                <!-- Modal Body -->
                <div class="p-5 overflow-y-auto">
                    <!-- Form Action Dinamis (Store untuk tambah, Update untuk edit) -->
                    <form :action="isEdit ? '/admin/product/' + form.id : '{{ url('/admin/product') }}'" 
                          method="POST" enctype="multipart/form-data" id="formProduk">
                        @csrf
                        
                        <!-- Directive Method PUT khusus untuk proses Update di Laravel -->
                        <template x-if="isEdit">
                            <input type="hidden" name="_method" value="PUT">
                        </template>

                        <div class="grid gap-5 grid-cols-1 md:grid-cols-2">
                            
                            <!-- Nama Produk -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Nama Produk</label>
                                <input type="text" name="nama" x-model="form.nama" required class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5" placeholder="Cth: Varsity Jacket UNPAM">
                            </div>
                            
                            <!-- Kategori -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Kategori</label>
                                <select name="category_id" x-model="form.category_id" required class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5">
                                    <option value="">Pilih kategori...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Status</label>
                                <select name="is_active" x-model="form.is_active" required class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5">
                                    <option value="1">Aktif (Tayang)</option>
                                    <option value="0">Draft (Sembunyikan)</option>
                                </select>
                            </div>

                            <!-- Harga Jual -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Harga Jual (Rp)</label>
                                <input type="number" name="harga" x-model="form.harga" required min="0" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5" placeholder="Cth: 150000">
                            </div>

                            <!-- Berat -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Berat (Gram)</label>
                                <input type="number" name="berat" x-model="form.berat" required min="1" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5" placeholder="Cth: 500">
                            </div>

                            <!-- Stok Awal -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Stok Awal</label>
                                <input type="number" name="stok" x-model="form.stok" required min="0" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5" placeholder="Cth: 50">
                            </div>

                            <!-- Foto Produk -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Foto Produk (Opsional)</label>
                                <input type="file" name="image[]" multiple accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 border border-slate-200 rounded-lg bg-slate-50 cursor-pointer">
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-span-1 md:col-span-2">
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Deskripsi Lengkap</label>
                                <textarea name="desc" x-model="form.desc" rows="4" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5" placeholder="Tuliskan spesifikasi produk..."></textarea>
                            </div>
                            
                        </div>
                    </form>
                </div>
                
                <!-- Modal Footer -->
                <div class="flex items-center justify-end space-x-3 border-t border-slate-100 p-5 shrink-0 bg-slate-50/50 rounded-b-2xl">
                    <button @click="openModal = false" type="button" class="text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 font-semibold rounded-xl text-sm px-5 py-2.5 transition">Batal</button>
                    <button type="submit" form="formProduk" class="text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-xl text-sm px-5 py-2.5 transition" x-text="isEdit ? 'Simpan Perubahan' : 'Simpan Produk'"></button>
                </div>
            </div>
        </div>

    </main>
</body>

</html>