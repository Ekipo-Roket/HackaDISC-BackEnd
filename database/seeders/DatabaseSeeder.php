<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Evaluation;
use App\Models\Multicompany;
use App\Models\Stat;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatSeeder::class);
        $this->call(RoleSeeder::class);
        Area::factory()->count(5)->create();
        Multicompany::factory()->count(20)->create();
        $companyIds = Multicompany::pluck('id')->toArray();
        foreach ($companyIds as $companyId) {
            User::factory()->create([
                'company_id' => $companyId,
            ]);
        }
        $companyIds = Multicompany::pluck('id')->toArray();
        foreach ($companyIds as $companyId) {
            Worker::factory()->create([
                'company_id' => $companyId,
            ]);
        }
        $companyIds = Multicompany::pluck('id')->toArray();
        foreach ($companyIds as $companyId) {
            Worker::factory()->create([
                'company_id' => $companyId,
            ]);
        }

        $workerIDs = Worker::pluck('id')->toArray();
        foreach ($workerIDs as $workerID) {
            Evaluation::factory()->create([
                'user_id' => $workerID,
            ]);
        }
        $workerIDs = Worker::pluck('id')->toArray();
        foreach ($workerIDs as $workerID) {
            Evaluation::factory()->create([
                'user_id' => $workerID,
            ]);
        }
        $workerIDs = Worker::pluck('id')->toArray();
        foreach ($workerIDs as $workerID) {
            Evaluation::factory()->create([
                'user_id' => $workerID,
            ]);
        }

    }
}
