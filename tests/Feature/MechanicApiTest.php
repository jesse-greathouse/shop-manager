<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Mechanic;

class MechanicApiTest extends TestCase
{

    /**
     * get /api/mechanic
     *
     * @return void
     */
    public function testGetMechanic()
    {
        $response = $this->getJson('/api/mechanic');

        $response->assertStatus(200);
    }

    /**
     * post /api/mechanic
     *
     * @return void
     */
    public function testPostMechanic()
    {
        $mechanic = factory(Mechanic::class)->make();

        $response = $this->json('POST', '/api/mechanic', [
            'first_name'    => $mechanic->first_name,
            'last_name'     => $mechanic->last_name,
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
     * get /api/mechanic/{id}
     *
     * @return void
     */
    public function testGetMechanicById()
    {
        $mechanic = factory(Mechanic::class)->create();
        $response = $this->getJson('/api/mechanic/'.$mechanic->id);

        $response->assertStatus(200);
    }

    /**
     * put /api/mechanic/{id}
     *
     * @return void
     */
    public function testPutMechanicById()
    {
        $mechanic = factory(Mechanic::class)->create();

        $response = $this->json('PUT', '/api/mechanic/'.$mechanic->id, [
            'first_name'    => $mechanic->first_name,
            'last_name'     => $mechanic->last_name,
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
     * delete /api/mechanic/{id}
     *
     * @return void
     */
    public function testDeleteMechanicById()
    {
        $mechanic = factory(Mechanic::class)->create();

        $response = $this->json('DELETE', '/api/mechanic/'.$mechanic->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'message',
                ]
            ]);
    }

}
