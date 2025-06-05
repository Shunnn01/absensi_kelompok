<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            // Hapus baris berikut karena kolom 'keterangan' sudah ada
            // $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            // Hapus 'keterangan' hanya jika Anda yakin kolom ini tidak diperlukan
            // $table->dropColumn(['keterangan']);
        });
    }
};
