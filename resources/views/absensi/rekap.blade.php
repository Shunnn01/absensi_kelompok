@extends('layouts.app')

@section('title', 'Rekap Absensi')

@section('content')
<div class="max-w-6xl mx-auto to mt-14 px-6 font-['Inter','Segoe UI','sans-serif']">
    <div class="bg-white/30 backdrop-blur-xl shadow-2xl rounded-3xl p-10 border border-[#77B0AA]/40 relative overflow-hidden transition-all duration-500">
        <!-- Background Ornamen -->
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-[#135D66]/30 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-[#003C43]/20 rounded-full blur-3xl animate-pulse-slow"></div>

        <h1 class="text-4xl font-extrabold text-[#003C43] mb-4 tracking-tight flex items-center gap-2">
            <i class="fas fa-chart-line text-[#135D66] animate-fadeInUp"></i>
            Rekap Absensi
        </h1>
        <p class="text-[#135D66] text-lg mb-8">Ringkasan kehadiranmu tiap bulan, tampil dengan elegan dan informatif.</p>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="bg-green-100/80 border border-green-400 text-green-800 px-4 py-3 rounded-xl mb-6 shadow-md animate-fadeIn">
                <strong><i class="fas fa-check-circle mr-2"></i>Berhasil!</strong> {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100/80 border border-red-400 text-red-800 px-4 py-3 rounded-xl mb-6 shadow-md animate-fadeIn">
                <strong><i class="fas fa-times-circle mr-2"></i>Gagal!</strong> {{ session('error') }}
            </div>
        @endif

        {{-- Data Absensi --}}
        <div class="overflow-x-auto rounded-xl shadow-xl ring-1 ring-[#003C43]/10">
            <table class="min-w-full text-md text-left bg-white/70 backdrop-blur-md rounded-xl">
            <thead class="bg-gradient-to-r from-[#E3FEF7] to-[#77B0AA]/30 text-[#003C43] font-semibold">
                <tr>
                    <th class="px-6 py-4">
                        <i class="fas fa-calendar-alt text-red-700 mr-2"></i> Tanggal
                    </th>
                    <th class="px-6 py-4">
                        <i class="fas fa-sticky-note text-amber-500 mr-2"></i> Keterangan
                    </th>
                    <th class="px-6 py-4">
                        <i class="fas fa-check-circle text-green-600 mr-2"></i> Status
                    </th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($rekap as $bulan => $data)
                        <tr>
                            <td colspan="3" class="font-bold text-blue-700 bg-blue-100 px-6 py-3">
                                {{ $bulan }}
                            </td>
                        </tr>
                        @foreach ($data as $absensi)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="px-6 py-4 border-b border-gray-200">
                                    {{ $absensi->waktu ? \Carbon\Carbon::parse($absensi->waktu)->format('d-m-Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    Melakukan absensi pada pukul 
                                    {{ $absensi->waktu ? \Carbon\Carbon::parse($absensi->waktu)->format('H:i') : '-' }}
                                    
                                    {{-- Tambahkan tulisan kecil jika ada izin --}}
                                    @if ($absensi->izin)
                                        <br>
                                        <small class="text-gray-500 italic">
                                            (Izin: {{ $absensi->izin->keterangan ?? 'Tidak ada keterangan' }} pada jam ke {{ $absensi->izin->jam_ke ?? '-' }})
                                        </small>
                                    @endif
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold 
                                        @if($absensi->status === 'Hadir') bg-green-100 text-green-700
                                        @elseif($absensi->status === 'Izin') bg-yellow-100 text-yellow-700
                                        @elseif($absensi->status === 'Sakit') bg-red-100 text-red-700
                                        @else bg-gray-100 text-gray-600
                                        @endif">
                                        {{ $absensi->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Back Button --}}
        <div class="mt-12 text-center">
            <a href="{{ route('landing') }}"
               class="inline-flex items-center bg-gradient-to-r from-[#003C43] to-[#135D66] hover:from-[#135D66] hover:to-[#003C43] text-white font-medium px-6 py-3 rounded-xl shadow-lg transition-all duration-300 hover:scale-105">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

{{-- Animasi CSS --}}
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes pulseSlow {
        0%, 100% {
            transform: scale(1);
            opacity: 0.3;
        }
        50% {
            transform: scale(1.1);
            opacity: 0.5;
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out both;
    }

    .animate-fadeIn {
        animation: fadeInUp 0.5s ease-out both;
    }

    .animate-pulse-slow {
        animation: pulseSlow 6s infinite ease-in-out;
    }

    body {
        background: linear-gradient(135deg, #E3FEF7, #77B0AA);
        font-family: 'Inter', 'Segoe UI', sans-serif;
    }
</style>
@endsection
