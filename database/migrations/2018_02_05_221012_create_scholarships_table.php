<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('course');
            $table->string('agreement_letter')->nullable();
            $table->string('university');
            $table->integer('country_id')->nullable()->unsigned();
            $table->date('begin_date');
            $table->date('end_date')->nullable();
            $table->integer('employee_id')->nullable()->unsigned();
            $table->integer('company_id')->nullable()->unsigned();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}
