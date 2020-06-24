<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districtes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar', 255)->nullable();
            $table->string('name_en', 255)->nullable();
            $table->unsignedBigInteger('city_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('city_id')
                ->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('districtes', function (Blueprint $table) {
            //
        });
    }
}
