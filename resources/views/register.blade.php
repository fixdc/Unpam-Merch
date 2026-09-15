<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Unpam.Merch</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-100 flex items-center justify-center min-h-screen font-jakarta antialiased">

    <!-- Container Utama -->
    <div
        class="w-full max-w-4xl bg-white shadow-xl rounded-2xl overflow-hidden flex flex-col md:flex-row m-4 border border-slate-200/60">

        <!-- BAGIAN KIRI: Banner Biru -->
        <div class="w-full md:w-1/2 bg-blue-600 text-white p-10 flex flex-col justify-between relative overflow-hidden">
            <!-- Background Accent Glow -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none">
            </div>
            <div class="flex">
                <div class="px-4 py-2 bg-white rounded-xl mr-2">
                    <a href="{{ url('/home') }}">
                        <p class="text-blue-600 font-bold">
                            < Back</p>
                    </a>
                </div>
                <div
                    class="inline-flex items-center space-x-3 bg-white backdrop-blur-md px-4 py-2 rounded-xl w-max border border-white/20 shadow-inner">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="h-5">
                    <div>
                        <span class="font-bold tracking-wide text-sm text-blue-600">unpam.merch</span>
                    </div>
                </div>
            </div>

            <div class="my-12 md:my-0">
                <h2 class="text-3xl font-extrabold tracking-tight mb-3">Selamat Datang!</h2>
                <p class="text-sm text-blue-100 leading-relaxed font-normal">Panel kendali terpadu untuk manajemen
                    layanan penjualan souvenir dan produk resmi Universitas Pamulang.</p>
            </div>

            <div class="text-xs text-blue-200/80">
                &copy; 2026 Unpam-Merch. All rights reserved.
            </div>

            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-black/10 rounded-full pointer-events-none blur-xl">
            </div>
        </div>

        <!-- BAGIAN KANAN: Form Registrasi -->
        <div class="w-full md:w-1/2 p-8 md:p-10 flex flex-col justify-center bg-white">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight mb-1">Buat Akun Baru</h2>
                <p class="text-xs text-slate-500">
                    Sudah punya akun?
                    <a href="{{ url('/login') }}"
                        class="text-blue-600 font-semibold hover:text-blue-700 hover:underline transition-colors">Masuk
                        di sini</a>
                </p>
            </div>

            <form action="{{ url('/register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label
                        class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Email</label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="w-full px-3 py-2.5 border border-slate-300 rounded-lg focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 focus:outline-none text-sm bg-slate-50/50 transition-all @error('email') border-red-500 @enderror"
                        placeholder="nama@email.com">
                    @error('email')
                        <span class="text-red-500 text-[10px] mt-1 block font-bold">* {{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Nama
                        Lengkap</label>
                    <input type="text" name="name" required value="{{ old('name') }}"
                        class="w-full px-3 py-2.5 border border-slate-300 rounded-lg focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 focus:outline-none text-sm bg-slate-50/50 transition-all @error('name') border-red-500 @enderror"
                        placeholder="Masukkan nama lengkap">
                    @error('name')
                        <span class="text-red-500 text-[10px] mt-1 block font-bold">* {{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">No.
                        Telepon</label>
                    <input type="tel" name="no_telp" required value="{{ old('no_telp') }}"
                        class="w-full px-3 py-2.5 border border-slate-300 rounded-lg focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 focus:outline-none text-sm bg-slate-50/50 transition-all @error('no_telp') border-red-500 @enderror"
                        placeholder="08xxxxxxxxxx">
                    @error('no_telp')
                        <span class="text-red-500 text-[10px] mt-1 block font-bold">* {{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Kata
                        Sandi</label>
                    <input type="password" name="password" required
                        class="w-full px-3 py-2.5 border border-slate-300 rounded-lg focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 focus:outline-none text-sm bg-slate-50/50 transition-all @error('password') border-red-500 @enderror"
                        placeholder="••••••••">
                    @error('password')
                        <span class="text-red-500 text-[10px] mt-1 block font-bold">* {{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-3">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold uppercase tracking-wider py-3 rounded-lg transition-all shadow-md shadow-blue-600/25 hover:shadow-lg hover:shadow-blue-600/30">
                        Daftar Akun
                    </button>
                </div>
            </form>
        </div>

    </div>

    @if ($errors->any() || session('error'))
        <div x-data="{ show: true }" 
             x-show="show" 
             style="display: none;"
             class="fixed inset-0 z-50 flex items-center justify-center px-4"
             x-transition.opacity>
            
            <!-- Overlay Gelap (Klik untuk tutup) -->
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" @click="show = false"></div>
            
            <!-- Kotak Modal -->
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 relative z-10"
                 x-show="show"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-8 scale-95">
                
                <!-- Icon & Judul -->
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2.5 bg-red-100 rounded-full text-red-600 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">Gagal Masuk</h3>
                        <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Terjadi Kesalahan</p>
                    </div>
                </div>

                <!-- Teks Error -->
                <div class="text-sm text-slate-600 mb-6 bg-slate-50 p-3 rounded-lg border border-slate-100">
                    {{-- Menampilkan pesan dari with('error', '...') --}}
                    @if(session('error'))
                        <p>{{ session('error') }}</p>
                    @endif
                    
                    {{-- Menampilkan pesan dari validasi (seperti email salah/password kosong) --}}
                    @if($errors->any())
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Tombol Tutup -->
                <button @click="show = false" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-semibold py-2.5 rounded-xl transition-all active:scale-[0.98] shadow-md">
                    Mengerti, Coba Lagi
                </button>
            </div>
        </div>
    @endif

</body>

</html>