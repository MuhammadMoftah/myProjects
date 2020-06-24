<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesStructureTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // drop packages table
        Schema::dropIfExists('package_payments');

        // drop packages table
        Schema::dropIfExists('packages');

        // create durations table
        Schema::create('durations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('duration');
            $table->timestamps();
        });

        // create duration types table
        Schema::create('duration_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->integer('duration_id')->unsigned();
            $table->foreign('duration_id')->references('id')->on('durations')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        // create ad types table
        Schema::create('ad_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_of_special_ads');
            $table->string('no_of_repeated_ads');
            $table->string('no_of_normal_ads');
            $table->timestamps();
        });

        // create new packages table
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name_en');
            $table->string('name_ar');
            $table->tinyInteger('active')->default(1);
            $table->string('price');
            $table->text('description_en');
            $table->text('description_ar');

            $table->integer('duration_id')->unsigned();
            $table->foreign('duration_id')->references('id')->on('durations')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('duration_type_id')->unsigned();
            $table->foreign('duration_type_id')->references('id')->on('duration_types')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('ads_type_id')->unsigned();
            $table->foreign('ads_type_id')->references('id')->on('ad_types')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamp("start_date");
            $table->timestamp("end_date");
            $table->tinyInteger("active")->default(1);

            $table->string('no_of_special_ads');
            $table->string('no_of_repeated_ads');
            $table->string('no_of_normal_ads');

            $table->text("package");
            $table->timestamps();
            $table->softDeletes();
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
