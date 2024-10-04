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
    Schema::create('data_desa', function (Blueprint $table) {
        $table->id();
        $table->string('provinsi');
        $table->string('kabupaten');
        $table->string('kecamatan');
        $table->string('desa');
        $table->string('kode_desa',20);
        $table->text('alamat_kantor');
        $table->string('email');
        $table->string('npwp');
        $table->string('no_tahun_perpub_pjb');
        $table->date('tanggal_perpub_pjb');
        $table->string('no_pengesahan_dpa');
        $table->date('tanggal_pengesahan_dpa');
        $table->string('nama_kades');
        $table->date('tahun_anggaran')->year()->nullable();
        $table->foreignId ('userId'); // Updated column type
        $table->timestamps();

        $table->foreign('userId')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_desa');
    }
};
