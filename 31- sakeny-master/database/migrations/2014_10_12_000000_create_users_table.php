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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('password')->nullable();
            $table->integer('activation');
            $table->integer('type');
            $table->string('image');
            $table->integer('gender')->nullable();
            $table->string('social_id')->nullable();
            $table->integer('social_type')->nullable();
            $table->string('reset_password_code')->nullable();
            $table->string('api_token')->unique();
            $table->string('android_token')->unique()->nullable();
            $table->string('ios_token')->unique()->nullable();
            $table->rememberToken();
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
