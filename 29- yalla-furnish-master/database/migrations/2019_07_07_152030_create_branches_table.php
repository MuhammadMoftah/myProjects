<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_ar', 255)->nullable();
            $table->string('address_en', 255)->nullable();
            $table->string('working_to', 255)->nullable();
            $table->string('working_from', 255)->nullable();
            $table->string('mob1', 255)->nullable();
            $table->string('mob2', 255)->nullable();
            $table->string('tel1', 255)->nullable();
            $table->string('tel2', 255)->nullable();
            $table->string('tel3', 255)->nullable();
            $table->float('lat', 255)->nullable();
            $table->float('lang', 255)->nullable();
            $table->unsignedBigInteger('showroom_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('showroom_id')
                ->references('id')->on('showrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
