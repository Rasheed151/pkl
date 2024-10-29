<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tpk_dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tpk_data')->insert([
            [
                'tpk_group_name' => 'Kelompok1',
                'head_name' => 'Ketua1',
                'head_gender' => 'Laki-Laki',
                'head_birthplace_date' => 'Garut',
                'head_nik' => '32984937874',
                'head_address' => 'Garut',
                'head_phone_number' => '+62840592384',
                'secretary_name' => 'Sekertaris1',
                'secretary_gender' => 'Laki-Laki',
                'secretary_birthplace_date' => 'Garut',
                'secretary_nik' => '32984937874',
                'secretary_address' => 'Garut',
                'secretary_phone_number' => '+62840592384',
                'member_name' => 'Anggota1',
                'member_gender' => 'Laki-Laki',
                'member_birthplace_date' => 'Garut',
                'member_nik' => '32984937874',
                'member_address' => 'Garut',
                'member_phone_number' => '+62840592384',
                'village_decree_number' => '324/2345/2345',
                'village_decree_date' => '2020-01-01',
                'user_id' => '1',
            ],
            [
                'tpk_group_name' => 'Kelompok2',
                'head_name' => 'Ketua2',
                'head_gender' => 'Laki-Laki',
                'head_birthplace_date' => 'Garut',
                'head_nik' => '32984937874',
                'head_address' => 'Garut',
                'head_phone_number' => '+62840592384',
                'secretary_name' => 'Sekertaris2',
                'secretary_gender' => 'Laki-Laki',
                'secretary_birthplace_date' => 'Garut',
                'secretary_nik' => '32984937874',
                'secretary_address' => 'Garut',
                'secretary_phone_number' => '+62840592384',
                'member_name' => 'Anggota2',
                'member_gender' => 'Laki-Laki',
                'member_birthplace_date' => 'Garut',
                'member_nik' => '32984937874',
                'member_address' => 'Garut',
                'member_phone_number' => '+62840592384',
                'village_decree_number' => '324/2345/2345',
                'village_decree_date' => '2020-01-01',
                'user_id' => '1',
            ]

        ],);
    }
}
