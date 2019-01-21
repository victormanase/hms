<?php

use Faker\Generator as Faker;

$factory->define(App\Region::class, function (Faker $faker) {
    return [
        'region_name'=>$faker->state,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'country_id'=>$faker->numberBetween($min = 1, $max = 200),
    ];
});
