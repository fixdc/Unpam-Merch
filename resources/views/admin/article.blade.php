<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Artikel - UNPAM Merch</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col h-full overflow-hidden" x-data="{ 
              openModal: false, 
              isEdit: false, 
              form: { id: '', judul: '', category_id: '', desc: '' },
              openAddModal() {
                  this.isEdit = false;
                  this.form = { id: '', judul: '', category_id: '', desc: '' };
                  this.openModal = true;
              },
              openEditModal(article) {
                  this.isEdit = true;
                  this.form = { 
                      id: article.id, 
                      judul: article.judul, 
                      category_id: article.category_id, 
                      desc: article.desc || '' 
                  };
                  this.openModal = true;
              }
          }">

        @include('components.admin_navbar')

        <!-- PAGE CONTENT SCROLLABLE AREA -->
        <div class="flex-1 overflow-auto p-8">

            <!-- ALERT NOTIFIKASI -->
            @if(session('success'))
                <div
                    class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-2">
                        <span>✅</span>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()"
                        class="text-green-500 hover:text-green-700 font-bold">✕</button>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm shadow-sm">
                    <div class="flex items-center gap-2 mb-1 font-bold">
                        <span>❌</span>
                        <span>Terjadi kesalahan pengisian data:</span>
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-jakarta font-extrabold text-gray-900">Manajemen Artikel</h2>
                    <p class="text-gray-500 text-sm mt-1">Kelola publikasi berita, pengumuman, dan artikel informatif.
                    </p>
                </div>

                <button @click="openAddModal()" type="button"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                    <span>+</span> Tambah Artikel Baru
                </button>
            </div>

            <!-- TABEL CARD -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead
                            class="bg-gray-50/80 text-gray-500 font-semibold text-xs uppercase tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 whitespace-nowrap">Info Artikel</th>
                                <th class="px-6 py-4 whitespace-nowrap">Kategori</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($articles as $article)
                                <tr class="hover:bg-blue-50/50 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <!-- Ganti bagian pengecekan gambar di tabel artikel -->
                                            <div
                                                class="w-12 h-12 rounded-lg bg-gray-100 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                                                @if($article->image)
                                                    <img src="{{ asset('storage/' . $article->image) }}"
                                                        alt="{{ $article->judul }}" class="w-full h-full object-cover">
                                                @else
                                                    <span class="text-xl text-gray-300">📰</span>
                                                @endif
                                            </div>
                                            <div>
                                                <p
                                                    class="font-bold text-gray-900 text-sm group-hover:text-blue-600 transition-colors">
                                                    {{ $article->judul }}</p>
                                                <p class="text-[11px] text-gray-500 mt-0.5">Slug: {{ $article->slug }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $article->category->nama ?? 'Tanpa Kategori' }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <button @click="openEditModal({{ json_encode($article) }})" type="button"
                                                class="text-yellow-800 bg-yellow-200 rounded-md py-2 px-3 hover:bg-yellow-500 transition hover:text-white text-xs font-semibold"
                                                title="Edit">
                                                ✏️ Edit
                                            </button>

                                            <form action="{{ route('article.destroy', $article->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus artikel {{ $article->judul }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-300 rounded-md py-2 px-3 hover:bg-red-800 text-red-500 transition hover:text-white text-xs font-semibold"
                                                    title="Hapus">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-400 text-sm">
                                        Belum ada artikel yang ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- MAIN MODAL -->
        <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 flex justify-center items-center px-4">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" @click="openModal = false">
            </div>

            <div class="relative bg-white border border-slate-200 rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] flex flex-col z-10"
                x-show="openModal" x-transition>

                <div class="flex items-center justify-between border-b border-slate-100 p-5 shrink-0">
                    <h3 class="text-lg font-bold text-slate-800"
                        x-text="isEdit ? 'Edit Artikel' : 'Tambah Artikel Baru'"></h3>
                    <button @click="openModal = false" type="button"
                        class="text-slate-400 hover:text-slate-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center transition">✕</button>
                </div>

                <div class="p-5 overflow-y-auto">
                    <form :action="isEdit ? '/admin/articles/' + form.id : '{{ url('/admin/articles') }}'" method="POST"
                        enctype="multipart/form-data" id="formArtikel">
                        @csrf

                        <template x-if="isEdit">
                            <input type="hidden" name="_method" value="PUT">
                        </template>

                        <div class="grid gap-5 grid-cols-1 md:grid-cols-2">
                            <div class="col-span-1 md:col-span-2">
                                <label
                                    class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Judul
                                    Artikel</label>
                                <input type="text" name="judul" x-model="form.judul" required
                                    class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5"
                                    placeholder="Cth: Pameran Merchandise Resmi UNPAM 2026">
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <label
                                    class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Kategori</label>
                                <select name="category_id" x-model="form.category_id" required
                                    class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5">
                                    <option value="">Pilih kategori...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <label
                                    class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Foto
                                    Sampul Artikel (Opsional)</label>
                                <input type="file" name="image[]" multiple accept="image/*"
                                    class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 border border-slate-200 rounded-lg bg-slate-50 cursor-pointer">
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <label
                                    class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Konten
                                    Artikel</label>
                                <textarea name="desc" x-model="form.desc" rows="6"
                                    class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5"
                                    placeholder="Tuliskan isi artikel lengkap di sini..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div
                    class="flex items-center justify-end space-x-3 border-t border-slate-100 p-5 shrink-0 bg-slate-50/50 rounded-b-2xl">
                    <button @click="openModal = false" type="button"
                        class="text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 font-semibold rounded-xl text-sm px-5 py-2.5 transition">Batal</button>
                    <button type="submit" form="formArtikel"
                        class="text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-xl text-sm px-5 py-2.5 transition"
                        x-text="isEdit ? 'Simpan Perubahan' : 'Simpan Artikel'"></button>
                </div>
            </div>
        </div>

    </main>
</body>

</html>