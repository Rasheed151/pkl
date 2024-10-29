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
    Schema::create('village_data', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('province');
        $table->string('district'); // kabupaten -> district
        $table->string('subdistrict'); // kecamatan -> subdistrict
        $table->string('village');
        $table->string('village_code',25);
        $table->text('office_address');
        $table->string('email');
        $table->string('npwp');
        $table->string('pbj_decree_number'); // no_tahun_perpub_pjb -> pbj_decree_number
        $table->date('pbj_decree_date'); // tanggal_perpub_pjb -> pbj_decree_date
        $table->string('dpa_approval_number'); // no_pengesahan_dpa -> dpa_approval_number
        $table->date('dpa_approval_date'); // tanggal_pengesahan_dpa -> dpa_approval_date
        $table->string('village_head_name');
        $table->string('fiscal_year',25);//tahun_anggaran -> fiscal_year
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_data');
    }
};
