<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class aparatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_aparat')->insert([
            ['nama' => 'Orang1',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_tanggal_lahir' => 'Garut',
            'nik' => '32984937874',
            'alamat' => 'Garut',
            'npwp' => '345/4523/2345',
            'no_hp' => '+62840592384',
            'jabatan' => 'Hakim MK',
            'userId' => '1',
        ],
        ['nama' => 'Orang2',
        'jenis_kelamin' => 'Laki-Laki',
        'tempat_tanggal_lahir' => 'Garut',
        'nik' => '3284943234',
        'alamat' => 'Garut',
        'npwp' => '647/2345/8765',
        'no_hp' => '+628469784637',
        'jabatan' => 'Cawapres',
        'userId' => '1',
        ]
        
        ],);
    }
}
