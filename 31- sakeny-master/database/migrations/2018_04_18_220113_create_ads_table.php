<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // photos && Amenities => multi
        Schema::create('ads', function (Blueprint $table) {
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
            $table->integer('agent_id')->unsigned()->nullable();
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('owner_id')->unsigned()->nullable();
            $table->integer('is_selected')->default(0);
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('ads');
    }
}
