<?php

namespace Tests\Feature\Api\CarStatus;

use Database\Seeders\CarStatusSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarStatusApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->seed(CarStatusSeeder::class);
        
        $response = $this->get('/api/car_statuses');

        $response->assertStatus(200);
    }
}
