<?php

use Faker\Generator as Faker;

$factory->define(App\Designation::class, function (Faker $faker) {
    return [
        'designation_name'=>$faker->jobTitle,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'department_id'=>$faker->numberBetween($min = 1, $max = 200),
    ];
});
