@extends('admin.dashboard')

@section('content')
    <h2>Data Siswa</h2>
    <a href="{{ route('siswa.create') }}">Tambah Data Siswa</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->id }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $siswa->id) }}">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection