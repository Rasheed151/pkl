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
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('time');
            $table->text('place');
            $table->text('activity_discussion');
            $table->text('discussion_material');
            $table->string('bpd_leader');
            $table->string('community_representative');
            $table->string('meeting_leader');
            $table->string('note');
            $table->text('final_agreement');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
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
