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
        Schema::create('analisa_harga', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('kode');
            $table->string('satuan');
            $table->integer('koefisien');
            $table->integer('harga_satuan');
            $table->integer('jumlah_harga');
            $table->string('jenis');
            $table->string('kegiatanId');
            $table->unsignedBigInteger('userId'); // Kegiatan Sebesar
            $table->timestamps(); // Created at and updated at timestamps

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisa_harga');
    }
};
