<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->text('excerpt')->nullable();
			$table->text('content')->nullable();
			$table->string('icon')->nullable();

			$table->string('title')->nullable();
			$table->text('keywords')->nullable();
			$table->text('description')->nullable();

			$table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('CASCADE');

			$table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');

            $table->string('type')->default('news');
            $table->integer('view')->default(0);
            $table->boolean('status')->default(0);
            $table->dateTime('published_at')->nullable();
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
		Schema::drop('news');
	}

}
