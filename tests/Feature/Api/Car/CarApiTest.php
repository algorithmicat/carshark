<?php

namespace Tests\Feature\Api\Car;

use App\Models\Car;
use Database\Seeders\CarStatusSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarApiTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_index()
    {     
        $this->seed();
        $this->seed(CarStatusSeeder::class);
        $cars = Car::factory()->count(4)->create();

        $response = $this->json('get', '/api/cars');

        $response->assertStatus(200);

        dump($response->json());
    }
}
