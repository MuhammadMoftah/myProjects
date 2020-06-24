<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfferTypeToAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('ads', 'offer_type_id')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->integer('offer_type_id')->unsigned()->nullable();
                $table->foreign('offer_type_id')->references('id')->on('offer_types')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
