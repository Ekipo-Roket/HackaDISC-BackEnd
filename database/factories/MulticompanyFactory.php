<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Multicompany>
 */
class MulticompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'main_company_id' => $this->faker->unique()->numberBetween(1, 1000000),
            'sub_company_id' =>  $this->faker->unique()->numberBetween(1, 1000000),
            'main_company_name' => $this->faker->company,
            'sub_company_name' => $this->faker->company,
        ];
    }
}
