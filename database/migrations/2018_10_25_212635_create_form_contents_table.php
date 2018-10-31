<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formcontents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('givenname');
            $table->string('email');
            $table->string('subject');
            $table->string('text');
            $table->string('status')->default("");
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
        Schema::dropIfExists('form_contents');
    }
}
