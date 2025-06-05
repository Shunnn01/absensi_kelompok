<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Absensi;
use Carbon\Carbon;

class MarkAbsentUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'absensi:mark-alpa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menandai pengguna yang tidak melakukan absensi hingga pukul 12:00 siang sebagai Alpa';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();

        // Ambil semua pengguna
        $users = User::all();

        foreach ($users as $user) {
            // Periksa apakah pengguna sudah melakukan absensi hari ini
            $existingAbsensi = Absensi::where('user_id', $user->id)
                ->whereDate('waktu', $today)
                ->first();

            // Jika belum absen, tambahkan status Alpa
            if (!$existingAbsensi) {
                Absensi::create([
                    'user_id' => $user->id,
                    'status' => 'Alpa',
                    'waktu' => now(),
                ]);
            }
        }

        $this->info('Semua pengguna yang tidak absen hingga pukul 12:00 siang telah ditandai sebagai Alpa.');
        return 0;
    }
}
