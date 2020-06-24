<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function($table) {
            $table->dropColumn('contact_method');
            $table->string('able_call');
            $table->string('able_email');
            $table->string('able_chat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function($table) {
            $table->string('contact_method');
            $table->dropColumn('able_call');
            $table->dropColumn('able_email');
            $table->dropColumn('able_chat');
        });
    }
}
