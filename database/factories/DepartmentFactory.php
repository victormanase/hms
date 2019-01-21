<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
        //
        'department_name'=>$faker->word,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
    ];
});
