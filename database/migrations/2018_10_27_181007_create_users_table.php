<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('givenname')->default("");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->Integer('currentadditionalcosts')->default(0);
            $table->unsignedInteger('rentableobject_id')->nullable();
            $table->foreign('rentableobject_id')->references('id')->on('rentableobjects');
            $table->unsignedInteger('usertype_id')->default(2);
            $table->foreign('usertype_id')->references('id')->on('usertypes');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}