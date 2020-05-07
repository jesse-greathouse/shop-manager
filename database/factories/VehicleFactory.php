<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\Vehicle;

$factory->define(Vehicle::class, function (Faker $faker) use ($factory) {

    // Table of vehicle makes, models and years
    $vehicles = [
        'Ford' => [
            'Fiesta' => [
                'start_year' => 1976,
                'end_year'   => 2017,
            ],
            'Focus' => [
                'start_year' => 1998,
                'end_year'   => 2018,
            ],
            'Mustang' => [
                'start_year' => 1964,
                'end_year'   => 2020,
            ],
            'Raptor' => [
                'start_year' => 1981,
                'end_year'   => 2020,
            ],
            'F150' => [
                'start_year' => 1948,
                'end_year'   => 2020,
            ],
            'Explorer' => [
                'start_year' => 1990,
                'end_year'   => 2020,
            ],
            'Expedition' => [
                'start_year' => 1996,
                'end_year'   => 2020,
            ],
        ],
        'Cherolet' => [
            'Spark' => [
                'start_year' => 2009,
                'end_year'   => 2015,
            ],
            'Malibu' => [
                'start_year' => 1964,
                'end_year'   => 2015,
            ],
            'Impala' => [
                'start_year' => 1957,
                'end_year'   => 2013,
            ],
            'Camaro' => [
                'start_year' => 1966,
                'end_year'   => 2018,
            ],
            'Corvette' => [
                'start_year' => 1953,
                'end_year'   => 2020,
            ],
            'Tahoe' => [
                'start_year' => 1995,
                'end_year'   => 2020,
            ],
            'Suburban' => [
                'start_year' => 1935,
                'end_year'   => 2020,
            ],
        ],
        'Toyota' => [
            'Camry' => [
                'start_year' => 1980,
                'end_year'   => 2020,
            ],
            'Supra' => [
                'start_year' => 1978,
                'end_year'   => 2019,
            ],
            'FJ Cruiser' => [
                'start_year' => 2009,
                'end_year'   => 2010,
            ],
            'Land Cruiser' => [
                'start_year' => 1954,
                'end_year'   => 2015,
            ],
            'Corolla' => [
                'start_year' => 1966,
                'end_year'   => 2020,
            ],
            'Prius' => [
                'start_year' => 1997,
                'end_year'   => 2020,
            ],
            'Yaris' => [
                'start_year' => 1999,
                'end_year'   => 2020,
            ],
        ],
        'Honda' => [
            'Accord' => [
                'start_year' => 1976,
                'end_year'   => 2020,
            ],
            'Civic' => [
                'start_year' => 1972,
                'end_year'   => 2020,
            ],
            'CR-V' => [
                'start_year' => 1996,
                'end_year'   => 2020,
            ],
            'Insight' => [
                'start_year' => 1999,
                'end_year'   => 2020,
            ],
            'Passport' => [
                'start_year' => 1993,
                'end_year'   => 2020,
            ],
            'Pilot' => [
                'start_year' => 2003,
                'end_year'   => 2020,
            ],
            'Ridgeline' => [
                'start_year' => 2006,
                'end_year'   => 2020,
            ],
        ],
        'Chrystler' => [
            '300' => [
                'start_year' => 2004,
                'end_year'   => 2020,
            ],
            'Pacifica' => [
                'start_year' => 2017,
                'end_year'   => 2020,
            ],
            'Voyager' => [
                'start_year' => 1988,
                'end_year'   => 2020,
            ],
            '200' => [
                'start_year' => 2011,
                'end_year'   => 2017,
            ],
            'Aspen' => [
                'start_year' => 2007,
                'end_year'   => 2009,
            ],
            'LeBaron' => [
                'start_year' => 1977,
                'end_year'   => 1995,
            ],
            'New Yorker' => [
                'start_year' => 1939,
                'end_year'   => 1996,
            ],
        ],
        'Nissan' => [
            'Pulsar' => [
                'start_year' => 1978,
                'end_year'   => 2020,
            ],
            'Maxima' => [
                'start_year' => 1981,
                'end_year'   => 2020,
            ],
            'Sentra' => [
                'start_year' => 1982,
                'end_year'   => 2020,
            ],
            'Pathfinder' => [
                'start_year' => 1985,
                'end_year'   => 2020,
            ],
            'Titan' => [
                'start_year' => 2004,
                'end_year'   => 2020,
            ],
            'Rogue' => [
                'start_year' => 2007,
                'end_year'   => 2020,
            ],
            'Versa' => [
                'start_year' => 2007,
                'end_year'   => 2020,
            ],
        ],
        'Volkswagen' => [
            'Golf' => [
                'start_year' => 1974,
                'end_year'   => 2020,
            ],
            'Jetta' => [
                'start_year' => 1979,
                'end_year'   => 2020,
            ],
            'Passat' => [
                'start_year' => 1973,
                'end_year'   => 2020,
            ],
            'Touareg' => [
                'start_year' => 2010,
                'end_year'   => 2020,
            ],
            'Tiguan' => [
                'start_year' => 2009,
                'end_year'   => 2020,
            ],
            'Beetle' => [
                'start_year' => 2938,
                'end_year'   => 2020,
            ],
            'Atlas' => [
                'start_year' => 2017,
                'end_year'   => 2020,
            ],
        ],
        'BMW' => [
            '5 Series' => [
                'start_year' => 2010,
                'end_year'   => 2017,
            ],
            'X3' => [
                'start_year' => 2011,
                'end_year'   => 2017,
            ],
            '3 Series' => [
                'start_year' => 2011,
                'end_year'   => 2020,
            ],
            '4 Series' => [
                'start_year' => 2013,
                'end_year'   => 2020,
            ],
            '2 Series' => [
                'start_year' => 2013,
                'end_year'   => 2020,
            ],
            'X5' => [
                'start_year' => 2013,
                'end_year'   => 2018,
            ],
            'Z4' => [
                'start_year' => 2018,
                'end_year'   => 2020,
            ],
        ],
        'Volvo' => [
            'V60' => [
                'start_year' => 2010,
                'end_year'   => 2018,
            ],
            'V40' => [
                'start_year' => 2012,
                'end_year'   => 2020,
            ],
            'XC90' => [
                'start_year' => 2014,
                'end_year'   => 2020,
            ],
            'V90' => [
                'start_year' => 2016,
                'end_year'   => 2020,
            ],
            'XC60' => [
                'start_year' => 2017,
                'end_year'   => 2020,
            ],
            'XC40' => [
                'start_year' => 2017,
                'end_year'   => 2020,
            ],
        ],
        'Audi' => [
            'A4' => [
                'start_year' => 1994,
                'end_year'   => 2020,
            ],
            'A6' => [
                'start_year' => 2006,
                'end_year'   => 2020,
            ],
            'TT' => [
                'start_year' => 1998,
                'end_year'   => 2020,
            ],
            'Q2' => [
                'start_year' => 2017,
                'end_year'   => 2020,
            ],
            'Q3' => [
                'start_year' => 2011,
                'end_year'   => 2020,
            ],
            'Q5' => [
                'start_year' => 2008,
                'end_year'   => 2020,
            ],
            'Q7' => [
                'start_year' => 2005,
                'end_year'   => 2020,
            ],
        ],
        'Hyundai' => [
            'Accent' => [
                'start_year' => 2006,
                'end_year'   => 2020,
            ],
            'Kona' => [
                'start_year' => 2016,
                'end_year'   => 2020,
            ],
            'Santa Fe' => [
                'start_year' => 2009,
                'end_year'   => 2020,
            ],
            'Tucson' => [
                'start_year' => 2011,
                'end_year'   => 2020,
            ],
            'Sonta' => [
                'start_year' => 2006,
                'end_year'   => 2020,
            ],
            'Veloster' => [
                'start_year' => 2013,
                'end_year'   => 2020,
            ],
            'Genesis' => [
                'start_year' => 2006,
                'end_year'   => 2019,
            ],
        ],
        'Kia' => [
            'Soul' => [
                'start_year' => 2003,
                'end_year'   => 2020,
            ],
            'Spoertage' => [
                'start_year' => 2004,
                'end_year'   => 2017,
            ],
            'Sorento' => [
                'start_year' => 2001,
                'end_year'   => 2020,
            ],
            'K4' => [
                'start_year' => 2004,
                'end_year'   => 2020,
            ],
            'Optima' => [
                'start_year' => 2006,
                'end_year'   => 2020,
            ],
            'Stinger' => [
                'start_year' => 2014,
                'end_year'   => 2019,
            ],
            'Rio' => [
                'start_year' => 1999,
                'end_year'   => 2020,
            ],
        ],
        'Dodge' => [
            'Intrepid' => [
                'start_year' => 1993,
                'end_year'   => 2004,
            ],
            'Avenger' => [
                'start_year' => 1995,
                'end_year'   => 2014,
            ],
            'Charger' => [
                'start_year' => 1996,
                'end_year'   => 2020,
            ],
            'Challenger' => [
                'start_year' => 1970,
                'end_year'   => 2020,
            ],
            'Ram' => [
                'start_year' => 1989,
                'end_year'   => 2009,
            ],
            'Durango' => [
                'start_year' => 1998,
                'end_year'   => 2009,
            ],
            'Caravan' => [
                'start_year' => 1984,
                'end_year'   => 2020,
            ],
        ]
    ];

    $makes = array_keys($vehicles);
    $randMake = rand(0, (count($makes) - 1));
    $make = $makes[$randMake];

    $models = array_keys($vehicles[$make]);
    $randModel = rand(0, (count($models) - 1));
    $model = $models[$randModel];

    $year = rand($vehicles[$make][$model]['start_year'], $vehicles[$make][$model]['end_year']);

    return [
        'make'          => $make,
        'model'         => $model,
        'year'          => $year,
        'notes'         => $faker->colorName,
        'customer_id'   => $factory->create(App\Customer::class)->id,
    ];
});