<?php

use Faker\Generator as Faker;

$factory->define(App\FieldStudent::class, function (Faker $faker) {
    return [

        'first_name'=>$faker->firstNameMale,
        'middle_name'=>$faker->lastName,
        'last_name'=>$faker->lastName,
        'from'=>$faker->country,
        'department_id'=>$faker->numberBetween($min = 1, $max = 200),
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'end_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'start_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'comments'=>$faker->word,
        'gender'=>$faker->boolean,
        
    ];
});
