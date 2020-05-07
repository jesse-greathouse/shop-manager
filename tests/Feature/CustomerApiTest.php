<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Customer;

class CustomerApiTest extends TestCase
{
    /**
     * get /api/customer
     *
     * @return void
     */
    public function testGetCustomer()
    {
        $response = $this->getJson('/api/customer');

        $response->assertStatus(200);
    }

    /**
     * post /api/customer
     *
     * @return void
     */
    public function testPostCustomer()
    {
        $customer = factory(Customer::class)->make();

        $response = $this->json('POST', '/api/customer', [
            'first_name'    => $customer->first_name,
            'last_name'     => $customer->last_name, 
            'address'       => $customer->address,
            'phone_number'  => $customer->phone_number,
            'email'         => $customer->email
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
     * get /api/customer/{id}
     *
     * @return void
     */
    public function testGetCustomerById()
    {
        $customer = factory(Customer::class)->create();
        $response = $this->getJson('/api/customer/'.$customer->id);

        $response->assertStatus(200);
    }

    /**
     * put /api/customer/{id}
     *
     * @return void
     */
    public function testPutCustomerById()
    {
        $customer = factory(Customer::class)->create();

        $response = $this->json('PUT', '/api/customer/'.$customer->id, [
            'first_name'    => $customer->first_name,
            'last_name'     => $customer->last_name, 
            'address'       => $customer->address,
            'phone_number'  => $customer->phone_number,
            'email'         => $customer->email
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
     * delete /api/customer/{id}
     *
     * @return void
     */
    public function testDeleteCustomerById()
    {
        $customer = factory(Customer::class)->create();

        $response = $this->json('DELETE', '/api/customer/'.$customer->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'message',
                ]
            ]);
    }
}
