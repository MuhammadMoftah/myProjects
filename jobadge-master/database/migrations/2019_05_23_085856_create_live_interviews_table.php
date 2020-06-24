<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_interviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userjob_id');
            $table->foreign('userjob_id')->references('id')->on('user_jobs');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->string('channel_name');
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
        Schema::dropIfExists('live_interviews');
    }
}
