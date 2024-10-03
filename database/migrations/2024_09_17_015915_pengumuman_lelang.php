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
        Schema::create('pengumuman_lelang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kegiatan');
            $table->string('ketua_tpk');
            $table->string('sekertaris_tpk');
            $table->string('anggota_tpk');
            $table->string('lokasi_kegiatan');
            $table->string( 'bidang');
            $table->integer('total_nilai_hps');
            $table->string('waktu_pelaksanaan');
            $table->string('waktu_pengumuman');
            $table->string('waktu_pendaftaran');
            $table->string('waktu_pemasukan');
            $table->string('waktu_evaluasi');
            $table->string('waktu_negosiasi');
            $table->string('waktu_penepatan');
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
        Schema::dropIfExists('pengumuman_lelang');
    }
};
