<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeIdTypeToImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_image', function (Blueprint $table) {
            $table->string('type', 100)->default('media');
            $table->integer('id_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_image', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('id_type');
        });
    }
}
