<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BusinessManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => '8657',
                'user_name' => 'José René Torres Mora',
                'role' => 'Gerente',
                'email' => 'jose@gmail.com',
                'password' => Hash::make('contrasena3'),
                'company_id' => '1245',
                'area_id' => '1242',
                'post_id' => '8764',

            ],
        ]);
    }
}
