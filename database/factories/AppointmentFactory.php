<?php
 
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\Appointment,
    App\JobType;

$factory->define(Appointment::class, function (Faker $faker) use ($factory) {

    $randType = rand(0, (count(JobType::$types) - 1));

    // Get a random dropoff DateTime from this month
    $dropOff = $faker->dateTimeThisMonth;

    // From the dropOff datetime add a randomized interval
    // Range between 5 minutes and 8 hours
    $pickUp = clone $dropOff;
    $randomSeconds = rand(300, 28800);
    $pickUp->add(\DateInterval::createFromDateString($randomSeconds.' seconds'));

    return [
        'drop_off'              => $dropOff->format('Y-m-d H:i'),
        'pick_up'               => $pickUp->format('Y-m-d H:i'),
        'appointment_job_type'  => JobType::$types[$randType],
        'mechanic_id'           => $factory->create(App\Mechanic::class)->id,
        'vehicle_id'            => $factory->create(App\Vehicle::class)->id,
    ];
});