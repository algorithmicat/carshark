<?php

namespace Database\Factories;

use App\Models\Renter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operations>
 */
class OperationFactory extends Factory
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
            'sum' => fake()->randomFloat(2, 100, 1000),
            'renter_id'=>rand(1, Renter::count()),
        ];
    }
}
