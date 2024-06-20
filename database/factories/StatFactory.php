<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stat>
 */
class StatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $usedWorkerIds = [];
    public function definition(): array
    {
        $workerID = Worker::pluck('user_id')->toArray();
        $availableWorkerIDs = array_diff($workerID, static::$usedWorkerIds);
        $userId = fake()->randomElement($availableWorkerIDs);
        static::$usedWorkerIds[] = $userId;
        return [
            'user_id' => $userId,
            'stat' => 1,
        ];
    }
}
