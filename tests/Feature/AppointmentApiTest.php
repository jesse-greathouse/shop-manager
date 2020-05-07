<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Appointment;

class AppointmentApiTest extends TestCase
{
    /**
     * get /api/appointment
     *
     * @return void
     */
    public function testGetAppointment()
    {
        $response = $this->getJson('/api/appointment');

        $response->assertStatus(200);
    }

    /**
     * post /api/appointment
     *
     * @return void
     */
    public function testPostAppointment()
    {
        $appointment = factory(Appointment::class)->make();
        $specialty = $appointment->mechanic->specialties()->first()->job_type;

        $response = $this->json('POST', '/api/appointment', [
            'drop_off' => $appointment->drop_off,
            'pick_up' => $appointment->pick_up, 
            'appointment_job_type' => $specialty,
            'mechanic_id' => $appointment->mechanic->id,
            'vehicle_id' => $appointment->vehicle->id
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
     * get /api/appointment/{id}
     *
     * @return void
     */
    public function testGetAppointmentById()
    {
        $appointment = factory(Appointment::class)->create();
        $response = $this->getJson('/api/appointment/'.$appointment->id);

        $response->assertStatus(200);
    }

    /**
     * put /api/appointment/{id}
     *
     * @return void
     */
    public function testPutAppointmentById()
    {
        $appointment = factory(Appointment::class)->create();

        $response = $this->json('PUT', '/api/appointment/'.$appointment->id, [
            'drop_off' => $appointment->drop_off,
            'pick_up' => $appointment->pick_up, 
            'appointment_job_type' => $appointment->appointment_job_type,
            'mechanic_id' => $appointment->mechanic->id,
            'vehicle_id' => $appointment->vehicle->id
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
     * delete /api/appointment/{id}
     *
     * @return void
     */
    public function testDeleteAppointmentById()
    {
        $appointment = factory(Appointment::class)->create();

        $response = $this->json('DELETE', '/api/appointment/'.$appointment->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'message',
                ]
            ]);
    }

}
