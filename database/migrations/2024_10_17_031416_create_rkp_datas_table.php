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
        Schema::create('rkp_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('field'); // Bidang
            $table->string('sub_field'); // Sub Bidang
            $table->string('activity_name'); // Nama Kegiatan
            $table->string('activity_location'); // Lokasi Kegiatan
            $table->string('volume'); // Volume
            $table->string('benefit_target'); // Sasaran Manfaat
            $table->string('start_date'); // Tanggal Mulai
            $table->string('end_date'); // Tanggal Selesai
            $table->integer('implementation_time'); // Waktu Pelaksanaan
            $table->integer('total_cost'); // Jumlah Biaya
            $table->string('funding_source'); // Sumber Biaya
            $table->boolean('self_management')->default(false); // Swakelola
            $table->boolean('village_cooperation')->default(false); // Kerjasama Desa
            $table->boolean('third_party')->default(false); // Pihak Ketiga
            $table->foreignId('officials_id')->constrained('officials_data')->onDelete('cascade');//relasi tabel officials_data 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rkp_data');
    }
};
