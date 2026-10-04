<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya | unpam-merch</title>
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

    <div class="flex h-screen overflow-hidden w-c">
        
        <!-- Sidebar -->
        @include('components.sidebar')

        <main class="flex-1 flex flex-col h-full overflow-y-auto">
            <!-- HEADER -->
            @include('components.admin_navbar')

            <!-- ISI KONTEN PROFIL -->
            <div class="p-6 md:p-8 space-y-6 w-full">
                
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan Akun</h2>

                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-emerald-700 bg-emerald-100 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- KIRI: EDIT DATA DIRI & PASSWORD -->
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white p-6 rounded-2xl border border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-3">Informasi Pribadi</h3>
                            <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500" required>
                                    </div>
                                </div>

                                <!-- TAMBAHAN INPUT NOMOR TELEPON -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon / WhatsApp</label>
                                    <input type="text" name="phone" value="{{ $user->phone ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500" placeholder="Cth: 081234567890">
                                </div>

                                <h3 class="text-sm font-bold text-gray-900 mt-6 pt-4 border-t mb-4">Ubah Password (Opsional)</h3>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                                    <input type="password" name="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                                        <input type="password" name="new_password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                                        <input type="password" name="new_password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>

                                <div class="pt-4 flex justify-end">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-medium transition">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- KANAN: DAFTAR ALAMAT (CRUD) -->
                    <div class="lg:col-span-1 space-y-6">
                        <div class="bg-white p-6 rounded-2xl border border-gray-200">
                            <div class="flex justify-between items-center mb-4 border-b pb-3">
                                <h3 class="text-lg font-bold text-gray-900">Alamat Saya</h3>
                                <button onclick="openAddressModal()" class="text-xs bg-blue-50 text-blue-600 font-bold px-3 py-1.5 rounded-lg hover:bg-blue-100"><i class="fa-solid fa-plus"></i> Tambah</button>
                            </div>

                            <div class="space-y-4">
                                @forelse($addresses as $address)
                                <div class="border border-gray-200 p-4 rounded-xl relative group">
                                    <div class="flex justify-between items-start">
                                        <span class="bg-gray-100 text-gray-700 text-[10px] px-2 py-0.5 rounded font-bold uppercase">{{ $address->label }}</span>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('profile.address.destroy', $address->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus alamat ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 text-xs"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                    <p class="font-bold text-sm text-gray-900 mt-2">{{ $address->recipient_name }}</p>
                                    <p class="text-xs text-gray-500">{{ $address->phone_number }}</p>
                                    <p class="text-xs text-gray-600 mt-1 line-clamp-2">{{ $address->full_address }}</p>
                                </div>
                                @empty
                                <div class="text-center py-6 text-sm text-gray-500">
                                    Belum ada alamat tersimpan.
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- MODAL TAMBAH ALAMAT -->
    <div id="addressModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl w-full max-w-md p-6 relative">
            <button onclick="closeAddressModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700"><i class="fa-solid fa-xmark text-lg"></i></button>
            <h3 class="text-lg font-bold text-gray-900 mb-4">Tambah Alamat Baru</h3>
            
            <form action="{{ route('profile.address.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Label Alamat (ex: Rumah, Kampus)</label>
                    <input type="text" name="label" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" required>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Nama Penerima</label>
                    <input type="text" name="recipient_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" required>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">No. Handphone</label>
                    <input type="text" name="phone_number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" required>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                    <textarea name="full_address" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" required></textarea>
                </div>
                
                <div class="pt-2 flex justify-end gap-2">
                    <button type="button" onclick="closeAddressModal()" class="px-4 py-2 text-sm text-gray-600 font-medium">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg">Simpan Alamat</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Native untuk Modal -->
    <script>
        function openAddressModal() {
            document.getElementById('addressModal').classList.remove('hidden');
        }
        function closeAddressModal() {
            document.getElementById('addressModal').classList.add('hidden');
        }
    </script>

</body>
</html>