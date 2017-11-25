<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product_color', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('name');
            $table->integer('image_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('table_product_color', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('table_product')->onDelete('cascade');
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
        Schema::dropIfExists('table_product_color');
    }
}
