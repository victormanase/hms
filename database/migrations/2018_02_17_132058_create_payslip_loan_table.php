<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayslipLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_slip_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payslip_id')->nullable()->unsigned();
            $table->integer('loan_id')->nullable()->unsigned();
            $table->float('loan_deduction');
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
        Schema::dropIfExists('pay_slip_loans');
    }
}
