<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class village_dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('village_data')->insert([
            [
            'province' => 'provinsi',
            'district' => 'kabupaten',
            'subdistrict' => 'kecamatan',
            'village' => 'desa',
            'village_code' => '123',
            'office_address' => 'alamat_kantor',
            'email' => 'email@gmail.com',
            'npwp' => 'npwp',
            'pbj_decree_number' => 'no_tahun_perpub_pjb',
            'pbj_decree_date' => '2024-08-20',
            'dpa_approval_number' => 'no_pengesahan_dpa',
            'dpa_approval_date' => '2024-08-20',
            'village_head_name' => 'nama_kades',
            'fiscal_year' => '2024-08-19',
            'user_id' => '1',
        ],
        [
            'province' => 'provinsi',
            'district' => 'kabupaten',
            'subdistrict' => 'kecamatan',
            'village' => 'desa',
            'village_code' => '123',
            'office_address' => 'alamat_kantor',
            'email' => 'email@gmail.com',
            'npwp' => 'npwp',
            'pbj_decree_number' => 'no_tahun_perpub_pjb',
            'pbj_decree_date' => '2024-08-20',
            'dpa_approval_number' => 'no_pengesahan_dpa',
            'dpa_approval_date' => '2024-08-20',
            'village_head_name' => 'nama_kades',
            'fiscal_year' => '2024-08-19',
            'user_id' => '2',
        ],[
            'province' => 'provinsi',
            'district' => 'kabupaten',
            'subdistrict' => 'kecamatan',
            'village' => 'desa',
            'village_code' => '123',
            'office_address' => 'alamat_kantor',
            'email' => 'email@gmail.com',
            'npwp' => 'npwp',
            'pbj_decree_number' => 'no_tahun_perpub_pjb',
            'pbj_decree_date' => '2024-08-20',
            'dpa_approval_number' => 'no_pengesahan_dpa',
            'dpa_approval_date' => '2024-08-20',
            'village_head_name' => 'nama_kades',
            'fiscal_year' => '2024-08-19',
            'user_id' => '3',
        ],[
            'province' => 'provinsi',
            'district' => 'kabupaten',
            'subdistrict' => 'kecamatan',
            'village' => 'desa',
            'village_code' => '123',
            'office_address' => 'alamat_kantor',
            'email' => 'email@gmail.com',
            'npwp' => 'npwp',
            'pbj_decree_number' => 'no_tahun_perpub_pjb',
            'pbj_decree_date' => '2024-08-20',
            'dpa_approval_number' => 'no_pengesahan_dpa',
            'dpa_approval_date' => '2024-08-20',
            'village_head_name' => 'nama_kades',
            'fiscal_year' => '2024-08-19',
            'user_id' => '6',
        ]
        ]);
    }
}
