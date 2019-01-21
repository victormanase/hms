<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingDeprtmentIdToDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('designations', function($table) {
            $table->integer('department_id')->nullable()->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('designations', function($table) {
            $table->dropColumn('department_id');
         
        });
    }
}
