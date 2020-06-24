<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdsInfoToCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->integer('price_for_special_ads')->default(0);
            $table->integer('number_of_days_for_special_ads')->default(0);
            $table->integer('price_for_bump_up_ads')->default(0);
            $table->integer('number_of_days_for_bump_up_ads')->default(0);
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
