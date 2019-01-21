<?php

use Illuminate\Database\Seeder;

class SalaryScaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SalaryScale::class, 150)->create();
    }
}
