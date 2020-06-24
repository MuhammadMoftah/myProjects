<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsEditHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_edit_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('sale_rent');  // 1 => sale & 2 => rent
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('size')->nullable();
            $table->integer('type')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('price_negotiable')->default(0); // 1 => yes & 0 => no
            $table->integer('bedrooms_num')->nullable();
            $table->integer('bathrooms_num')->nullable();
            $table->string('finishing_level')->nullable();
            $table->integer('unit_view')->nullable();
            $table->integer('building_year')->nullable();
            $table->longText('description')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->integer('status')->default(0);
            $table->date('expire_date');
            $table->integer('views');
            $table->string('able_call');
            $table->string('able_email');
            $table->string('able_chat');
            $table->integer('level_of_finished_id')->unsigned()->nullable();
            $table->foreign('level_of_finished_id')->references('id')->on('level_of_finisheds')
                    ->onUpdate('set null')->onDelete('set null');
            $table->integer('offer_type_id')->unsigned()->nullable();
            $table->foreign('offer_type_id')->references('id')->on('offer_types')
                    ->onUpdate('set null')->onDelete('set null');

            $table->integer('property_type_id')->unsigned()->nullable();
            $table->integer('offer_type_id')->unsigned()->nullable();
            $table->integer('unit_view_id')->unsigned()->nullable();
            $table->string('video')->nullable();
            $table->text('amenitie_id');
            $table->dateTime('is_premium');
            $table->integer('ad_id')->unsigned()->nullable();
            $table->foreign('ad_id')->references('id')->on('ads')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_edit_histories');
    }
}
