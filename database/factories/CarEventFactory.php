<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarStatus;
use App\Models\Renter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class CarEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => fake()->date() . ' ' . fake()->time(),
            'latitude' => fake()->randomFloat(6, 1, 100),
            'langitude' => fake()->randomFloat(6, 1, 100),
            'fuel' => fake()->numberBetween(0, 55),
            'speed' => fake()->numberBetween(0, 200),
            'car_status_id'=>rand(1, CarStatus::count()),
            'car_id'=>rand(1, Car::count()),
            'renter_id'=>rand(1, Renter::count()),
        ];
    }
}
