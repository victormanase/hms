<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('region_name');
            $table->integer('country_id')->nullable()->unsigned();
            $table->integer('company_id')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('regions', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('regions');
    }
}
