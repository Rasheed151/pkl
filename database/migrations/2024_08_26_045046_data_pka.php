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
        Schema::create('data_pka', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_tanggal_lahir');
            $table->string('nik', 20);
            $table->string('jabatan');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('no_sk_kades');
            $table->date('tanggal_sk_kades');
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
        Schema::dropIfExists('data_pka');
    }
};
