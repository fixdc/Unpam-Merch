<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - UNPAM Merchandise</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite('resources/css/app.css')
    
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>

<body class="bg-[#f8f9ff] text-slate-800 antialiased min-h-screen flex items-center justify-center p-4 selection:bg-emerald-200 selection:text-emerald-900">
    
    <div class="max-w-md w-full bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.08)] p-8 text-center flex flex-col items-center transform transition-all">
        
        <!-- Ikon Sukses -->
        <div class="w-24 h-24 bg-emerald-100 text-emerald-500 rounded-full flex items-center justify-center mb-6 shadow-inner relative">
            <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-20"></div>
            <i class="fa-solid fa-check text-5xl relative z-10"></i>
        </div>

        <!-- Teks Informasi -->
        <h1 class="text-2xl font-extrabold text-slate-800 mb-2">Hore, Pesanan Berhasil! 🎉</h1>
        <p class="text-slate-500 text-sm mb-8 leading-relaxed">
            Terima kasih telah berbelanja. Pembayaran Anda telah kami terima dan pesanan sedang disiapkan oleh tim Koperasi UNPAM.
        </p>

        <!-- Kotak Info Ringkas -->
        <div class="w-full bg-[#f8fafc] border border-slate-100 rounded-2xl p-4 mb-8 text-left flex flex-col gap-3">
            <div class="flex justify-between items-center text-sm">
                <span class="text-slate-500 font-medium">Status Pembayaran</span>
                <span class="font-bold text-emerald-700 bg-emerald-100 border border-emerald-200 px-2.5 py-1 rounded-md text-[10px] uppercase tracking-wider">Lunas</span>
            </div>
            <div class="w-full h-px bg-slate-200 my-1"></div>
            <p class="text-[11px] text-slate-500 text-center flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-circle-info text-blue-500"></i> Pantau status pengiriman di menu Dashboard.
            </p>
        </div>

        <!-- Tombol Navigasi -->
        <div class="w-full flex flex-col gap-3">
            <a href="{{ route('dashboard') }}" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold text-sm shadow-[0_4px_14px_0_rgba(6,81,237,0.3)] transition-all flex items-center justify-center gap-2">
                Ke Dashboard Pesanan <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
            <a href="{{ url('/') }}" class="w-full py-3.5 bg-white border-2 border-slate-200 text-slate-600 hover:bg-slate-50 hover:border-slate-300 hover:text-blue-600 rounded-xl font-bold text-sm transition-all">
                Kembali ke Beranda
            </a>
        </div>
        
    </div>

</body>
</html>