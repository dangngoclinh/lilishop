<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_product', function (Blueprint $table) {
/*            $table->dropColumn('id_list');
            $table->dropColumn('id_item');
            $table->dropColumn('id_cat');
            $table->dropColumn('id_hang');
            $table->dropColumn('id_size');
            $table->dropColumn('stt');
            $table->dropColumn('ngaytao');
            $table->dropColumn('ngaysua');
            $table->dropColumn('id_danhmuc');
            $table->dropColumn('tieubieu');
            $table->dropColumn('nhasanxuat');
            $table->dropColumn('id_nhasanxuat');
            $table->dropColumn('tenen');
            $table->dropColumn('motaen');
            $table->dropColumn('noidungen');
            $table->dropColumn('size');
            $table->dropColumn('mausac');
            $table->dropColumn('tag');
            $table->dropColumn('ngay');
            $table->dropColumn('chitiet');
            $table->dropColumn('chitieten');
            $table->dropColumn('luuyen');
            $table->dropColumn('lienhe');
            $table->dropColumn('lienheen');
            $table->dropColumn('tencn');
            $table->dropColumn('noidungcn');
            $table->dropColumn('motacn');
            $table->dropColumn('tenja');
            $table->dropColumn('noidungja');
            $table->dropColumn('motaja');
            $table->dropColumn('tenko');
            $table->dropColumn('noidungko');
            $table->dropColumn('motako');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_product', function (Blueprint $table) {
            //
        });
    }
}
