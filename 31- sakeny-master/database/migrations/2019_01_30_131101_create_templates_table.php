<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title_ar');
            $table->string('title_en');

            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('offer_type_id')->unsigned()->nullable();
            $table->foreign('offer_type_id')->references('id')->on('offer_types')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('property_type_id')->unsigned()->nullable();
            $table->foreign('property_type_id')->references('id')->on('property_types')
                    ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('templates');
    }
}
