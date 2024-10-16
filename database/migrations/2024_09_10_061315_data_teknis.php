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
        Schema::create('technical_specifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // Nama
            $table->string('specification'); // Spesifikasi
            $table->string('type'); // Jenis
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
        Schema::dropIfExists('technical_specifications');
    }
};
