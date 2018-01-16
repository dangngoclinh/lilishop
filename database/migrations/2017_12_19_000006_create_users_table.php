<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('CASCADE');
            $table->string('avatar')->nullable();
            $table->timestamps();
        });

        Schema::create('social_accounts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');

            $table->string('provider_user_id');
            $table->string('provider');
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
        Schema::drop('users');
        Schema::drop('social_accounts');
    }

}
