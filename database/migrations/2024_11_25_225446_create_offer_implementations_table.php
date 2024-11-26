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
        Schema::create('offer_implementations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('opening_time');
            $table->string('evaluation_time');
            $table->string('negotiation_time');
            $table->string('information')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('rkp_id')->constrained('announcement_data', 'rkp_id')->onDelete('cascade'); // Relasi ke tabel simpan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_implementations');
    }
};
