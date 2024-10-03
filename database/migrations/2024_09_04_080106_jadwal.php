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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kegiatan');
            $table->string('ketua_tpk'); 
            $table->string('sekertaris_tpk');
            $table->string('anggota_tpk'); 
            $table->integer('waktu_pelaksanaan'); 
            $table->date('tanggal_mulai'); 
            $table->date('tanggal_selesai'); 
            $table->integer('jumlah_biaya');
            $table->string('nama_kasi');
            $table->string('jabatan_kasi'); 
            $table->string('lokasi_kegiatan');
            $table->string('kegiatanId');
            $table->unsignedBigInteger('userId'); // Updated column type
            $table->timestamps(); // Created at and updated at timestamps

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
