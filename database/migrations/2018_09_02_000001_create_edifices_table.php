<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdificesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edifices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nameEdifice',100);
            $table->string('addressEdifice', 100);
            $table->string('contactEdifice', 100);
            $table->string('emailEdifice', 100);
            $table->integer('statusEdifice');
            
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
        Schema::dropIfExists('edifices');
    }
}
