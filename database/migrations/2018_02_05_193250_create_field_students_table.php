<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('comments')->nullable();
            $table->string('from');
            $table->string('image')->nullable();
            $table->boolean('gender');
            $table->string('phone_number')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->integer('department_id')->nullable()->unsigned();
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_students');
    }
}
