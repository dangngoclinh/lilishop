<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsColorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_colors', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name')->nullable();

			$table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');

			$table->integer('image_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('CASCADE');
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
		Schema::drop('products_colors');
	}

}
