<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowroomMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showroom_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message_body',1000)->nullable();
            $table->unsignedBigInteger('showroom_id');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('showroom_id')
            ->references('id')->on('showrooms');

            $table->foreign('user_id')
            ->references('id')->on('users');
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
        Schema::dropIfExists('showroom_messages');
    }
}
