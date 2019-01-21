<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeftEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('left_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->date('left_date')->nullable();
            $table->integer('employee_id')->nullable()->unsigned();
            $table->integer('company_id')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('left_employees', function (Blueprint $table) {
           
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('left_employees');
    }
}
