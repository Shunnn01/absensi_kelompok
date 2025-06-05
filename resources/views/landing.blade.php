<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Absensi Sekolah - SMK Wira Harapan</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    html, body {
      margin: 0;
      padding: 0;
      width: 100%;
      overflow-x: hidden; /* Mencegah scroll horizontal */
    }
    .hero-bg {
      background-image: url('https://source.unsplash.com/1600x900/?school');
      background-size: cover;
      background-position: center;
    }

    .custom-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scroll::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scroll::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }
  </style>
</head>
<body class="bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('https://images7.alphacoders.com/136/1362875.png');">

<nav class="fixed top-0 left-0 w-full z-50 bg-black/60 backdrop-blur-md">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo -->
      <div class="text-white font-bold text-xl">
        SMK Wira Harapan
      </div>
      <!-- Menu -->
      <div class="flex items-center">
        <div class="hidden sm:flex space-x-4">
          <a href="#beranda" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm">Beranda</a>
          <a href="#tentang" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm">Tentang</a>
          <a href="#jurusan" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm">Jurusan</a>
          <a href="#kontak" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm">Kontak</a>
          @auth
          <a href="#" onclick="showProfile()" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm">Profil</a>
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm">Logout</button>
          </form>
          @else
          <a href="{{ route('login') }}" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm">Login</a>
          @endauth
        </div>
        <!-- Hamburger -->
        <button id="menu-toggle" type="button" class="sm:hidden ml-2 p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded-md">
          <svg class="block h-6 w-6" id="menu-open-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg class="hidden h-6 w-6" id="menu-close-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
  <!-- Mobile menu -->
  <div class="sm:hidden hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
      <a href="#beranda" class="block text-white bg-gray-900 px-3 py-2 rounded-md text-base">Beranda</a>
      <a href="#tentang" class="block text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base">Tentang</a>
      <a href="#jurusan" class="block text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base">Jurusan</a>
      <a href="#kontak" class="block text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base">Kontak</a>
      @auth
      <a href="#" onclick="showProfile()" class="block text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base">Profil</a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full text-left text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base">Logout</button>
      </form>
      @else
      <a href="{{ route('login') }}" class="block text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-base">Login</a>
      @endauth
    </div>
  </div>
</nav>




<script>
  document.getElementById("menu-toggle").addEventListener("click", () => {
    document.getElementById("mobile-menu").classList.toggle("hidden");
    document.getElementById("menu-open-icon").classList.toggle("hidden");
    document.getElementById("menu-close-icon").classList.toggle("hidden");
  });
