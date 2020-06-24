<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_follows', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id'); 
            // $table->unsignedBigInteger('pinned_id');
            // $table->foreign('pinned_id')->references('id')->on('users');
            $table->morphs('pinnable'); 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');  
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
        Schema::dropIfExists('chat_follows');
    }
}
