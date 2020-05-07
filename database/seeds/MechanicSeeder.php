<?php

use Illuminate\Database\Seeder;

class MechanicSeeder extends Seeder
{

    const SEED_COUNT = 10;

    /**
     * @return void
     */
    public function run(): void
    {
        $mechanics = factory(App\Mechanic::class, self::SEED_COUNT)->create();
    }
}
