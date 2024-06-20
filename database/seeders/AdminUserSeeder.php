<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => '1252',
                'user_name' => 'Sofía Agustina Castro Soto',
                'role' => 'Administrador',
                'email' => 'sofia@gmail.com',
                'password' => Hash::make('contrasena1'),
                'company_id' => '1515',
                'area_id' => '83',
                'post_id' => '152',

            ],
        ]);
    }
}
