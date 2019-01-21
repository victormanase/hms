<?php

use Faker\Generator as Faker;

$factory->define(App\WorkStation::class, function (Faker $faker) {
    return [
        'name'=>$faker->city,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        
    ];
});
