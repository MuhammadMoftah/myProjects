<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("blog_id");
            $table->nullableMorphs('share');
            $table->string("type");
            $table->foreign('blog_id')
                    ->references('id')->on('blogs')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('blogs_shares');
    }
}
