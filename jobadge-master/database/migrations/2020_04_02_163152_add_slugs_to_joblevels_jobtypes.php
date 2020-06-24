<?php

use App\JobLevel;
use App\JobType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugsToJoblevelsJobtypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_types', function (Blueprint $table) {
            $table->text('slug')->nullable();
        });

        Schema::table('job_levels', function (Blueprint $table) {
            $table->text('slug')->nullable();
        });

        $jobtypes = JobType::get();

        foreach ($jobtypes as $jobtype) {
            $jobtype->update(['slug' => str_slug(str_replace('/', ' ', $jobtype->name_en))]);
        }

        $jobLevels = JobLevel::get();

        foreach ($jobLevels as $joblevel) {
            $joblevel->update(['slug' => str_slug(str_replace('/', ' ', $joblevel->name_en))]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('joblevels_jobtypes', function (Blueprint $table) {
            //
        });
    }
}
