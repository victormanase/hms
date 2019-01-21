<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('minIncome');
            $table->integer('maxIncome');
            $table->integer('rate');
            $table->integer('rangeCharge');
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
        Schema::dropIfExists('tax_tables');
    }
}
