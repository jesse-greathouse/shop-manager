<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{

    const SEED_COUNT = 50;

    /**
     * @return void
     */
    public function run(): void
    {
        $vehicles = factory(App\Appointment::class, self::SEED_COUNT)->create();
    }
}
