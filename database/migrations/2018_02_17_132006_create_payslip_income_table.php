<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayslipIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_slip_incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payslip_id')->nullable()->unsigned();
            $table->string('name');
            $table->float('amount');
            $table->integer('company_id')->nullable()->unsigned();
            $table->integer('employee_id')->nullable()->unsigned();
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
        Schema::dropIfExists('pay_slip_incomes');
    }
}
