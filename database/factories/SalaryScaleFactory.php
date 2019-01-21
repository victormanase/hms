<?php

use Faker\Generator as Faker;

$factory->define(App\SalaryScale::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'amount'=>$faker->numberBetween($min = 1000, $max = 9000),
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
    ];
});
