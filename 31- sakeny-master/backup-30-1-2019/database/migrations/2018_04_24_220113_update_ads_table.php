<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // photos && Amenities => multi
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn(['type', 'unit_view']);
            $table->integer('property_type_id')->unsigned()->nullable();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('set null');
            $table->integer('unit_view_id')->unsigned()->nullable();
            $table->foreign('unit_view_id')->references('id')->on('unit_views')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('ads', function (Blueprint $table) {
        });
    }
}
