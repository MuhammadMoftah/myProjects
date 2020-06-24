<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditInShowroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('showrooms', function (Blueprint $table) {
            $table->string('yt', 255)->nullable()->change();
            $table->string('tw', 255)->nullable()->change();
            $table->string('fb', 255)->nullable()->change();
            $table->string('website', 255)->nullable()->change();
            $table->string('instgram', 255)->nullable()->change();
            $table->text('about', 4000)->nullable()->change();
            $table->float('rate')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
