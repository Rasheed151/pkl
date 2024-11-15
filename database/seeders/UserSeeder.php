<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => '12200820',
                'email' => '12200820@gmail.com',
                'password' => Hash::make('12200820'),
            ],

            [
                'name' => 'sangataSelatan',
                'email' => 'sangataSelatan@klipaa.id',
                'password' => Hash::make('klipaaIndonesia'),
            ],

        ]);
    }
}
