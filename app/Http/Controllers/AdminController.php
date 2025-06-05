<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil data absensi dengan relasi user
        $rekap = Absensi::with('user')
            ->orderBy('waktu', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return optional($item->user)->kelas ?? 'Tidak diketahui';
            })
            ->map(function ($absensis) {
                return $absensis->sortBy(function ($absensi) {
                    return optional($absensi->user)->name;
                });
            });

        // Kirim data ke view
        return view('admin.dashboard', compact('rekap'));
    }
}
