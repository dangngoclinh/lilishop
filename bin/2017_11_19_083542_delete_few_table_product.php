<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFewTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('table_product_danhmuc');
        Schema::dropIfExists('table_product_cat');
        Schema::dropIfExists('table_product_hang');
        Schema::dropIfExists('table_product_item');
        Schema::dropIfExists('table_product_kichco');
        Schema::dropIfExists('table_product_list');
        Schema::dropIfExists('table_product_tag');
        Schema::dropIfExists('table_product_tags');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
