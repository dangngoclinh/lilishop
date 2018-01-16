<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product_tag_list', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('product_tag_id')->unsigned();
        });

        Schema::table('table_product_tag_list', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('table_product')->onDelete('cascade');
            $table->foreign('product_tag_id')->references('id')->on('table_product_tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_product_tag_list');
    }
}
