<?php
 
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Customer;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'first_name'    => $faker->firstName,
        'last_name'     => $faker->lastName,
        'address'       => $faker->address,
        'phone_number'  => $faker->phoneNumber,
        'email'         => $faker->email,
    ];
});