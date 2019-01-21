<?php

use Illuminate\Database\Seeder;

class InternTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Intern::class,100)->create();
    }
}
