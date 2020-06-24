<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('jobtype_id');
            $table->foreign('jobtype_id')->references('id')->on('job_types');
            $table->unsignedBigInteger('joblevel_id');
            $table->foreign('joblevel_id')->references('id')->on('job_levels');
            $table->string('gender', 56);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->tinyInteger('experience_years');
            $table->string('education_level');
            $table->tinyInteger('vacancies');
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->text('description');
            $table->text('job_requirement');
            $table->text('KPI')->nullable();
            $table->text('benefits');
            $table->text('skills');
            $table->tinyInteger('apply_on_site')->default(0);
            $table->string('company_url')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('jobs');
    }
}
