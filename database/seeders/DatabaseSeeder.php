<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Evaluation;
use App\Models\Multicompany;
use App\Models\Stat;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Multicompany::factory()->count(30)->create();
        User::factory()->count(4)->create();
        Worker::factory()->count(20)->create();
        Stat::factory()->count(19)->create();
        Evaluation::factory()->count(20)->create();

    }
}
