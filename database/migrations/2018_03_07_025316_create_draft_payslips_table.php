<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraftPayslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_payslips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->nullable()->unsigned();
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('draft_payslips');
    }
}
