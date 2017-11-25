<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('description', 500)->nullable();
            $table->string('file', 200);
            $table->string('medium', 200)->nullable();
            $table->string('small', 200)->nullable();
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
        Schema::dropIfExists('table_image');
    }
}
