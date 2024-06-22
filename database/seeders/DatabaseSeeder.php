<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Evaluation;
use App\Models\Intervention;
use App\Models\Multicompany;
use App\Models\Role;
use App\Models\Stat;
use App\Models\User;
use App\Models\Worker;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $this->call(StatSeeder::class);
        $this->call(RoleSeeder::class);
        Area::factory()->count(5)->create();
        Multicompany::factory()->count(20)->create();
        $companyIds = Multicompany::pluck('id')->toArray();
        foreach ($companyIds as $companyId) {
            $areaIDS = Area::pluck('id')->toArray();
            $statIDS = Stat::pluck('id')->toArray();
            $areaID = $faker->randomElement($areaIDS);
            $roleIDS = Role::pluck('id')->toArray();
            $roleID = $faker->randomElement($roleIDS);
            User::factory()->create([
                'company_id' => $companyId,
                'area_id' => $areaID,
                'role_id' => $roleID,
            ]);
            if($roleID == 1)
            {

                for ($i=0; $i < 4; $i++) { 

                    Worker::factory()->create([
                        'company_id' => $companyId,
                        'area_id' => $areaID,
                        'stat_id' => $faker->randomElement($statIDS),
                    ]);

                } 

            }
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
        $workerIDs = Worker::pluck('id')->toArray();
        foreach ($workerIDs as $workerID) {
            Intervention::factory()->create([
                'user_id' => $workerID,
            ]);
        }
        $workerIDs = Worker::pluck('id')->toArray();
        foreach ($workerIDs as $workerID) {
            Intervention::factory()->create([
                'user_id' => $workerID,
            ]);
        }

    }
}
