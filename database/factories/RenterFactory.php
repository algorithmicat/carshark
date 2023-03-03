<?php

namespace Database\Factories;

use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Renters>
 */
class RenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'surname' => fake()->name(),
            'name'=> fake()->name(),
            'patronymic'=> fake()->name(),
            'age' => fake()->numberBetween(0, 100),
            'address' => fake()->word(),
            'passport_number' => fake()->numberBetween(1000,9999),
            'passport_series' => fake()->numberBetween(100000,999999),
            'latitude' => fake()->randomFloat(6, 1, 100),
            'langitude' => fake()->randomFloat(6, 1, 100),
            'balance' => fake()->randomFloat(2, 100, 10000),
            'user_statuses_id'=>rand(1, UserStatus::count()),
        ];
    }
}
