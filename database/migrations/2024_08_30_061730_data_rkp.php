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
        Schema::create('data_rkp', function (Blueprint $table) {
            $table->id();
            $table->string('bidang');
            $table->string('sub_bidang');
            $table->string('nama_kegiatan');
            $table->string('lokasi_kegiatan');
            $table->string('volume');
            $table->string('sasaran_manfaat');
            $table->integer('waktu_pelaksanaan');
            $table->integer('jumlah_biaya');
            $table->string('sumber_biaya');
            $table->boolean('swakelola')->default(false); 
            $table->boolean('kerjasama_desa')->default(false);
            $table->boolean('pihak_ketiga')->default(false);
            $table->string('rencana_pelaksana_kegiatan');
            
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
        Schema::dropIfExists('data_rkp');
    }
};