<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        //
        'first_name'=>$faker->firstNameMale,
        'last_name'=>$faker->lastName,
        'marital_status'=>$faker->boolean ,
        'account_number'=>$faker->creditCardNumber ,
        'DOB'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'licence_expiry'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'gender'=>$faker->boolean,
        'phone_number'=>$faker->e164PhoneNumber,
        'begin_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'end_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'basic_salary'=>$faker->numberBetween($min = 1000, $max = 9000),
        'department_id'=>$faker->numberBetween($min = 1, $max = 200),
        'company_id'=>$faker->numberBetween($min = 1, $max = 10),
        'nationality_id'=>$faker->numberBetween($min = 1, $max = 200),
        'designation_id'=>$faker->numberBetween($min = 1, $max = 150),
        'workStation_id'=>$faker->numberBetween($min = 1, $max = 150),
        'bank_id'=>$faker->numberBetween($min = 1, $max = 10),
        'status'=>$faker->word,
        'comment'=>$faker->word,
        
        

    ];
});
