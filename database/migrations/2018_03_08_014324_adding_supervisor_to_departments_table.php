<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingSupervisorToDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function($table)
        {
          
            $table->integer('supervisor_id')->nullable();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function($table) {
            $table->dropColumn('supervisor_id');
            
            
            

         
        });
    }
}
