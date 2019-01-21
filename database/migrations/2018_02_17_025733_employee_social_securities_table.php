<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeSocialSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_social_securities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('social_security_id')->nullable()->unsigned();
            $table->integer('employee_id')->nullable()->unsigned();
            $table->string('SSID')->nullable();
            $table->string('termination_letter')->nullable();
            $table->date('date_joined')->nullable();
            $table->date('date_terminated')->nullable();
            

         
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
        Schema::dropIfExists('employee_social_securities');
    }
}
