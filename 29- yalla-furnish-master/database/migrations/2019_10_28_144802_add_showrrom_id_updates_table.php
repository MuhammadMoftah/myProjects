<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShowrromIdUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_updates', function (Blueprint $table) {
            $table->unsignedBigInteger('showroom_id');
            $table->foreign('showroom_id')
                ->references('id')->on('showrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_updates', function (Blueprint $table) {
            //
        });
    }
}
