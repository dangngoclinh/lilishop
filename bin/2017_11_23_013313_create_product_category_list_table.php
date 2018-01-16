<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product_category_list', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('product_category_id')->unsigned();
        });

        Schema::table('table_product_category_list', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('table_product')->onDelete('cascade');
            $table->foreign('product_category_id')->references('id')->on('table_product_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_product_category_list');
    }
}
