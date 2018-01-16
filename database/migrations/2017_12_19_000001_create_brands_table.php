<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('acronym')->unique()->nullable();
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->string('title')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('CASCADE');
            $table->date('founded_at')->nullable();
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
        Schema::drop('brands');
    }

}
