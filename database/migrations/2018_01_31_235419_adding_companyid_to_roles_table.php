<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingCompanyidToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function($table) {
            $table->integer('company_id')->nullable()->unsigned();
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
        Schema::table('roles', function($table) {
            $table->dropColumn('company_id');
         
        });
    }
}
