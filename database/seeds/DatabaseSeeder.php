<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            AppointmentSeeder::class,
            CustomerSeeder::class,
            MechanicSeeder::class,
            VehicleSeeder::class,
        ]);
    }
}