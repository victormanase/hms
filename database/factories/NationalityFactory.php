<?php

use Faker\Generator as Faker;

$factory->define(App\Nationality::class, function (Faker $faker) {
    return [
        'nationality_name'=>$faker->country,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
    ];
});
