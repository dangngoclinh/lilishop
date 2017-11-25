<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SKU')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('image_id')->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->integer('price_original')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_sale')->nullable();
            $table->string('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->tinyInteger('new')->default('0');
            $table->tinyInteger('top_selling')->default('0');
            $table->tinyInteger('highlight')->default('0');
            $table->integer('view')->unsigned()->default('1');
            $table->timestamps();
        });

        Schema::table('table_product', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('table_image')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_product');
    }
}
