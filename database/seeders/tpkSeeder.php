<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tpkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_tpk')->insert([
            ['nama' => 'Manusia1',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_tanggal_lahir' => 'Garut',
            'alamat' => 'Garut',
            'nik' => '32984937874',
            'no_hp' => '+62840592384',
            'no_sk_desa' => '324/2345/2345',
            'tanggal_sk_desa' => '2020-01-01',
            'jabatan' => 'Ketua',
            'userId' => '1',
        ],
        ['nama' => 'Manusia2',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_tanggal_lahir' => 'Garut',
            'alamat' => 'Garut',
            'nik' => '32984937874',
            'no_hp' => '+62840592384',
            'no_sk_desa' => '324/2345/2345',
            'tanggal_sk_desa' => '2020-01-01',
            'jabatan' => 'Anggota',
            'userId' => '1',
        ]
        
        ],);
    }
}
