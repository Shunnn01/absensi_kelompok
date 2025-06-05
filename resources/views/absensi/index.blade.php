<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Absensi Kehadiran</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom, #D9EAFD, #F8FAFC);
    }

    .glass {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #888;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>
</head>

<body class="h-screen flex flex-col md:flex-row text-gray-900">
  <!-- Sidebar -->
  <aside class="w-full md:w-64 bg-gradient-to-b from-[#9AA6B2] to-[#BCCCDC] text-white shadow-xl flex flex-col p-6 space-y-4">
    <h1 class="text-2xl font-bold text-center mb-4">
      <i class="fas fa-calendar-check me-2"></i> Absensi
    </h1>
    <nav class="flex flex-col gap-4">
      <a href="#" onclick="showProfile()" class="p-3 bg-gradient-to-r from-white via-white to-white bg-opacity-90 text-blue-900 rounded text-center font-semibold shadow-md hover:scale-105 hover:bg-opacity-100 transition-all duration-300 ease-in-out">
        <i class="fas fa-user me-2"></i> Profil
      </a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full p-3 bg-gradient-to-r from-red-500 to-red-700 text-white font-semibold rounded shadow-lg hover:scale-105 hover:from-red-600 hover:to-red-800 transition-all duration-300 ease-in-out">
          <i class="fas fa-sign-out-alt me-2"></i> Logout
        </button>
      </form>
      <a href="{{ route('landing') }}" class="bg-gradient-to-r from-gray-600 to-gray-800 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:scale-105 hover:from-gray-700 hover:to-gray-900 transition-all duration-300 ease-in-out">
        <i class="fas fa-arrow-left me-2"></i> Kembali
      </a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6 flex items-center justify-center">
    <div class="glass rounded-2xl shadow-2xl p-10 w-full max-w-2xl">
      <h2 class="text-3xl font-extrabold text-center text-sky-600 mb-4">
        <i class="fas fa-calendar-check me-2"></i> Absensi Kehadiran
      </h2>
      <p class="text-center mb-6 text-gray-700 text-lg">Halo, <strong>{{ Auth::user()->name }}</strong>! Silakan isi absensi:</p>

      @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Berhasil!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
      @endif

      @if (session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Gagal!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
      </div>
      @endif

      <form action="{{ route('absensi.store') }}" method="POST" id="absensi-form" class="space-y-6">
        @csrf
        <div>
          <label for="status" class="block font-semibold mb-2">Status Kehadiran:</label>
          <select name="status" id="status" required
            class="w-full p-3 border border-gray-300 rounded-lg bg-white bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-[#6e5849]">
            <option value="">Pilih Status</option>
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
          </select>
        </div>

        <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-emerald-700 text-white font-bold py-3 rounded-lg shadow-lg hover:scale-105 hover:from-emerald-600 hover:to-emerald-800 transition-all duration-300 ease-in-out">
          <i class="fas fa-check-circle me-2"></i> Absen Sekarang
        </button>
      </form>

      @if(isset($absensi))
      @if($absensi->count() > 0)
      <div class="mt-10">
        <h3 class="text-xl font-semibold text-gray-800 mb-3">
          <i class="fas fa-clock me-2"></i> Riwayat Absensi
        </h3>
        <table class="w-full text-left border-collapse">
          <thead>
            <tr>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-gray-800 font-semibold">Tanggal</th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-gray-800 font-semibold">Keterangan</th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-gray-800 font-semibold">Status</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($absensi as $item)
              <tr>
                <td class="px-6 py-4 border-b border-gray-200">
                  {{ $item->waktu ? \Carbon\Carbon::parse($item->waktu)->format('d-m-Y') : '-' }}
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                  Melakukan absensi pada pukul 
                  {{ $item->waktu ? \Carbon\Carbon::parse($item->waktu)->format('H:i') : '-' }}
                  
                  {{-- Tambahkan tulisan kecil jika ada izin --}}
                  @if ($item->izin)
                    <br>
                    <small class="text-gray-500 italic">
                        (Izin: {{ $item->izin->keterangan ?? 'Tidak ada keterangan' }} pada jam ke {{ $item->izin->jam_ke ?? '-' }})
                    </small>
                  @endif
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                  <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold 
                    @if($item->status === 'Hadir') bg-green-100 text-green-700
                    @elseif($item->status === 'Izin') bg-yellow-100 text-yellow-700
                    @elseif($item->status === 'Sakit') bg-red-100 text-red-700
                    @else bg-gray-100 text-gray-600
                    @endif">
                    {{ $item->status }}
                  </span>
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                  
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <p class="text-gray-500 italic mt-6">Belum ada data absensi.</p>
      @endif
      @endif
    </div>
  </main>

  <!-- Profile Modal -->
  <script id="profile-modal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50">
    function showProfile() {
      document.getElementById("profile-modal").classList.remove("hidden");
    }

    function closeProfile() {
      document.getElementById("profile-modal").classList.add("hidden");
    }

    document.getElementById("absensi-form").addEventListener("submit", function () {
      const input = document.createElement("input");
      input.type = "hidden";
      input.name = "waktu_absensi";
      const now = new Date();
      input.value = now.toISOString().slice(0, 19).replace("T", " ");
      this.appendChild(input);
    });
  </script
</body>

</html>
