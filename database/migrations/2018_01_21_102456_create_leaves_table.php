<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status');
            $table->integer('company_id')->nullable()->unsigned();
            $table->integer('employee_id')->nullable()->unsigned();
            $table->integer('leave_type_id')->nullable()->unsigned();

            $table->timestamps();
        });

        Schema::table('leaves', function (Blueprint $table) {
           
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