</script>





    <<!-- Hero Section -->
  <section id="beranda" class="hero-bg min-h-screen flex items-center justify-center pt-28 px-4">
    <div class="text-center bg-white/30 backdrop-blur-[5px] p-8 md:p-12 rounded-3xl shadow-2xl w-full max-w-5xl mx-auto border border-white/20" data-aos="fade-up">
      <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 md:mb-8 leading-snug tracking-wide">
        Selamat Datang di <br><span class="text-indigo-600">Web Absensi</span><br>SMK Wira Harapan
      </h2>
      <p class="text-gray-700 text-lg md:text-2xl mb-8">
        Bersama menuju masa depan yang lebih cerah dan terorganisir!
      </p>
      <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-6">
        <a href="{{ route('absensi.index') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-500 hover:to-purple-600 text-white px-6 py-3 md:px-8 md:py-4 rounded-full text-lg font-semibold shadow-lg transition-all duration-300 flex items-center justify-center gap-3">
          <i class="fas fa-calendar-check text-xl"></i> Absen Sekarang
        </a>
        <a href="{{ route('izin.create') }}" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-emerald-500 hover:to-teal-600 text-white px-6 py-3 md:px-8 md:py-4 rounded-full text-lg font-semibold shadow-lg transition-all duration-300 flex items-center justify-center gap-3">
          <i class="fas fa-pen text-xl"></i> Ajukan Izin
        </a>
        <a href="{{ route('absensi.rekap') }}" class="bg-gradient-to-r from-gray-700 to-gray-900 hover:from-gray-600 hover:to-black text-white px-6 py-3 md:px-8 md:py-4 rounded-full text-lg font-semibold shadow-lg transition-all duration-300 flex items-center justify-center gap-3">
          <i class="fas fa-chart-bar text-xl"></i> Rekap Absensi
        </a>
      </div>
    </div>
  </section>



  <section id="tentang" class="w-full px-4 pb-20 pt-20 relative z-10">
  <!-- Background Layer -->
  <div class="absolute inset-0 bg-gradient-to-b from-gray-800/80 via-gray-700/70 to-gray-800/90 backdrop-blur-sm z-0"></div>

  <div class="relative z-10 text-white text-center">
    <h3 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-wide" data-aos="fade-up">
      Tentang Sekolah
    </h3>
    <p class="max-w-2xl mx-auto text-lg md:text-xl text-slate-200 mb-12" data-aos="fade-up" data-aos-delay="200">
      SMK Wira Harapan adalah sekolah unggulan yang berfokus pada teknologi dan bisnis dengan fasilitas modern serta tenaga pengajar profesional.
    </p>

    <!-- Card Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto px-2">
      <!-- Visi -->
      <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-2xl shadow-lg hover:scale-105 transition duration-300"
        data-aos="fade-right" data-aos-delay="300">
        <div class="text-white mb-4 text-center">
          <i class="fas fa-bullseye text-4xl md:text-5xl text-purple-400"></i>
        </div>
        <h4 class="text-xl md:text-2xl font-semibold mb-3 text-center">Visi</h4>
        <p class="text-slate-100 text-center text-sm md:text-base">
          BERKUALITAS DAN BERDAYA SAING GLOBAL.
        </p>
      </div>

      <!-- Misi -->
      <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-2xl shadow-lg hover:scale-105 transition duration-300"
        data-aos="zoom-in" data-aos-delay="400">
        <div class="text-white mb-4 text-center">
          <i class="fas fa-tasks text-4xl md:text-5xl text-emerald-400"></i>
        </div>
        <h4 class="text-xl md:text-2xl font-semibold mb-3 text-center">Misi</h4>
        <ul class="list-decimal list-inside text-slate-100 space-y-2 text-left text-xs md:text-sm max-h-64 overflow-y-auto pr-2 custom-scroll">
          <li>Meningkatkan profesionalisme pendidik dan kependidikan dalam pembelajaran abad 21 melalui pendekatan kompetensi 4C.</li>
          <li>Menumbuhkan sikap dan perilaku jujur, beriman, serta berkarakter Pancasila.</li>
          <li>Memfasilitasi sarana dan prasarana yang mengikuti perkembangan teknologi.</li>
          <li>Memberikan pelayanan yang bersahaja.</li>
          <li>Membangun jejaring dalam lingkup nasional dan internasional.</li>
          <li>Melaksanakan pendidikan berbudaya dan ramah lingkungan.</li>
          <li>Mewujudkan tata kelola satuan pendidikan yang berintegritas.</li>
        </ul>
      </div>

      <!-- Fasilitas -->
      <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-2xl shadow-lg hover:scale-105 transition duration-300"
        data-aos="fade-left" data-aos-delay="500">
        <div class="text-white mb-4 text-center">
          <i class="fas fa-building text-4xl md:text-5xl  text-cyan-400"></i>
        </div>
        <h4 class="text-xl md:text-2xl font-semibold mb-3 text-center">Fasilitas</h4>
        <ul class="list-decimal list-inside text-slate-100 space-y-2 text-left text-xs md:text-sm max-h-64 overflow-y-auto pr-2 custom-scroll">
          <li>Ruang belajar menggunakan AC</li>
          <li>Perpustakaan yang nyaman</li>
          <li>Laboratorium Komputer</li>
          <li>Laboratorium praktik berstandar hotel berbintang</li>
          <li>UKS yang representatif</li>
          <li>Toilet berstandar hotel</li>
          <li>Layanan BK yang siap bantu siswa dan orang tua</li>
          <li>Tenaga pendidik berpengalaman</li>
          <li>Parkir luas dan nyaman</li>
        </ul>
      </div>
    </div>
  </div>
