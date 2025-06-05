<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Sekolah</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> 
</head>
<body class="bg-gradient-to-br from-[#2C3930] via-[#3F4F44] to-[#A27B5C] min-h-screen flex items-center justify-center ">
<div class="max-w-md w-full bg-white/17 backdrop-blur-md rounded-2xl shadow-2xl p-20">
        <h2 class="text-3xl font-bold text-white mb-4">Sistem Absensi Sekolah</h2>
        <p class="text-white mb-6">Silakan login untuk mengakses sistem absensi</p>
        <a href="{{ route('login') }}" 
        class="w-full bg-cyan-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-amber-900 block text-center shadow-lg">
        Masuk
        </a>
    </div>
</body>
</html>