@extends('layouts.app')

@section('title', 'Form Pengajuan Izin')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2D3250] via-[#424769] to-[#7077A1] py-10 px-4">
    <div class="bg-white/10 backdrop-blur-md shadow-2xl rounded-2xl w-full max-w-2xl p-8 border border-white/20 transition-all duration-300">
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-extrabold text-white mb-2">Pengajuan Izin</h1>
            <p class="text-[#F6B17A]">Silakan isi form di bawah untuk mengajukan izin tidak hadir.</p>
        </div>

        {{-- Success & Error Feedback --}}
        @if (session('success'))
            <div class="bg-green-200/20 border border-green-400 text-green-200 px-4 py-3 rounded relative mb-4">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-200/20 border border-red-400 text-red-200 px-4 py-3 rounded relative mb-4">
                <strong>Gagal!</strong> {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('izin.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Keterangan Izin --}}
            <div>
                <label for="keterangan" class="block text-sm font-medium text-[#F6B17A] mb-1">Keterangan Izin</label>
                <div class="relative">
                    <select name="keterangan" id="keterangan" required
                        class="appearance-none w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white focus:outline-none focus:ring-2 focus:ring-[#F6B17A]">
                        <option value="" disabled selected class="bg-gray-700 text-white">Pilih keterangan izin</option>
                        <option value="Sakit" class="text-black">🤒 Sakit</option>
                        <option value="Dispen" class="text-black">🏫 Dispen</option>
                        <option value="Keperluan Lain" class="text-black">📝 Keperluan Lain</option>
                    </select>
                    <div class="pointer-events-none absolute right-3 top-1/2 transform -translate-y-1/2 text-white">
                        ⏷
                    </div>
                </div>
                @error('keterangan')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jam Ke --}}
            <div>
                <label for="jam_ke" class="block text-sm font-medium text-[#F6B17A] mb-1">Jam Ke</label>
                <input type="number" name="jam_ke" id="jam_ke" min="1" placeholder="Contoh: 3" required
                    class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-[#F6B17A] transition duration-300">
                @error('jam_ke')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit"
                    class="w-full bg-[#F6B17A] hover:bg-[#f89f5c] text-[#2D3250] font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                    Kirim Pengajuan Izin
                </button>
            </div>
        </form>

        {{-- Tombol Kembali --}}
        <div class="mt-6 text-center">
            <a href="{{ route('landing') }}"
               class="inline-flex items-center bg-white/20 hover:bg-white/30 text-white font-medium px-6 py-3 rounded-lg shadow-md transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