</section>



   <!-- Jurusan Unggulan -->
<section id="jurusan" class="bg-gradient-to-br from-blue-50 to-white py-24">
    <div class="container mx-auto px-6">
        <h3 class="text-4xl font-bold text-center text-gray-800 mb-16" data-aos="fade-up">Jurusan Unggulan</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
            <!-- Card Template -->
            @php
                $jurusan = [
                    ['img' => 'rpl.jpg', 'title' => 'Rekayasa Perangkat Lunak', 'desc' => 'Belajar pemrograman dan pengembangan aplikasi modern.', 'delay' => 100],
                    ['img' => 'ulw2.jpg', 'title' => 'Usaha Layanan Wisata', 'desc' => 'Menguasai keterampilan di bidang pariwisata dan layanan wisata.', 'delay' => 200],
                    ['img' => 'perhotelan.jpg', 'title' => 'Perhotelan', 'desc' => 'Belajar manajemen hotel dan layanan perhotelan profesional.', 'delay' => 300],
                    ['img' => 'dkv.jpg', 'title' => 'Desain Komunikasi Visual', 'desc' => 'Kreasi konten digital, desain grafis, dan komunikasi visual.', 'delay' => 400],
                    ['img' => 'kuliner.jpg', 'title' => 'Kuliner', 'desc' => 'Menguasai seni memasak dan manajemen usaha kuliner.', 'delay' => 500]
                ];
            @endphp

            @foreach ($jurusan as $j)
            <div 
                class="group bg-white rounded-3xl overflow-hidden shadow-xl transform transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl" 
                data-aos="fade-up" 
                data-aos-delay="{{ $j['delay'] }}">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/' . $j['img']) }}" alt="{{ $j['title'] }}"  class="w-full h-full max-w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition-all"></div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-extrabold text-blue-700 mb-2 group-hover:text-blue-800 transition-colors duration-300">{{ $j['title'] }}</h4>
                    <p class="text-gray-600 group-hover:text-gray-800 transition-colors duration-300">{{ $j['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Kontak Sekolah -->
<section id="kontak" class="bg-gradient-to-br from-sky-800 to-sky-600 text-white py-20">
    <div class="container mx-auto px-6 text-center">
        <h3 class="text-4xl font-bold mb-10" data-aos="fade-up">Hubungi Kami</h3>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Alamat -->
            <div class="bg-white/10 p-6 rounded-xl backdrop-blur-md shadow-md transition hover:scale-105 hover:ring-2 hover:ring-white duration-300" data-aos="fade-right">
                <i class="fas fa-map-marker-alt text-white text-3xl mb-4"></i>
                <h4 class="text-xl font-semibold mb-2">Alamat</h4>
                <p class="text-gray-200">Jl. Raya Padang Luwih Br. Tegal Jaya, Dalung Kuta Utara, Badung – Bali</p>
            </div>
            <!-- Email dan Telepon -->
            <div class="bg-white/10 p-6 rounded-xl backdrop-blur-md shadow-md transition hover:scale-105 hover:ring-2 hover:ring-white duration-300" data-aos="fade-up">
                <i class="fas fa-envelope text-white text-3xl mb-4"></i>
                <h4 class="text-xl font-semibold mb-2">Email & Telepon</h4>
                <p class="text-gray-200">smkwirah@gmail.com</p>
                <p class="text-gray-200 mt-1">(021) 1234 5678</p>
            </div>
            <!-- Sosial Media -->
            <div class="bg-white/10 p-6 rounded-xl backdrop-blur-md shadow-md transition hover:scale-105 hover:ring-2 hover:ring-white duration-300" data-aos="fade-left">
                <i class="fas fa-share-alt text-white text-3xl mb-4"></i>
                <h4 class="text-xl font-semibold mb-2">Sosial Media</h4>
                <div class="flex justify-center gap-4 mt-2 text-2xl">
                    <a href="https://www.facebook.com/share/g/18xhouGaRX/" target="_blank" rel="noopener noreferrer" class="hover:text-blue-400"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/official.smkwiraharapan/" target="_blank" rel="noopener noreferrer" class="hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-blue-300"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/@OfficialAccountWiraHarapan" target="_blank" rel="noopener noreferrer" class="hover:text-red-400"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="mt-10" data-aos="fade-up">
            <iframe class="w-full h-64 rounded-lg shadow-lg"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3811.1132602121843!2d115.17399807485381!3d-8.628954991417286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd238cfa9704293%3A0xb90785bd6a37c482!2sSMK%20Wira%20Harapan!5e1!3m2!1sid!2sid!4v1744037541005!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo & Deskripsi -->
            <div>
                <h4 class="text-2xl font-bold mb-4">SMK Wira Harapan</h4>
                <p class="text-gray-400">Sekolah unggulan berbasis teknologi untuk mencetak generasi digital yang kompeten.</p>
            </div>
            <!-- Link Cepat -->
            <div>
                <h4 class="text-2xl font-bold mb-4">Link Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#beranda" class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                    <li><a href="#tentang" class="text-gray-400 hover:text-white transition duration-300">Tentang</a></li>
                    <li><a href="#jurusan" class="text-gray-400 hover:text-white transition duration-300">Jurusan</a></li>
                    <li><a href="#kontak" class="text-gray-400 hover:text-white transition duration-300">Kontak</a></li>
                </ul>
            </div>
            <!-- Jam Operasional -->
            <div>
                <h4 class="text-2xl font-bold mb-4">Jam Operasional</h4>
                <p class="text-gray-400">Senin - Jumat: 07.00 - 16.00</p>
                <p class="text-gray-400">Sabtu: 08.00 - 12.00</p>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-400">
            <p>&copy; 2025 SMK Wira Harapan. Semua Hak Dilindungi.</p>
        </div>
    </div>
</footer>


    <!-- Modal Profil -->
<div id="profile-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 p-4 transition-opacity duration-300 ease-in-out">
    <div class="bg-white p-6 rounded-2xl shadow-2xl w-full max-w-md transform transition-transform duration-300 scale-95">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Profil Siswa</h2>
        @auth
            <div class="space-y-2 text-gray-700">
                <p><span class="font-medium">Nama:</span> {{ Auth::user()->name }}</p>
                <p><span class="font-medium">Email:</span> {{ Auth::user()->email }}</p>
                <p><span class="font-medium">Kelas:</span> {{ Auth::user()->kelas ?? 'Belum diisi' }}</p>
                <p><span class="font-medium">NIS:</span> {{ Auth::user()->nis ?? 'Belum diisi' }}</p>
            </div>
        @else
            <p class="text-red-600 text-center">Anda belum login. Silakan login untuk melihat profil Anda.</p>
        @endauth
        <div class="mt-6 text-center">
            <button onclick="closeProfile()" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-full transition duration-200">
                Tutup
            </button>
        </div>
    </div>
</div>


    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        // Fungsi untuk modal profil
        function showProfile() {
            document.getElementById("profile-modal").classList.remove("hidden");
            document.body.style.overflow = 'hidden'; // Mencegah scroll saat modal terbuka
        }

        function closeProfile() {
            document.getElementById("profile-modal").classList.add("hidden");
            document.body.style.overflow = 'auto'; // Mengembalikan scroll
        }

        // Tutup modal saat klik di luar area modal
        document.getElementById('profile-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeProfile();
            }
        });

        // Animasi scroll untuk anchor link
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>