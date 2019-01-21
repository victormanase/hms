<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable()->unsigned();
            $table->integer('employee_id')->nullable()->unsigned();
            $table->string('name');
           // $table->string('description');
            $table->integer('amount');
            $table->integer('rate');
            $table->integer('paid')->nullable();
            $table->integer('balance');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('loans');
    }
}
