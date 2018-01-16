<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product_size', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('table_product_size', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('table_product')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('table_size')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_product_size');
    }
}
