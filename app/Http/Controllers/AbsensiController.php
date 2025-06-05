<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Ambil ID pengguna yang sedang login
        $absensi = Absensi::where('user_id', $userId)->orderBy('waktu', 'desc')->get(); // Filter berdasarkan user_id

        return view('absensi.index', compact('absensi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'keterangan' => 'nullable|string',
            'jam_ke' => 'nullable|integer',
        ]);

        $userId = Auth::id(); // Ambil ID pengguna yang sedang login
        $currentTime = now(); // Waktu saat ini
        $lateTime = now()->setTime(7, 30); // Batas waktu untuk hadir

        // Periksa apakah pengguna sudah absen hari ini
        $existingAbsensi = Absensi::where('user_id', $userId)
            ->whereDate('waktu', $currentTime->toDateString())
            ->first();

        if ($existingAbsensi) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi hari ini.');
        }

        $status = $request->status;

        // Jika status "Hadir" tetapi waktu sudah melewati batas, ubah menjadi "Terlambat"
        if ($status === 'Hadir' && $currentTime->greaterThan($lateTime)) {
            $status = 'Terlambat';
        }

        // Simpan absensi
        Absensi::create([
            'user_id' => $userId, // Pastikan kolom user_id diisi
            'status' => $status,
            'waktu' => $currentTime,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan!');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id); // Cari absensi berdasarkan ID, atau tampilkan 404 jika tidak ditemukan
        return view('absensi.edit', compact('absensi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
                'status' => 'required|in:Hadir,Sakit,Izin,Terlambat',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->status = $request->status;
        $absensi->save();

        return redirect()->route('admin.dashboard')->with('success', 'Status absensi berhasil diperbarui.');
    }

    public function rekap()
    {
        $userId = Auth::id();
        $rekap = Absensi::where('user_id', $userId)
            ->with('izin') // Pastikan relasi izin dimuat
            ->orderBy('waktu', 'desc')
            ->get()
            ->map(function ($absensi) {
                // Tambahkan keterangan absensi
                if ($absensi->izin) {
                    $absensi->keterangan = $absensi->izin->keterangan . ' pada jam ke ' . $absensi->izin->jam_ke;
                } else {
                    $absensi->keterangan = $absensi->waktu
                        ? 'Melakukan absensi pada pukul ' . \Carbon\Carbon::parse($absensi->waktu)->format('H:i')
                        : 'Waktu absensi tidak tersedia';
                }
                return $absensi;
            })
            ->groupBy(function ($item) {
                return $item->waktu ? \Carbon\Carbon::parse($item->waktu)->format('F Y') : 'Tidak diketahui';
            });

        return view('absensi.rekap', compact('rekap'));
    }

    public function rekapAdmin()
    {
        $rekap = Absensi::with(['izin', 'user'])
            ->orderBy('waktu', 'desc')
            ->get()
            ->map(function ($absensi) {
                if ($absensi->izin) {
                    $absensi->keterangan = $absensi->izin->keterangan . ' pada jam ke ' . $absensi->izin->jam_ke;
                } else {
                    $absensi->keterangan = $absensi->waktu
                        ? 'Melakukan absensi pada pukul ' . \Carbon\Carbon::parse($absensi->waktu)->format('H:i')
                        : 'Waktu absensi tidak tersedia';
                }
                return $absensi;
            })
            ->groupBy(function ($item) {
                return optional($item->user)->kelas ?? 'Tidak diketahui';
            });

        return view('admin.absensi.rekap', compact('rekap'));
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id); // Cari absensi berdasarkan ID
        $absensi->delete(); // Hapus data absensi

        return redirect()->route('admin.rekap-absensi')->with('success', 'Data absensi berhasil dihapus.');
    }
}

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil data absensi dengan relasi user dan izin
        $rekap = Absensi::with(['user', 'izin'])
            ->orderBy('waktu', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return optional($item->user)->kelas ?? 'Tidak diketahui';
            });

        // Kirim data ke view
        return view('admin.dashboard', compact('rekap'));
    }
}

