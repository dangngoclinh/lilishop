<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixNullableNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_news', function (Blueprint $table) {
            $table->text('excerpt')->nullable()->change();
            $table->longText('content')->nullable()->change();
            $table->string('icon', 150)->nullable()->change();
            $table->string('seo_title', 500)->nullable()->change();
            $table->string('seo_keywords', 1000)->nullable()->change();
            $table->text('seo_description')->nullable()->change();
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
            //
        });
    }
}
