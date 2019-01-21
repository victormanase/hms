<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_letters', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('letter');
            $table->integer('company_id')->nullable()->unsigned();
            $table->integer('bank_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('bank_id')->references('id')->on('banks');
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
        Schema::dropIfExists('bank_letters');
    }
}
