<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',100);
            $table->string('middle_name')->nullable();
            $table->string('last_name',100);
            $table->boolean('marital_status');
            $table->string('account_number',50);
            $table->date('DOB');
            $table->date('licence_expiry');
            $table->boolean('gender');
            $table->string('phone_number',20);
            $table->string('profile_photo')->nullable();
            $table->date('begin_date');
            $table->date('end_date')->nullable();
            $table->integer('basic_salary');
            $table->string('status');
            $table->string('comment')->nullable();
            $table->integer('department_id')->nullable()->unsigned();
            $table->integer('company_id')->nullable()->unsigned();
            $table->integer('nationality_id')->nullable()->unsigned();
            $table->integer('bank_id')->nullable()->unsigned();
            $table->integer('workStation_id')->nullable()->unsigned();
           
            $table->integer('designation_id')->nullable()->unsigned();
            $table->timestamps();

            $table->integer('user_id')->nullable()->unsigned();

          
        });

        Schema::table('employees', function(Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('company_id')->references('id')->on('companies');
           
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->foreign('workStation_id')->references('id')->on('work_stations');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
