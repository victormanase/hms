<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->nullable()->unsigned();
            $table->integer('qualification_id')->nullable()->unsigned();
            $table->timestamps();
        });
        Schema::table('employee_qualifications', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('qualification_id')->references('id')->on('qualifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_qualifications');
    }
}
