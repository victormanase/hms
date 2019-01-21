<?php

use Faker\Generator as Faker;

$factory->define(App\Qualification::class, function (Faker $faker) {
    return [
        'qualification_name'=>$faker->jobTitle,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        
    ];
});
