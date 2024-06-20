<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Multicompany;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roleIDS = Role::pluck('id')->toArray();
        $companyIDS = Multicompany::pluck('id')->toArray();
        $areaIDS = Area::pluck('id')->toArray();
        return [
            'user_name' => $this->faker->name,
            'role_id' => $this->faker->randomElement($roleIDS),
            'email' => $this->faker->unique()->safeEmail,
            'company_id' => fake()->randomElement($companyIDS),
            'area_id' => fake()->randomElement($areaIDS),
            'post_id' => $this->faker->unique()->numberBetween(1, 1000000),
            'password' => Hash::make('123'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
