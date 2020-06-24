<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar',255)->nullable();
            $table->string('name_en',255)->nullable();
            $table->string('desc_ar',4000)->nullable();
            $table->string('desc_en',4000)->nullable();
            $table->string('idea_image',255)->nullable();
            $table->unsignedBigInteger('user_id');            
            $table->softDeletes();
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
        Schema::dropIfExists('ideas');
    }
}
