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
        Schema::create('izins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('absensi_id'); // Foreign key ke tabel absensi
            $table->string('keterangan')->nullable(); // Keterangan izin
            $table->integer('jam_ke')->nullable(); // Jam ke berapa izin
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('absensi_id')->references('id')->on('absensi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izins');
    }
};
