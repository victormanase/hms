<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingColumnsToBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banks', function($table)
{
    $table->string('email')->nullable();
    $table->string('address')->nullable();
    $table->integer('bank_charges')->nullable();
    $table->mediumText('letter_to_bank')->nullable();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banks', function($table) {
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('bank_charges');
            $table->dropColumn('letter_to_bank');
            
            
            

         
        });
    }
}
