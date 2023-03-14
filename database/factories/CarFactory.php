<?php

namespace Database\Factories;

use App\Models\CarStatus;
use Database\Seeders\CarStatusSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => fake()->bothify('?###??'),
            'mileage'=> fake()->randomNumber(5, true),
            'year_of_release'=> fake()->year(),
            'car_statuses_id'=>rand(1, CarStatus::count()),
            'car_model_id'=>rand(1, CarStatus::count()),
        ];
    }
}
