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
        Schema::create('tpk_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tpk_group_name'); // Column for the name of the TPK group
            $table->string('head_name');
            $table->string('head_gender');
            $table->string('head_birthplace_date');
            $table->text('head_address');
            $table->string('head_nik', 20);
            $table->string('head_phone_number');
            $table->string('secretary_name');
            $table->string('secretary_gender');
            $table->string('secretary_birthplace_date');
            $table->text('secretary_address');
            $table->string('secretary_nik', 20);
            $table->string('secretary_phone_number');
            $table->string('member_name');
            $table->string('member_gender');
            $table->string('member_birthplace_date');
            $table->text('member_address');
            $table->string('member_nik', 20);
            $table->string('member_phone_number');
            $table->string('village_decree_number'); // 'no_sk_desa'
            $table->date('village_decree_date');    // 'tanggal_sk_desa'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tpk');
    }
};
