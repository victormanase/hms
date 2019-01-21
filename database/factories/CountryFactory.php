<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {
    return [
        'country_name'=>$faker->country,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
    ];
});
