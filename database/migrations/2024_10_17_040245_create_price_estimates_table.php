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
        Schema::create('price_estimate', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID
            $table->string('name'); // Nama
            $table->string('specification'); // Spesifikasi
            $table->string('volume'); // Volume
            $table->string('unit'); // Satuan
            $table->integer('unit_price'); // Harga Satuan
            $table->integer('total_price'); // Jumlah Harga
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('rkp_id')->constrained('announcement_data', 'rkp_id')->onDelete('cascade'); // Relasi ke tabel simpan
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_estimate');
    }
};
