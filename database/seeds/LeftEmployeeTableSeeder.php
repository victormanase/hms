<?php

use Illuminate\Database\Seeder;

class LeftEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LeftEmployee::class, 70)->create();
    }
}
