<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowroomReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showroom_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('showroom_id')->nullable();
            $table->foreign('showroom_id')->references('id')->on('showrooms');

            $table->text('review',1000)->nullable();
            $table->integer('rate');

            $table->integer('services')->nullable();
            $table->integer('sales')->nullable();
            $table->integer('prices')->nullable();
            $table->integer('qualities')->nullable();
            $table->integer('others')->nullable();
            


            $table->softDeletes();
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
        Schema::dropIfExists('showroom_reviews');
    }
}
