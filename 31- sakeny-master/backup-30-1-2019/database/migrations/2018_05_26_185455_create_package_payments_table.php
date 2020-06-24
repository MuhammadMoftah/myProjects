<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unsigned()->nullable();
            $table->foreign('package_id')->references('id')->on('packages')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->string('payment_gateway');
            $table->timestamps();
        });

        Schema::table('companies', function($table) {
            $table->integer('number_of_premium_ads');
            $table->integer('number_of_regular_ads');
            $table->integer('number_of_agents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_payments');

        Schema::table('users', function($table) {
            $table->dropColumn('number_of_premium_ads');
            $table->dropColumn('number_of_regular_ads');
            $table->dropColumn('number_of_agents');
        });
    }
}
