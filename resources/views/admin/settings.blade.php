<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - UNPAM Merch</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>

<body class="bg-[#F8FAFC] text-gray-800 h-screen flex overflow-hidden font-jakarta">

    @include('components.sidebar')

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        @include('components.admin_navbar')

        <!-- PAGE CONTENT SCROLLABLE AREA -->
        <div class="flex-1 overflow-auto p-8">

            <div class="mb-8">
                <h2 class="text-2xl font-extrabold text-gray-900">Pengaturan Sistem</h2>
                <p class="text-gray-500 text-sm mt-1">Kelola informasi profil admin dan keamanan akun.</p>
            </div>

            <!-- Pesan Alert -->
            @if(session('success'))
                <div class="p-4 mb-6 text-sm text-emerald-700 bg-emerald-100 rounded-xl font-medium max-w-4xl">
                    <i class="fa-solid fa-circle-check mr-1"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 mb-6 text-sm text-red-700 bg-red-100 rounded-xl font-medium max-w-4xl">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- CARD FORM PENGATURAN -->
            <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 md:p-8 w-full">
                @csrf

                <!-- SEGMEN 1: PROFIL ADMIN -->
                <h3 class="text-lg font-bold text-gray-900 mb-6">Profil Admin</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $admin->name) }}" required class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg block w-full px-4 py-3 outline-none focus:border-blue-500 focus:bg-white transition" placeholder="Nama admin">
                    </div>
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-gray-700 uppercase tracking-wider">Email Admin</label>
                        <input type="email" name="email" value="{{ old('email', $admin->email) }}" required class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg block w-full px-4 py-3 outline-none focus:border-blue-500 focus:bg-white transition" placeholder="Email aktif">
                    </div>
                </div>

                <hr class="border-gray-100 mb-8">

                <!-- SEGMEN 2: UBAH PASSWORD -->
                <h3 class="text-lg font-bold text-gray-900 mb-6">Ubah Password Admin</h3>
                <div class="space-y-5 mb-8">
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-gray-700 uppercase tracking-wider">Password Saat Ini</label>
                        <input type="password" name="current_password" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg block w-full px-4 py-3 outline-none focus:border-blue-500 focus:bg-white transition" placeholder="Masukkan password saat ini">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block mb-1.5 text-xs font-semibold text-gray-700 uppercase tracking-wider">Password Baru</label>
                            <input type="password" name="new_password" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg block w-full px-4 py-3 outline-none focus:border-blue-500 focus:bg-white transition" placeholder="Minimal 8 karakter">
                        </div>
                        <div>
                            <label class="block mb-1.5 text-xs font-semibold text-gray-700 uppercase tracking-wider">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg block w-full px-4 py-3 outline-none focus:border-blue-500 focus:bg-white transition" placeholder="Ulangi password baru">
                        </div>
                    </div>

                    <!-- Info Alert Kuning -->
                    <p class="text-[11px] text-yellow-800 mt-2 bg-yellow-50/80 p-3.5 rounded-lg border border-yellow-100 flex items-center gap-2 font-medium">
                        <i class="fa-solid fa-circle-info text-yellow-500 text-sm"></i> Biarkan ketiga kolom password di atas kosong jika Anda tidak ingin mengubah password akun admin.
                    </p>
                </div>

                <!-- TOMBOL SUBMIT -->
                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition shadow-md flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Pengaturan
                    </button>
                </div>
                
            </form>

        </div>
    </main>
</body>
</html>