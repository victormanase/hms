<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable()->unsigned();
            $table->integer('amount')->nullable();
            $table->timestamp('date')->nullable();

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
        Schema::dropIfExists('ptens');
    }
}
