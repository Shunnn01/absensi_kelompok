{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Wira Harapan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            /* background: linear-gradient(135deg, #003C43, #135D66); */
        }
    </style>
</head>
<body class="text-gray-900 flex flex-col min-h-screen">

    {{-- Navbar --}}
    <!-- <nav class="bg-black/70 backdrop-blur-[5px} shadow-lg py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl text-white font-bold tracking-wider"><i class="fa-solid fa-school mr-2"></i>SMK Wira Harapan</h1>
        </div>
    </nav> -->

    {{-- Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    <!-- <footer class="bg-black/70 backdrop-blur-[5px} text-white text-center py-4  shadow-inner">
        &copy; 2025 SMK Wira Harapan. Semua Hak Dilindungi.
    </footer> -->
</body>
</html>
