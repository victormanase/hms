<?php

use Illuminate\Database\Seeder;

class FieldstudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FieldStudent::class,100)->create();
    }
}
