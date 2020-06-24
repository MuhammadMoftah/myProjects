<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en', 255);
            $table->string('name_ar', 255);
            $table->integer('price');
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('size');
            $table->integer('guarantee');
            $table->tinyInteger('approve')->default(0);
            $table->text('others')->nullable();

            $table->unsignedBigInteger('showroom_id');
            $table->foreign('showroom_id')->references('id')->on('showrooms');

            $table->unsignedBigInteger('style_id');
            $table->foreign('style_id')->references('id')->on('styles');

            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materials');

            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');

            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
