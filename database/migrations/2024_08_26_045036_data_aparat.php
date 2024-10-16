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
        Schema::create('officials_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->string('birthplace_date');
            $table->string('nik', 20);
            $table->text('addres`');
            $table->string('npwp');
            $table->string('phone_number');
            $table->string('position');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officials_data');
    }
};
