<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/api/cars');

        $response->assertStatus(200);
        // $response->dumpHeaders();

        // $response->assertJsonStructure([ //Утверждение о том, что ответ имеет переданную структуру JSON
        // 'data' => [
        //     '*' => [
        //         // 'number',
        //         // 'car_statuses_id',
        //         // 'car_model_id'
        //         ]
        //     ]
        // ]);
        // $response->assertOk();

        // $response->assertHasAll([
        //     'name',
        //     'email',
        // ]);
    }
}



        // $response = $this->postJson('/api/car_statuses', ['car_status' => 'Open']);

        // $response
        //     ->assertStatus(201)
        //     ->assertJson([
        //         'created' => true,
        //     ]);



        // $response->assertJson(fn (AssertableJson $json) =>
        // $json->has('data')
        //  ->missing('message')
// );
    // }


