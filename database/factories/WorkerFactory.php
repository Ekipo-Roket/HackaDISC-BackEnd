<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $companyIDS = Multicompany::all(['main_company_id', 'main_company_name'])->toArray();
        $company = fake()->randomElement($companyIDS);
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 1000000),
            'user_name' => $this->faker->name,
            'role' =>  $this->faker->jobTitle,
            'company_id' => $company['main_company_id'],
            'company_name' => $company['main_company_name'],
            'area_id' => $this->faker->unique()->numberBetween(1, 1000000),
            'area_name' =>  $this->faker->randomElement(['ACIDIFICACION', 'ADMINISTRACIÓN', 'Almacenes','Logistica','LABORATORIO']),
            'post_name' => $this->faker->randomElement(['SUPERVISOR ELECTRICO', 'M-1 ELECTRICO', 'LIDER MECANICO','M1 ELECTRICO','Operador Multiple']),
            'post_id' => $this->faker->unique()->numberBetween(1, 1000000),
        ];
    }
}
