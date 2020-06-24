<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('showrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar', 255)->nullable();
            $table->string('name_en', 255)->nullable();
            $table->string('showroom_image', 255)->nullable();
            $table->string('showroom_coverImage', 255)->nullable();
            $table->string('yt', 255)->nullable();
            $table->string('tw', 255)->nullable();
            $table->string('fb', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('instgram', 255)->nullable();
            $table->string('about', 255)->nullable();
            $table->float('rate')->nullable();
            $table->unsignedBigInteger('active')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('district_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showrooms');
    }
}
