<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product_unit', function (Blueprint $table) {
            $table->integer('product_size_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('table_product_unit', function (Blueprint $table) {
            $table->foreign('product_size_id')->references('id')->on('table_product_size')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('table_product_color')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_product_unit');
    }
}
