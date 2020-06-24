<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeCategoryAndIndustrayNullabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_jobs', function (Blueprint $table) {
            //
            $table->unsignedBigInteger("category_id")->nullable()->change();
            $table->unsignedBigInteger("industry_id")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_jobs', function (Blueprint $table) {
            //
            $table->unsignedBigInteger("category_id")->nullable(false)->change();
            $table->unsignedBigInteger("industry_id")->nullable(false)->change();
        });
    }
}
