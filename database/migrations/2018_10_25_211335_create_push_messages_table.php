<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pushmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->date('date');
            $table->string('subject');
            $table->unsignedInteger('rentableobject_id');
            $table->foreign('rentableobject_id')->references('id')->on('rentableobjects');
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
        Schema::dropIfExists('push_messages');
    }
}
