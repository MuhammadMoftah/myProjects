<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesUrlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules_urls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_id')->unsigned();
			$table->foreign('module_id')->references('id')->on('modules')->onUpdate('CASCADE')->onDelete('CASCADE');

			$table->integer('url_id')->unsigned();
			$table->foreign('url_id')->references('id')->on('protected_urls')->onUpdate('CASCADE')->onDelete('CASCADE');
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
		Schema::drop('modules_urls');
	}

}
