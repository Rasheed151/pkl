<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class officials_dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('officials_data')->insert([
            [
                'name' => 'Orang1',
                'gender' => 'Laki-Laki',
                'birthplace_date' => 'Garut',
                'nik' => '32984937874',
                'address' => 'Garut',
                'npwp' => '345/4523/2345',
                'phone_number' => '+62840592384',
                'position' => 'Hakim MK',
                'user_id' => '1',
            ],
            [
                'name' => 'Orang2',
                'gender' => 'Laki-Laki',
                'birthplace_date' => 'Garut',
                'nik' => '3284943234',
                'address' => 'Garut',
                'npwp' => '647/2345/8765',
                'phone_number' => '+628469784637',
                'position' => 'Cawapres',
                'user_id' => '1',
            ]

        ],);
    }
}
