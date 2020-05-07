<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Mechanic,
    App\MechanicSpecialty,
    App\JobType;

$factory->define(MechanicSpecialty::class, function (Faker $faker) {

    $rand = rand(0, (count(JobType::$types) - 1));

    return [
        'job_type'  => JobType::$types[$rand],
    ];
});