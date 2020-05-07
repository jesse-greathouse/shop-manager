<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Mechanic,
    App\MechanicSpecialty,
    App\JobType;

$factory->define(Mechanic::class, function (Faker $faker) {
    return [
        'first_name'    => $faker->firstName,
        'last_name'     => $faker->lastName,
    ];
});

// After creating a mechanic, give them a specialty.
$factory->afterCreating(Mechanic::class, function ($mechanic, $faker) {
    $mechanic->specialties()->save(factory(MechanicSpecialty::class)->make());
});

