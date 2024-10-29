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
        Schema::create('announcement_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('procurement_method'); // Cara Pengadaan
            $table->foreignId('tpk_id')->constrained('tpk_data')->onDelete('cascade'); // Relasi ke tabel simpan
            $table->string('start_date'); // Tanggal Mulai
            $table->string('end_date'); // Tanggal Selesai
            $table->foreignId('rkp_id')->constrained('rkp_data')->onDelete('cascade'); // Relasi ke tabel simpan
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_data');
    }
};
