<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('applicant_name');
            $table->integer('vacancy_id')->nullable()->unsigned();
            $table->string('status')->nullable();
            $table->integer('company_id')->nullable()->unsigned();
            $table->timestamps();
        });



        Schema::table('applications', function(Blueprint $table) {
            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
