<!-- filepath: resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<!-- Tambahkan di dalam <head> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f1f5f9;
        color: #1e293b;
    }
    
    header {
        background: linear-gradient(90deg, #3b82f6, #60a5fa);
        color: white;
        padding: 2rem 0;
        text-align: center;
        font-size: 2rem;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
    }
    
    nav {
        background-color: #1e293b;
    }
    
    nav ul {
        display: flex;
        justify-content: center;
        padding: 1rem 0;
        margin: 0;
        list-style: none;
        gap: 1.5rem;
    }
    
    nav ul li a {
        color: #e2e8f0;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        background-color: transparent;
    }
    
    nav ul li a:hover {
        background-color: #3b82f6;
        color: #fff;
    }
    
    .container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.05);
    }
    
    h2 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #1e40af;
    }
    
    h3 {
        margin-top: 2rem;
        color: #1e3a8a;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        font-size: 0.95rem;
    }
    
    thead {
        background-color: #e0f2fe;
    }
    
    thead th {
        padding: 1rem;
        text-align: left;
        color: #0f172a;
    }
    
    tbody tr:nth-child(even) {
        background-color: #f8fafc;
    }
    
    td {
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: top;
    }
    
    select {
        padding: 0.5rem;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        background-color: #f1f5f9;
        font-size: 0.95rem;
    }
    
    button {
        background-color: transparent;
        border: none;
        color: #dc2626;
        cursor: pointer;
        font-size: 0.95rem;
        padding: 0.5rem 0.75rem;
        transition: color 0.3s ease;
    }
    
    button:hover {
        color: #b91c1c;
    }
    
    footer {
        text-align: center;
        padding: 1.5rem 0;
        background-color: #1e293b;
        color: #94a3b8;
        font-size: 0.9rem;
        margin-top: 3rem;
        border-top: 4px solid #3b82f6;
    }
    </style>
    
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
       
           
            <li><a >Rekap Absensi</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Rekap Absensi Berdasarkan Kelas</h2>
        @foreach ($rekap as $kelas => $absensis)
            <h3 style="margin-top: 2rem;">Kelas: {{ $kelas }}</h3>
            <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                <thead>
                    <tr style="background-color: #f3f4f6; text-align: left;">
                        <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">ID</th>
                        <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Nama</th>
                        <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Kelas</th>
                        <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Status</th>
                        <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Waktu</th>
                        <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensis as $absensi)
                        <tr>
                            <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ $absensi->id }}</td>
                            <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">
                                {{ $absensi->user->name }}
                                @if ($absensi->izin)
                                    <br>
                                    <span style="font-size: 0.8rem; color: #6b7280;">
                                        <em>{{ $absensi->izin->keterangan }} pada jam ke {{ $absensi->izin->jam_ke }}</em>
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ $absensi->user->kelas }}</td>
                            <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">
                                @if ($absensi->izin)
                                    <span style="color: #f59e0b;">{{ $absensi->izin->keterangan }}</span>
                                @else
                                    {{ $absensi->status }}
                                @endif
                            </td>
                            <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ $absensi->waktu }}</td>
                            <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">
                                <!-- Dropdown untuk mengubah status -->
                                <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" style="padding: 0.5rem; border: 1px solid #e5e7eb; border-radius: 6px;">
                                        <option value="Hadir" {{ $absensi->status === 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="Sakit" {{ $absensi->status === 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                        <option value="Izin" {{ $absensi->status === 'Izin' ? 'selected' : '' }}>Izin</option>
                                        <option value="Terlambat" {{ $absensi->status === 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                                    </select>
                                </form>
                                <!-- Tombol hapus -->
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: #dc2626; background: none; border: none; cursor: pointer;" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
    <footer>
        <p>&copy; 2025 Absensi Kelompok. All rights reserved.</p>
    </footer>
</body>
</html>
