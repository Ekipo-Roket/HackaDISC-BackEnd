<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AreaManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => '6845',
                'user_name' => 'Juan Claudio Cruz Alfaro',
                'role' => 'Jefe',
                'email' => 'juan@gmail.com',
                'password' => Hash::make('contrasena2'),
                'company_id' => '9869',
                'area_id' => '55',
                'post_id' => '2345',

            ],
        ]);
    }
}
