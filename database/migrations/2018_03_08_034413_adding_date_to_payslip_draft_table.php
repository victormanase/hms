<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingDateToPayslipDraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draft_payslips', function($table)
        {
          
            $table->date('date');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('draft_payslips', function($table) {
            $table->dropColumn('date');
            
            
            

         
        });
    }
}
