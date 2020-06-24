<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectedUrlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('protected_urls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('action');
			$table->string('method');
			$table->string('element');
			$table->string('linked_to');
			$table->integer('module_id')->unsigned()->nullable();
			$table->foreign('module_id')->references('id')->on('modules')
			        ->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->boolean('status');
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
		Schema::drop('protected_urls');
	}

}
