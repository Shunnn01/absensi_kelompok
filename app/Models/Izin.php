<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izins'; // Pastikan nama tabelnya adalah 'izins'

    protected $fillable = [
        'absensi_id',
        'keterangan',
        'jam_ke',
    ];

    /**
     * Relasi ke model Absensi.
     */
    public function absensi()
    {
        return $this->belongsTo(Absensi::class, 'absensi_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function izin()
    {
        return $this->hasOne(Izin::class, 'absensi_id', 'id');
    }
}
