<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Multicompany;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $usedWorkerIds = ['SUPERVISOR ELECTRICO', 'M-1 ELECTRICO', 'LIDER MECANICO','M1 ELECTRICO','Operador Multiple'];
    public function definition(): array
    {
        $areaIDS = Area::pluck('id')->toArray();
        $companyIDS = Multicompany::pluck('id')->toArray();
        return [
            'user_name' => $this->faker->name,
            'stat_id' =>  1,
            'role' =>  $this->faker->jobTitle,
            'area_id' => fake()->randomElement($areaIDS),
            'post_name' => $this->faker->randomElement(['SUPERVISOR ELECTRICO', 'M-1 ELECTRICO', 'LIDER MECANICO','M1 ELECTRICO','Operador Multiple']),
            'post_id' => $this->faker->unique()->numberBetween(1, 1000000),
        ];
    }
}
