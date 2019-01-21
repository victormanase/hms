<?php

use Faker\Generator as Faker;

$factory->define(App\District::class, function (Faker $faker) {
    return [
        'district_name'=>$faker->city,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'region_id'=>$faker->numberBetween($min = 1, $max = 500),

    ];
});
