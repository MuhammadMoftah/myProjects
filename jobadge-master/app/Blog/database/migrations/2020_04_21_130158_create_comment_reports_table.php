<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("comment_id");
            $table->foreign('comment_id')
                    ->references('id')->on('comments')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->text("body");
            $table->morphs('comment_report');
            $table->boolean("is_seen")->default(false);
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
        Schema::dropIfExists('comment_reports');
    }
}
