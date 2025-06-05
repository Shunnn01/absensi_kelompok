@extends('admin.dashboard')

@section('content')
    <h2>Edit Data Siswa</h2>
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $siswa->nama }}" required>
        <label>NIS:</label>
        <input type="text" name="nis" value="{{ $siswa->nis }}" required>
        <label>Kelas:</label>
        <input type="text" name="kelas" value="{{ $siswa->kelas }}" required>
        <button type="submit">Simpan</button>
    </form>
@endsection