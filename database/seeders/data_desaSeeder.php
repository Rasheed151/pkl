<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class data_desaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_desa')->insert([
            [
            'provinsi' => 'provinsi',
            'kabupaten' => 'kabupaten',
            'kecamatan' => 'kecamatan',
            'desa' => 'desa',
            'kode_desa' => '123',
            'alamat_kantor' => 'alamat_kantor',
            'email' => 'email@gmail.com',
            'npwp' => 'npwp',
            'no_tahun_perpub_pjb' => 'no_tahun_perpub_pjb',
            'tanggal_perpub_pjb' => '2024-08-20',
            'no_pengesahan_dpa' => 'no_pengesahan_dpa',
            'tanggal_pengesahan_dpa' => '2024-08-20',
            'nama_kades' => 'nama_kades',
            'tahun_anggaran' => '2024-08-19',
            'userId' => '1',
        ],
        [
            'provinsi' => 'provinsi',
            'kabupaten' => 'kabupaten',
            'kecamatan' => 'kecamatan',
            'desa' => 'desa',
            'kode_desa' => '123',
            'alamat_kantor' => 'alamat_kantor',
            'email' => 'email@gmail.com',
            'npwp' => 'npwp',
            'no_tahun_perpub_pjb' => 'no_tahun_perpub_pjb',
            'tanggal_perpub_pjb' => '2024-08-20',
            'no_pengesahan_dpa' => 'no_pengesahan_dpa',
            'tanggal_pengesahan_dpa' => '2024-08-20',
            'nama_kades' => 'nama_kades',
            'tahun_anggaran' => '2024-08-19',
            'userId' => '2',
        ],[
            'provinsi' => 'provinsi',
            'kabupaten' => 'kabupaten',
            'kecamatan' => 'kecamatan',
            'desa' => 'desa',
            'kode_desa' => '123',
            'alamat_kantor' => 'alamat_kantor',
            'email' => 'email@gmail.com',
            'npwp' => 'npwp',
            'no_tahun_perpub_pjb' => 'no_tahun_perpub_pjb',
            'tanggal_perpub_pjb' => '2024-08-20',
            'no_pengesahan_dpa' => 'no_pengesahan_dpa',
            'tanggal_pengesahan_dpa' => '2024-08-20',
            'nama_kades' => 'nama_kades',
            'tahun_anggaran' => '2024-08-19',
            'userId' => '3',
        ]
        ]);
    }
}
