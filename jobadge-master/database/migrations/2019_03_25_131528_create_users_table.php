<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('title')->nullable();
            $table->string('email', 191)->unique()->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('phone', 56)->unique()->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('google_id')->nullable();
            $table->integer('no_of_viewes')->default(0);
            $table->integer('no_of_shares')->default(0);
            $table->string('cv')->nullable();
            $table->string('video_cv')->nullable();
            $table->tinyInteger('verified')->default(0);
            $table->string('ref1_name')->nullable();
            $table->string('ref1_phone')->nullable();
            $table->string('ref1_title')->nullable();
            $table->string('ref2_name')->nullable();
            $table->string('ref2_phone')->nullable();
            $table->string('ref2_title')->nullable();
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
        Schema::dropIfExists('users');
    }
}
