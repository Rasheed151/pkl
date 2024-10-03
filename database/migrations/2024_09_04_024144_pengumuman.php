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
        Schema::create('data_pengumuman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kegiatan');
            $table->integer('jumlah_biaya');
            $table->string('cara_pengadaan');
            $table->string('volume'); 
            $table->string('satuan');
            $table->string('nama_tpk');
            $table->string('lokasi_kegiatan');
            $table->date('tanggal');
            $table->integer('waktu_pelaksanaan');
            $table->string('kegiatanId');
            $table->unsignedBigInteger('userId'); // Updated column type
            $table->timestamps();
    
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengumuman');
    }
};
