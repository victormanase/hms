<?php

use Illuminate\Database\Seeder;

class WorkStationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WorkStation::class, 150)->create();
    }
}
