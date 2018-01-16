<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_unit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->unique()->nullable();
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('product_size_id')->unsigned();
            $table->foreign('product_size_id')->references('id')->on('products_sizes')->onDelete('cascade');
            $table->integer('product_color_id')->unsigned();
            $table->foreign('product_color_id')->references('id')->on('products_colors')->onDelete('cascade');

            $table->tinyInteger('quantity')->unsigned()->default(0);
            $table->integer('price')->unsigned()->default(0);

            $table->integer('discount_id')->unsigned()->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');

            $table->integer('discount_price')->unsigned()->nullable();
            $table->tinyInteger('discount_percentage')->unsigned()->nullable();
            $table->date('discount_end')->nullable();
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
        Schema::dropIfExists('products_unit');
    }
}
