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
        Schema::create('absen1s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->integer('kelas');
            $table->integer('absen');
            $table->integer('nis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen1s');
    }
};
