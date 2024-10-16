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
        Schema::create('pka_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('officials_id')->constrained('officials_data')->onDelete('cascade');//relasi tabel officials_data 
            $table->string('village_head_decree_number'); // 'no_sk_kades'
            $table->date('village_head_decree_date');    // 'tanggal_sk_kades'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pka_data');
    }
};
