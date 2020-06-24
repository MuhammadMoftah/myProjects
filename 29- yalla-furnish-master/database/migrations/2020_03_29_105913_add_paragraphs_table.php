<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraphs', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->string('title_en', 255);
            $table->string('title_ar', 255);
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('image')->nullable();
            $table->string('position')->nullable();
            $table->unsignedBigInteger('idea_id');
            $table->tinyInteger("active")->default(1);
            $table->foreign('idea_id')->references('id')->on('ideas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('ideas', function (Blueprint $table) {
            $table->dropColumn("desc_ar");
            $table->dropColumn("desc_en");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
