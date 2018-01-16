<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->string('SKU')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('CASCADE');

            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('CASCADE');

            $table->integer('quantity')->unsigned()->default(0);
            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('products_unit')->onDelete('CASCADE');
            $table->integer('price')->nullable();
            $table->integer('price_sale')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->integer('view')->unsigned()->default(1);
            $table->boolean('status')->default(0);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }

}
