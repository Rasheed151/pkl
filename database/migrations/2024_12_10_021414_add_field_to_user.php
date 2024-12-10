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
        Schema::table('users', function (Blueprint $table) { // Gunakan nama tabel, bukan path file
            $table->string('level')->nullable()->after('email'); // Contoh penambahan field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) { // Gunakan nama tabel, bukan path file
            $table->dropColumn('level')->after('email'); // Hapus field jika rollback
        });
    }
};
