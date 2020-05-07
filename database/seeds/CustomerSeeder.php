<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    const SEED_COUNT = 50;

    /**
     * @return void
     */
    public function run(): void
    {
        $customers = factory(App\Customer::class, self::SEED_COUNT)
            ->create()
            ->each(function ($customer) {
                $randVehicles = rand(1, 3);
                $customer->vehicles()->createMany(
                    factory(App\Vehicle::class, $randVehicles)->make()->toArray()
                );
            });
    }
}
