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
        Schema::create('auction_announcements', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID
            $table->string('execution_time'); // Waktu Pelaksanaan
            $table->string('announcement_time'); // Waktu Pengumuman
            $table->string('registration_time'); // Waktu Pendaftaran
            $table->string('submission_time'); // Waktu Pemasukan
            $table->string('evaluation_time'); // Waktu Evaluasi
            $table->string('negotiation_time'); // Waktu Negosiasi
            $table->string('decision_time'); // Waktu Penetapan
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('rkp_id')->constrained('Schedule', 'rkp_id')->onDelete('cascade'); // Relasi ke tabel simpan
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_announcements');
    }
};
