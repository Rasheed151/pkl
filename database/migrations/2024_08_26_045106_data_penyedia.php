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
        Schema::create('supplier_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->string('birthplace_date');
            $table->string('nik', 20);
            $table->text('address');
            $table->string('company_name');    // 'nama_perusahaan'
            $table->text('company_address');   // 'alamat_perusahaan'
            $table->string('phone_number');
            $table->string('npwp');
            $table->string('nib',20);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_data');
    }
};
