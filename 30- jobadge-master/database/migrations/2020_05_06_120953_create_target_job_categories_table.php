<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetJobCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_job_categories', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->unsignedBigInteger('target_job_id');
            $table->foreign('target_job_id')
                 ->references('id')->on('target_jobs')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');  
            
            $table->primary(['target_job_id', 'category_id']);        
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
        Schema::dropIfExists('target_job_categories');
    }
}
