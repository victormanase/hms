<?php

use Faker\Generator as Faker;

$factory->define(App\LeftEmployee::class, function (Faker $faker) {
    return [
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'left_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'employee_id'=>$faker->unique()->numberBetween($min = 1, $max = 70),
    ];
});
