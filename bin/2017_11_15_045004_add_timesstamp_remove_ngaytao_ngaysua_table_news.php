<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimesstampRemoveNgaytaoNgaysuaTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_news', function (Blueprint $table) {
            $table->dropColumn('ngaytao');
            $table->dropColumn('ngaysua');
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
        Schema::table('table_news', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->integer('ngaytao')->unsigned();
            $table->integer('ngaysua')->unsigned();
        });
    }
}
