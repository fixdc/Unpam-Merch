<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | unpam-merch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.svg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- WAJIB: Tambahkan Alpine.js untuk trigger buka-tutup sidebar -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: { fontFamily: { jakarta: ['"Plus Jakarta Sans"', 'sans-serif'], } }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-jakarta text-gray-800">

    <!-- Wrapper Utama Dashboard (Cukup satu saja) -->
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        
        <!-- Panggil file sidebar di sini -->
        @include('components.sidebar')

        <!-- Overlay Latar Gelap untuk Mobile saat Sidebar Terbuka -->
        <div x-show="sidebarOpen" 
            @click="sidebarOpen = false" 
            x-transition.opacity 
            class="fixed inset-0 z-40 bg-gray-900/50 md:hidden backdrop-blur-sm"
            style="display: none;">
        </div>

        <!-- Konten Utama (Kanan) -->
        <div class="flex-1 flex flex-col min-w-0 h-full overflow-y-auto">
            
            <!-- HEADER BERSAMA HAMBURGER BUTTON -->
            <div class="flex items-center bg-white border-b border-gray-200">
                <!-- Tombol Hamburger (Hanya terlihat di Mobile) -->
                <button @click="sidebarOpen = true" class="md:hidden ml-4 p-2 text-gray-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                
                <!-- Navbar Bawaan Admin/User Anda -->
                <div class="flex-1 w-full">
                    @include('components.admin_navbar')
                </div>
            </div>

            <!-- ISI DASHBOARD (Masuk ke dalam sini) -->
            <main class="p-6 md:p-8 space-y-6 max-w-7xl w-full mx-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>