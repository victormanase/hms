<?php

use Illuminate\Database\Seeder;

class ScholarshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Scholarship::class, 150)->create();
    }
}
