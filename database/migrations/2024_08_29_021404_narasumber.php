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
        Schema::create('resource_person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bamusrenbangdes_id')->constrained('bamusrenbangdes')->onDelete('cascade');
            $table->string('resource_person');
            $table->string('from');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_person');
    }
};
