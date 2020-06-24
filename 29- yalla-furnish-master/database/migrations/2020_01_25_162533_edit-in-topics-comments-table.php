<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditInTopicsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_comments', function (Blueprint $table) {
            $table->text('comment')->nullable()->change();
        });

        Schema::table('idea_comments', function (Blueprint $table) {
            $table->text('comment')->nullable()->change();
        });

        Schema::table('product_comments', function (Blueprint $table) {
            $table->text('comment')->nullable()->change();
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
