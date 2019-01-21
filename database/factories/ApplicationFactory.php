<?php

use Faker\Generator as Faker;

$factory->define(App\Application::class, function (Faker $faker) {
    return [
        'applicant_name'=>$faker->firstNameMale,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'vacancy_id'=>$faker->numberBetween($min = 1, $max = 200),
        'status'=>$faker->numberBetween($min = 1, $max = 5),
    ];
});
