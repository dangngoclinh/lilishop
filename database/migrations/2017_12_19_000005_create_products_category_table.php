<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

class CreateProductsCategoryTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->string('title')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();

            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('CASCADE');

            NestedSet::columns($table);
            $table->timestamps();
        });

        Schema::create('products_categories', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('CASCADE');

            $table->integer('product_category_id')->unsigned();
            $table->foreign('product_category_id')->references('id')->on('products_category')
                ->onDelete('CASCADE');

            $table->primary(['product_id', 'product_category_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        Schema::drop('products_category');
        Schema::drop('products_categories');
    }

}
