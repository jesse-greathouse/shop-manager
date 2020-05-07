<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Vehicle;

class VehicleApiTest extends TestCase
{
    /**
     * get /api/vehicle
     *
     * @return void
     */
    public function testGetVehicle()
    {
        $response = $this->getJson('/api/vehicle');

        $response->assertStatus(200);
    }

    /**
     * post /api/vehicle
     *
     * @return void
     */
    public function testPostVehicle()
    {
        $vehicle = factory(Vehicle::class)->make();

        $response = $this->json('POST', '/api/vehicle', [
            'make'          => $vehicle->make,
            'model'         => $vehicle->model, 
            'year'          => $vehicle->year,
            'notes'         => $vehicle->notes,
            'customer_id'   => $vehicle->customer->id
            ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data',
                'meta' => [
                    'message',
                ]
            ]);
    }

    /**
     * get /api/vehicle/{id}
     *
     * @return void
     */
    public function testGetVehicleById()
    {
        $vehicle = factory(Vehicle::class)->create();
        $response = $this->getJson('/api/vehicle/'.$vehicle->id);

        $response->assertStatus(200);
    }

    /**
     * put /api/vehicle/{id}
     *
     * @return void
     */
    public function testPutVehicleById()
    {
        $vehicle = factory(Vehicle::class)->create();

        $response = $this->json('PUT', '/api/vehicle/'.$vehicle->id, [
            'make'          => $vehicle->make,
            'model'         => $vehicle->model, 
            'year'          => $vehicle->year,
            'notes'         => $vehicle->notes,
            'customer_id'   => $vehicle->customer->id
            ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'meta' => [
                    'message',
                ]
            ]);
    }

    /**
     * delete /api/vehicle/{id}
     *
     * @return void
     */
    public function testDeleteVehicleById()
    {
        $vehicle = factory(Vehicle::class)->create();

        $response = $this->json('DELETE', '/api/vehicle/'.$vehicle->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'message',
                ]
            ]);
    }
}
