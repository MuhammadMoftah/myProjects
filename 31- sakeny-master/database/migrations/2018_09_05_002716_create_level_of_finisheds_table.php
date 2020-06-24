<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelOfFinishedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_of_finisheds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->boolean('activation')->default(1);
            $table->timestamps();
        });
        Schema::table('ads', function($table) {
            $table->integer('level_of_finished_id')->unsigned()->nullable();
            $table->foreign('level_of_finished_id')->references('id')->on('level_of_finisheds')
                    ->onUpdate('set null')->onDelete('set null');
            $table->integer('amenitie_id')->unsigned()->nullable();
            $table->foreign('amenitie_id')->references('id')->on('amenities')
                    ->onUpdate('set null')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_of_finisheds');
    }
}
