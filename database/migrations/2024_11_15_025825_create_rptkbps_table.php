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
        Schema::create('rptkbps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('technical_id')->constrained('technical_specifications')->onDelete('cascade');
            $table->string('code');
            $table->string('unit');
            $table->double('coefficient');
            $table->string('volume');
            $table->double('amount');
            $table->double('final_amount');
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
        Schema::dropIfExists('rptkbps');
    }
};
