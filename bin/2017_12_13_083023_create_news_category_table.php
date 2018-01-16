<?php

use Kalnoy\Nestedset\NestedSet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->text('description')->nullable();
            $table->integer('image_id')->nullable()->unsigned();
            $table->foreign('image_id')->references('id')->on('images');
            NestedSet::columns($table);
            $table->timestamps();
        });

        Schema::create('news_categories', function (Blueprint $table) {
            $table->integer('news_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['news_id', 'category_id']);
            $table->foreign('news_id')->references('id')->on('news');
            $table->foreign('category_id')->references('id')->on('news_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_categories', function (Blueprint $table) {
            $table->dropForeign('news_categories_news_id_foreign');
            $table->dropForeign('news_categories_category_id_foreign');
        });
        Schema::table('news_category', function (Blueprint $table) {
            $table->dropForeign('news_category_image_id_foreign');
        });
        Schema::dropIfExists('news_categories');
        Schema::dropIfExists('news_category');
    }
}
