<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public function create()
    {
        return view('absensi.izin');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'keterangan' => 'required|string',
            'jam_ke' => 'required|integer',
        ]);

        $userId = Auth::id();
        $currentTime = now(); // Waktu saat ini

        // Periksa apakah pengguna sudah absen hari ini
        $existingAbsensi = Absensi::where('user_id', $userId)
            ->whereDate('waktu', $currentTime->toDateString())
            ->first();

        if ($existingAbsensi) {
            // Jika absensi sudah ada, tambahkan keterangan izin
            Izin::create([
                'absensi_id' => $existingAbsensi->id,
                'keterangan' => $request->keterangan,
                'jam_ke' => $request->jam_ke,
            ]);

            return redirect()->route('absensi.rekap')->with('success', 'Izin berhasil ditambahkan ke absensi yang sudah ada!');
        }

        // Jika absensi belum ada, buat absensi baru dengan status default
        $absensi = Absensi::create([
            'user_id' => $userId,
            'status' => 'Hadir', // Status default
            'waktu' => $currentTime,
        ]);

        // Simpan izin terkait absensi
        Izin::create([
            'absensi_id' => $absensi->id,
            'keterangan' => $request->keterangan,
            'jam_ke' => $request->jam_ke,
        ]);

        return redirect()->route('absensi.rekap')->with('success', 'Absensi dan izin berhasil ditambahkan!');
    }
}
