<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->longText("body");
            $table->string("image");
            $table->tinyInteger("priority")->default(1);
            $table->unsignedBigInteger("created_by");
            $table->foreign('created_by')->references('id')->on('admins');
            $table->boolean("active")->default(true);
            $table->unsignedBigInteger("views")->default(0);
            $table->unsignedBigInteger("shares")->default(0);
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
        Schema::dropIfExists('blogs');
    }
}
