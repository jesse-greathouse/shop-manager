<?php

use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    const SEED_COUNT = 100;

    /**
     * @return void
     */
    public function run(): void
    {
        $vehicles = factory(App\Vehicle::class, self::SEED_COUNT)->create();
    }
}
