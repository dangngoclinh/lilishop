<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('table_role')->insert([
                                            [
                                                'name' => 'Super Administrator',
                                                'slug' => 'super_admin',
                                            ],
                                            [
                                                'name' => 'Administrator',
                                                'slug' => 'administrator',
                                            ],
                                            [
                                                'name' => 'Customer',
                                                'slug' => 'customer'
                                            ],
                                            [
                                                'name' => 'Store Manager',
                                                'slug' => 'store_manager'
                                            ],
                                            [
                                                'name' => 'Contributor',
                                                'slug' => 'contributor'
                                            ],
                                            [
                                                'name' => 'Editor',
                                                'slug' => 'editor'
                                            ],
                                            [
                                                'name' => 'Author',
                                                'slug' => 'author'
                                            ]
                                        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_role');
    }
}
