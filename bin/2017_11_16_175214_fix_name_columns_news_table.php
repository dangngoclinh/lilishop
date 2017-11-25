<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixNameColumnsNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_news', function (Blueprint $table) {
            $table->renameColumn('ten', 'name');
            $table->renameColumn('tenkhongdau', 'slug');
            $table->renameColumn('mota', 'excerpt');
            $table->renameColumn('noidung', 'content');
            $table->renameColumn('title', 'seo_title');
            $table->renameColumn('keywords', 'seo_keywords');
            $table->renameColumn('description', 'seo_description');
            $table->renameColumn('hienthi', 'show');
            $table->renameColumn('luotxem', 'view');
            $table->integer('user_id')->nullable();
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
