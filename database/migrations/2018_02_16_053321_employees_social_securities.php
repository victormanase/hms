<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeesSocialSecurities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_social_security', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('social_security_id')->nullable()->unsigned();
            $table->integer('employee_id')->nullable()->unsigned();
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_social_security');    
    }
}
