<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna - UNPAM Merch</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <!-- MAIN CONTENT (Dibungkus x-data Alpine untuk kontrol Modal) -->
    <main class="flex-1 flex flex-col h-full overflow-hidden" 
          x-data="{ 
              openModal: false, 
              isEdit: false, 
              form: { id: '', name: '', email: '', role: 'user', password: '' },
              openAddModal() {
                  this.isEdit = false;
                  this.form = { id: '', name: '', email: '', role: 'user', password: '' };
                  this.openModal = true;
              },
              openEditModal(user) {
                  this.isEdit = true;
                  this.form = { 
                      id: user.id, 
                      name: user.name, 
                      email: user.email, 
                      role: user.role ?? 'user', 
                      password: '' // Kosongkan agar password lama tidak tampil
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
                    <h2 class="text-2xl font-jakarta font-extrabold text-gray-900">Manajemen Pengguna</h2>
                    <p class="text-gray-500 text-sm mt-1">Kelola data pelanggan, hak akses (role), dan akun login.</p>
                </div>
                
                <!-- Tombol Tambah Pengguna Baru -->
                <button @click="openAddModal()" type="button"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                    <span>+</span> Tambah Pengguna
                </button>
            </div>

            <!-- TABEL & FILTER CARD -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">

                <!-- Filter Controls -->
                <div class="p-6 border-b border-gray-100 bg-white flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <!-- Search Pengguna -->
                    <div class="relative w-full lg:w-1/3">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-sm">🔍</span>
                        <input type="text" placeholder="Cari nama atau email pengguna..."
                            class="w-full bg-white border border-gray-200 text-sm rounded-lg pl-9 pr-4 py-2.5 focus:ring-2 focus:ring-blue-100 focus:border-blue-500 outline-none transition">
                    </div>

                    <!-- Filter Dropdowns -->
                    <div class="flex flex-wrap items-center gap-3">
                        <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg px-4 py-2.5 outline-none cursor-pointer">
                            <option value="">Semua Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">Pelanggan</option>
                        </select>
                        
                        <button class="flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-50 transition shadow-sm">
                            <span class="text-xs">⇅</span> Terkini
                        </button>
                    </div>
                </div>

                <!-- Tabel Pengguna -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50/80 text-gray-500 font-semibold text-xs uppercase tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 whitespace-nowrap">Profil Pengguna</th>
                                <th class="px-6 py-4 whitespace-nowrap">Role</th>
                                <th class="px-6 py-4 whitespace-nowrap">Tanggal Bergabung</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($users as $user)
                                <tr class="hover:bg-blue-50/50 transition-colors group">
                                    <!-- Info Profil -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-gray-200 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                                                <!-- UI Avatars Placeholder -->
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="font-bold text-gray-900 text-sm group-hover:text-blue-600 transition-colors">{{ $user->name }}</p>
                                                <p class="text-[11px] text-gray-500 mt-0.5">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Role -->
                                    <td class="px-6 py-4">
                                        @if($user->role === 'admin')
                                            <span class="px-2.5 py-1 bg-purple-100 text-purple-700 border border-purple-200 rounded-md text-[10px] font-extrabold uppercase">Admin</span>
                                        @else
                                            <span class="px-2.5 py-1 bg-blue-50 text-blue-600 border border-blue-200 rounded-md text-[10px] font-extrabold uppercase">Pelanggan</span>
                                        @endif
                                    </td>

                                    <!-- Tanggal Bergabung -->
                                    <td class="px-6 py-4 text-gray-500 text-sm">
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>

                                    <!-- Aksi -->
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Tombol Edit (Memicu openEditModal dengan data user JSON) -->
                                            <button @click="openEditModal({{ json_encode($user) }})" type="button" 
                                                class="text-yellow-800 bg-yellow-200 rounded-md py-2 px-3 hover:bg-yellow-500 transition hover:text-white text-xs font-semibold" title="Edit">
                                                ✏️ Edit
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus akun {{ $user->name }}?');">
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
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-400 text-sm">
                                        Belum ada data pengguna.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer Tabel / Pagination -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-2xl">
                    <p class="text-xs font-semibold text-gray-500">Menampilkan daftar pengguna</p>
                    <div class="flex items-center gap-1">
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-400 shadow-sm" disabled>❮</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-blue-600 text-white font-bold shadow-sm">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-700 shadow-sm">❯</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- MAIN MODAL (Digunakan Bersama untuk Tambah & Edit Pengguna) -->
        <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 flex justify-center items-center px-4">
            
            <!-- Background Overlay -->
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" @click="openModal = false"></div>
            
            <!-- Modal Content -->
            <div class="relative bg-white border border-slate-200 rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] flex flex-col z-10"
                 x-show="openModal" x-transition>
                
                <!-- Modal Header -->
                <div class="flex items-center justify-between border-b border-slate-100 p-5 shrink-0">
                    <h3 class="text-lg font-bold text-slate-800" x-text="isEdit ? 'Edit Pengguna' : 'Tambah Pengguna Baru'"></h3>
                    <button @click="openModal = false" type="button" class="text-slate-400 hover:text-slate-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center transition">✕</button>
                </div>
                
                <!-- Modal Body -->
                <div class="p-5 overflow-y-auto">
                    <!-- Form Action Dinamis -->
                    <!-- Sesuaikan route /admin/users dengan konfigurasi route Laravel kamu -->
                    <form :action="isEdit ? '/admin/users/' + form.id : '{{ url('/admin/users') }}'" 
                          method="POST" id="formPengguna">
                        @csrf
                        
                        <!-- Directive Method PUT khusus untuk proses Update -->
                        <template x-if="isEdit">
                            <input type="hidden" name="_method" value="PUT">
                        </template>

                        <div class="space-y-4">
                            
                            <!-- Nama Lengkap -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Nama Lengkap</label>
                                <input type="text" name="name" x-model="form.name" required class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5" placeholder="Cth: Fikri Aidhil">
                            </div>
                            
                            <!-- Email -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Email Akun</label>
                                <input type="email" name="email" x-model="form.email" required class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5" placeholder="Cth: fikri@unpam.ac.id">
                            </div>

                            <!-- Role -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Hak Akses (Role)</label>
                                <select name="role" x-model="form.role" required class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5">
                                    <option value="user">Pelanggan (User)</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div>
                                <label class="block mb-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                    Password <span x-show="isEdit" class="text-slate-400 lowercase normal-case font-normal">(Kosongkan jika tidak ingin mengubah password)</span>
                                </label>
                                <input type="password" name="password" x-model="form.password" :required="!isEdit" class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-lg block w-full px-3 py-2.5" placeholder="Masukkan password...">
                            </div>

                        </div>
                    </form>
                </div>
                
                <!-- Modal Footer -->
                <div class="flex items-center justify-end space-x-3 border-t border-slate-100 p-5 shrink-0 bg-slate-50/50 rounded-b-2xl">
                    <button @click="openModal = false" type="button" class="text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 font-semibold rounded-xl text-sm px-5 py-2.5 transition">Batal</button>
                    <button type="submit" form="formPengguna" class="text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-xl text-sm px-5 py-2.5 transition" x-text="isEdit ? 'Simpan Perubahan' : 'Simpan Pengguna'"></button>
                </div>
            </div>
        </div>

    </main>
</body>

</html>