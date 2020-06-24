<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_messages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('chat_room_id')->unsigned()->nullable();
            $table->foreign('chat_room_id')->references('id')->on('chat_rooms')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('sender_id')->unsigned()->nullable();
            $table->foreign('sender_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->text('message')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('seen')->default(0);
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
        Schema::dropIfExists('room_messages');
    }
}
