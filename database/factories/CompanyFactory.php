<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        
        'name'=>$faker->company,
        'description'=>$faker->text($maxNbChars = 200),
        'email'=>$faker->companyEmail,
        'phone'=>$faker->e164PhoneNumber ,
        'fax'=>$faker->e164PhoneNumber ,    
        'postal_address'=>$faker->postcode,    
        'physical_address'=>$faker->streetAddress,
        'address1'=>$faker->streetAddress,
        'address2'=>$faker->streetAddress,
        'address3'=>$faker->streetAddress,
        'hq'=>$faker->state,
        'founded'=>$faker->numberBetween($min = 1990, $max = 2015),
        'website'=>$faker->domainName,
        'founder'=>$faker->firstNameMale,
        'industry_type'=>$faker->word,
        'total_employees'=>$faker->numberBetween($min = 500, $max = 1000),
        'mission'=>$faker->bs,
        'logo'=>$faker->ean13,
        'vision'=>$faker->catchPhrase,
        'value'=>$faker->bs
        
        

        
         
        
            

    ];
});
