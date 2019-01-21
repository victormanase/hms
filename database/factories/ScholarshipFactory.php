<?php

use Faker\Generator as Faker;

$factory->define(App\Scholarship::class, function (Faker $faker) {
    return [
        'course'=>$faker->firstNameMale,
        'university'=>$faker->lastName,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'begin_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'end_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'employee_id'=>$faker->numberBetween($min = 1, $max = 500),
       
        
    ];
});
