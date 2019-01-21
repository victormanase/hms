<?php

use Illuminate\Database\Seeder;

class EmployeeQualificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EmployeeQualification::class,200)->create();
    }
}
