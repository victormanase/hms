<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraftDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_deductions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('employee_id')->nullable()->unsigned();
            $table->integer('amount')->nullable();
            $table->integer('draft_payslip_id')->nullable()->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
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
        Schema::dropIfExists('draft_deductions');
    }
}
