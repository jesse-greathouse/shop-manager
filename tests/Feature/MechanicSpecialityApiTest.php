<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Mechanic,
    App\JobType;

class MechanicSpecialtyApiTest extends TestCase
{
    /**
     * get /api/mechanicspeciality
     *
     * @return void
     */
    public function testGetMechanicSpeciality()
    {
        $response = $this->getJson('/api/mechanicspecialty');

        $response->assertStatus(200);
    }

    /**
     * post /api/mechanicspecialty
     *
     * @return void
     */
    public function testPostMechanicSpecialty()
    {
        $mechanic = factory(Mechanic::class)->create();
        $specialty = $mechanic->specialties()->first();
        $job_type = '';
        foreach(JobType::$types as $type) {
            if ($type !== $specialty->job_type) {
                $job_type = $type;
                break;
            }
        }

        $response = $this->json('POST', '/api/mechanicspecialty', [
            'job_type'      => $job_type,   
            'mechanic_id'   => $mechanic->id
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
     * get /api/mechanicspecialty/{id}
     *
     * @return void
     */
    public function testGetMechanicSpecialtyById()
    {
        $mechanic = factory(Mechanic::class)->create();
        $specialty = $mechanic->specialties()->first();
        $response = $this->getJson('/api/mechanicspecialty/'.$specialty->id);

        $response->assertStatus(200);
    }

    /**
     * put /api/mechanicspecialty/{id}
     *
     * @return void
     */
    public function testPutMechanicSpecialtyById()
    {
        $mechanic = factory(Mechanic::class)->create();
        $specialty = $mechanic->specialties()->first();
        $job_type = '';
        foreach(JobType::$types as $type) {
            if ($type !== $specialty->job_type) {
                $job_type = $type;
                break;
            }
        }

        $response = $this->json('PUT', '/api/mechanicspecialty/'.$specialty->id, [
            'job_type'      => $job_type,
            'mechanic_id'   => $mechanic->id
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
     * delete /api/mechanicspecialty/{id}
     *
     * @return void
     */
    public function testDeleteMechanicSpecialtyById()
    {
        $mechanic = factory(Mechanic::class)->create();
        $specialty = $mechanic->specialties()->first();

        $response = $this->json('DELETE', '/api/mechanicspecialty/'.$specialty->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'message',
                ]
            ]);
    }
}
