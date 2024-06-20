<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adaptability_to_change' => $this->faker->randomFloat(2, 0, 1), 
            'safe_conduct' =>  $this->faker->randomFloat(2, 0, 1),
            'dynamsim_energy' => $this->faker->randomFloat(2, 0, 1),
            'personal_effectiveness' => $this->faker->randomFloat(2, 0, 1),
            'initiative' => $this->faker->randomFloat(2, 0, 1),
            'working_under_pressure' => $this->faker->randomFloat(2, 0, 1),
            'date' =>$this->faker->date,
        ];
    }
}
