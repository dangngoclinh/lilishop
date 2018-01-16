<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

class CreateNewsCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news_category', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->string('title')->nullable();
			$table->text('keywords')->nullable();
			$table->text('description')->nullable();

			$table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('CASCADE');

            NestedSet::columns($table);
            $table->timestamps();
		});

        Schema::create('news_categories', function(Blueprint $table)
        {
            $table->integer('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('CASCADE');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('news_category')->onDelete('CASCADE');
            $table->primary(['news_id','category_id']);
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news_category');
		Schema::drop('news_categories');
	}

}
