<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone',20);
            $table->string('fax',20)->nullable();
            $table->string('postal_address')->nullable();
            $table->string('physical_address');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('hq')->nullable();
            $table->integer('founded');
            $table->string('website')->nullable();
            $table->string('founder')->nullable();
            $table->string('industry_type')->nullable();
            $table->integer('total_employees')->nullable();
            $table->string('mission')->nullable();
            $table->string('logo')->nullable();
            $table->string('vision')->nullable();
            $table->string('value')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
