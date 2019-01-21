<?php

use Faker\Generator as Faker;

$factory->define(App\LeaveType::class, function (Faker $faker) {
    return [
        'name'=>$faker->cityPrefix,
        'duration'=>$faker->numberBetween($min = 10, $max = 30),
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
    ];
});
