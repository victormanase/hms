<?php

use Faker\Generator as Faker;

$factory->define(App\Bank::class, function (Faker $faker) {
    return [
        'bank_name'=>$faker->company,
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
    ];
});
