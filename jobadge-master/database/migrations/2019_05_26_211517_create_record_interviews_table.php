<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_interviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userjob_id');
            $table->foreign('userjob_id')->references('id')->on('user_jobs');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->string('channel_name');
            $table->string('question1')->nullable();
            $table->string('question2')->nullable();
            $table->string('question3')->nullable();
            $table->string('user_video')->nullable();
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
        Schema::dropIfExists('record_interviews');
    }
}
