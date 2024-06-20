<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stats')->insert([
            [
                'name_stat' => 'Evaluado',

            ],
            [
                'name_stat' => 'En intervencion',
            ],
            [
                'name_stat' => 'Intervenido',
            ],
        ]);
        
    }
}
