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
        Schema::create('data_kak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kegiatan');
            $table->text('latar_belakang');
            $table->string('sasaran_manfaat');
            $table->string('cara_pengadaan');
            $table->string('ketua_tpk'); 
            $table->string('sekertaris_tpk');
            $table->string('anggota_tpk'); 
            $table->string('nama_kasi');
            $table->string('jabatan_kasi');
            $table->integer('waktu_pelaksanaan'); 
            $table->date('tanggal_mulai'); 
            $table->date('tanggal_selesai'); 
            $table->integer('jumlah_biaya');
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
        Schema::dropIfExists('data_kak');
    }
};
