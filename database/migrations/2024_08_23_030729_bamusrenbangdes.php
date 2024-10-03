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
        Schema::create('bamusrenbangdes', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam');
            $table->text('tempat');
            $table->text('bahas_kegiatan');
            $table->text('materi_pembahasan');
            $table->string('ketua_bpd');
            $table->string('wakil_masyarakat');
            $table->string('pimpinan_rapat');
            $table->string('notulen');
            $table->text('kesepakatan_akhir');
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
        Schema::dropIfExists('bamusrenbangdes');
    }
};
