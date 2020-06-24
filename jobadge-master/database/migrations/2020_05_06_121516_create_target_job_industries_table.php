<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetJobIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_job_industries', function (Blueprint $table) {
              // $table->bigIncrements('id');
             $table->unsignedBigInteger('target_job_id');
             $table->foreign('target_job_id')
                  ->references('id')->on('target_jobs')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
              $table->unsignedBigInteger('industry_id');
              $table->foreign('industry_id')
                      ->references('id')->on('industries')
                      ->onDelete('cascade')
                      ->onUpdate('cascade');  
              
              $table->primary(['target_job_id', 'industry_id']);        
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
        Schema::dropIfExists('target_job_industries');
    }
}
