<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNPAM Merchandise</title>
    
    <!-- Import Google Fonts: Plus Jakarta Sans & Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<!-- Tambahkan class font-manrope di body -->
<body class="antialiased font-manrope text-gray-900 bg-gray-50">

    @include('components.navbar')
    @include('hero')

    <div class="h-[150vh] flex items-center justify-center bg-gray-50">
        <h2 class="text-3xl font-jakarta font-bold text-gray-400">About Us</h2>
    </div>

</body>
</html>