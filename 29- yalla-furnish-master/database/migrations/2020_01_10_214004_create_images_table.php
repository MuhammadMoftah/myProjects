<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('imageable_id ');
            // $table->string('imageable_type'); 
            $table->morphs('imageable');
            $table->string('path');
            $table->unsignedBigInteger('user_id'); 
            // $table->foreign('user_id')->references('id')->on('users'); 
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
        Schema::dropIfExists('images');
    }
}
