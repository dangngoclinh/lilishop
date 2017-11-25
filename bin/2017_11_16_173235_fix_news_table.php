<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_news', function (Blueprint $table) {
            $table->dropColumn('tenen');
            $table->dropColumn('motaen');
            $table->dropColumn('noidungen');
            $table->dropColumn('tag');
            $table->dropColumn('tencn');
            $table->dropColumn('noidungcn');
            $table->dropColumn('motacn');
            $table->dropColumn('tenja');
            $table->dropColumn('noidungja');
            $table->dropColumn('motaja');
            $table->dropColumn('tenko');
            $table->dropColumn('noidungko');
            $table->dropColumn('motako');
            $table->dropColumn('id_danhmuc');
            $table->dropColumn('id_list');
            $table->dropColumn('id_cat');
            $table->dropColumn('id_item');
            $table->dropColumn('thumb2');
            $table->dropColumn('thumb');
            $table->dropColumn('photo');
            $table->dropColumn('noibat');
            $table->dropColumn('spmoi');
            $table->dropColumn('stt');
            $table->integer('image_id')->nullable();
            $table->integer('luotxem')->default(0)->change();
            $table->string('type', 100)->default('news')->change();
            $table->string('tenkhongdau', 150)->unique()->change();
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
