<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Unpam-Merch Admin Console</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primaryBlue: '#003399',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

    <!-- Container Utama -->
    <div class="w-full max-w-5xl bg-white shadow-2xl rounded-2xl overflow-hidden flex flex-col md:flex-row min-h-[600px] m-4">
        
        <!-- BAGIAN KIRI: Banner Biru -->
        <div class="w-full md:w-1/2 bg-primaryBlue text-white p-10 flex flex-col justify-between relative overflow-hidden">
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-lg w-max border border-white/20">
                <div class="bg-white text-primaryBlue font-black px-2 py-0.5 rounded text-sm tracking-wider">u</div>
                <div class="text-xs">
                    <span class="font-bold tracking-wide">unpam.merch</span>
                    <p class="text-[9px] uppercase tracking-widest text-blue-200">ADMIN CONSOLE</p>
                </div>
            </div>

            <div class="mt-20 md:mt-0">
                <h2 class="text-2xl font-bold mb-2">Selamat Datang!</h2>
                <p class="text-sm text-blue-100 leading-relaxed">Menyediakan layanan Penjualan Souvenir dan Produk Unpam</p>
            </div>

            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-white/5 rounded-full pointer-events-none"></div>
        </div>

        <!-- BAGIAN KANAN: Form Registrasi -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative bg-white">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar</h2>

            <form action="#" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-[11px] font-medium text-gray-700 mb-0.5">Email</label>
                    <input type="email" name="email" placeholder="Masukkan email" class="w-full px-0 py-1.5 border-b border-gray-300 focus:border-primaryBlue focus:outline-none text-xs bg-transparent">
                </div>

                <div>
                    <label class="block text-[11px] font-medium text-gray-700 mb-0.5">Nama</label>
                    <input type="text" name="name" placeholder="Masukkan nama" class="w-full px-0 py-1.5 border-b border-gray-300 focus:border-primaryBlue focus:outline-none text-xs bg-transparent">
                </div>

                <div>
                    <label class="block text-[11px] font-medium text-gray-700 mb-0.5">No.telp</label>
                    <input type="tel" name="phone" placeholder="Masukkan nomor telepon" class="w-full px-0 py-1.5 border-b border-gray-300 focus:border-primaryBlue focus:outline-none text-xs bg-transparent">
                </div>

                <div>
                    <label class="block text-[11px] font-medium text-gray-700 mb-0.5">Katasandi</label>
                    <input type="password" name="password" placeholder="Masukkan kata sandi" class="w-full px-0 py-1.5 border-b border-gray-300 focus:border-primaryBlue focus:outline-none text-xs bg-transparent">
                </div>

                <div class="pt-3 flex items-center justify-between">
                    <button type="submit" class="bg-primaryBlue hover:bg-blue-900 text-white text-xs font-medium px-6 py-2.5 rounded-lg transition-colors shadow-md">
                        Daftar
                    </button>
                    <a href="{{ url('/login') }}" class="text-xs text-gray-500 hover:text-primaryBlue">
                        Sudah punya akun? Masuk
                    </a>
                </div>
            </form>
        </div>

    </div>

</body>
</html>