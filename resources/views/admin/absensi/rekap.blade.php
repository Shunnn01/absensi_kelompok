@extends('admin.dashboard')

@section('content')
    <h2>Rekap Absensi Berdasarkan Kelas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekap as $kelas => $absensis)
                <tr>
                    <td colspan="6"><strong>Kelas: {{ $kelas }}</strong></td>
                </tr>
                @foreach ($absensis as $absensi)
                    <tr>
                        <td>{{ $absensi->id }}</td>
                        <td>{{ $absensi->user->name }}</td>
                        <td>{{ $absensi->user->kelas }}</td>
                        <td>{{ $absensi->status }}</td>
                        <td>{{ $absensi->waktu }}</td>
                        <td>
                            <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection