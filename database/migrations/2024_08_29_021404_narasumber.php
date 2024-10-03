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
        Schema::create('narasumber', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('bamusrenbangdesId');
            $table->string('narasumber');
            $table->string('dari');
            $table->timestamps();

            $table->foreign('bamusrenbangdesId')->references('id')->on('bamusrenbangdes')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('narasumber');
    }
};
