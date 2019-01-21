<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district_name');
            $table->integer('region_id')->nullable()->unsigned();
            $table->integer('company_id')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('districts', function(Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('districts');
    }
}
