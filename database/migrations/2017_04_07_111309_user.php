<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    public function up()
    {
        Schema::create('users',function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('email');
            $table->string('first_name');
            $table->string('password');
            $table->rememberToken();
        });
    }
    public function down()
    {
        Schema::drop('users');
    }
}
