<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function($table) {
            $table->boolean('in_registration');
            $table->integer('view_in_front')->default(0);
        });
        Schema::table('settings', function($table) {
            $table->integer('view_company_registration_page');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function($table) {
            $table->dropColumn('in_registration');
        });
        Schema::table('settings', function($table) {
            $table->dropColumn('view_company_registration_page');
        });
    }
}
