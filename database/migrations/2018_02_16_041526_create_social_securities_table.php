<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_securities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('deduct_from');
            $table->integer('employer_share');
            $table->integer('employee_share');
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('social_securities');
    }
}
