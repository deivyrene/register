<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');

            $table->string('numberPlace', 100);
            $table->string('namePlace', 100);
            $table->string('phonePlace', 100);
            $table->string('ownerPlace', 100);
            $table->string('mailPlace', 100);
            $table->integer('statusPlace');
            
            $table->integer('edifice_id')->unsigned();
            $table->foreign('edifice_id')->references('id')->on('edifices')->onDelete('cascade');
            
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
        Schema::dropIfExists('places');
    }
}
