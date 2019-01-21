<?php

use Illuminate\Database\Seeder;

class LeaveTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LeaveType::class, 30)->create();
    }
}
