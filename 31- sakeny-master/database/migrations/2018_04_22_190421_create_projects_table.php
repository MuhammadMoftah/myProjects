<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('address')->nullable();
            $table->longText('description_ar');
            $table->longText('description_en');
            $table->longText('developer_description_ar');
            $table->longText('developer_description_en');
            $table->longText('location'); // iframe
            $table->string('video')->nullable();
            $table->integer('developer_id')->unsigned()->nullable();
            $table->foreign('developer_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('projects');
    }
}
