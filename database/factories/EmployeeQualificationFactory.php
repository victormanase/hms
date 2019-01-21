<?php

use Faker\Generator as Faker;

$factory->define(App\EmployeeQualification::class, function (Faker $faker) {
    return [
        'employee_id'=>$faker->unique()->numberBetween($min = 1, $max = 500),
        'qualification_id'=>$faker->unique()->numberBetween($min = 1, $max = 200)
    ];
});
