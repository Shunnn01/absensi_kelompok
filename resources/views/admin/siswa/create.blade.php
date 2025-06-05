@extends('admin.dashboard')

@section('content')
    <h2>Tambah Data Siswa</h2>
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>NIS:</label>
        <input type="text" name="nis" required>
        <label>Kelas:</label>
        <input type="text" name="kelas" required>
        <button type="submit">Simpan</button>
    </form>
@endsection