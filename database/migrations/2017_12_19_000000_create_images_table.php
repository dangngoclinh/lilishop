<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description')->nullable();
			$table->string('file');
			$table->string('medium')->nullable();
			$table->string('small')->nullable();
			$table->integer('imageable_id')->unsigned()->nullable();
			$table->string('imageable_type')->nullable();
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
		Schema::drop('images');
	}

}
