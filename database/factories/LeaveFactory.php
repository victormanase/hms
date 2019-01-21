<?php

use Faker\Generator as Faker;

$factory->define(App\Leave::class, function (Faker $faker) {
    return [
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'start_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'end_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'employee_id'=>$faker->numberBetween($min = 1, $max =500),
        'status'=>$faker->numberBetween($min = 1, $max = 3),
        'leave_type_id'=>$faker->numberBetween($min = 1, $max = 30),
    ];
});
