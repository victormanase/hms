<?php

use Faker\Generator as Faker;

$factory->define(App\Vacancy::class, function (Faker $faker) {
    return [
        'position_name'=>$faker->jobTitle,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'number_of_positions'=>$faker->numberBetween($min = 1, $max = 10),
        'last_application_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
       
    ];
});
