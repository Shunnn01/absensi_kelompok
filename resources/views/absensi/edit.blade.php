@extends('layouts.app')

@section('title', 'Edit Absensi')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-2xl p-8 transition duration-300 hover:shadow-2xl">
        {{-- Header --}}
        <div class="text-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-800">Edit Absensi</h1>
            <p class="text-gray-500 mt-1">Perbarui status kehadiran siswa dengan cepat dan mudah.</p>
        </div>

        {{-- Success & Error Feedback --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong>Gagal!</strong> {{ session('error') }}
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Status --}}
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Kehadiran</label>
                <div class="relative">
                    <select name="status" id="status" required
                        class="appearance-none w-full px-4 py-3 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Hadir" {{ $absensi->status === 'Hadir' ? 'selected' : '' }}>✅ Hadir</option>
                        <option value="Izin" {{ $absensi->status === 'Izin' ? 'selected' : '' }}>📝 Izin</option>
                        <option value="Sakit" {{ $absensi->status === 'Sakit' ? 'selected' : '' }}>🤒 Sakit</option>
                        <option value="Alpa" {{ $absensi->status === 'Alpa' ? 'selected' : '' }}>❌ Alpa</option>
                    </select>
                    <div class="pointer-events-none absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        ⏷
                    </div>
                </div>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-[1.01]">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>

        {{-- Tombol Kembali --}}
        <div class="mt-6 text-center">
            <a href="{{ route('absensi.index') }}"
               class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-3 rounded-lg shadow transition duration-300">
                ← Kembali ke Daftar Absensi
            </a>
        </div>
    </div>
</div>
@endsection
