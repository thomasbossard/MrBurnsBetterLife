<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('label', ['manager', 'tenant', 'groundkeeper']);
        });
        
        DB::table('user_types')->insert([
            ['id' => 1, 'label' => "manager"],
            ['id' => 2, 'label' => "tenant"],
            ['id' => 3, 'label' => "groundkeeper"]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_types');
    }
}
