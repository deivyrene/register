<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nameVisitor', 100);
            $table->string('surnameVisitor', 100);
            $table->string('rutVisitor',11);
            $table->string('emailVisitor', 100);
            $table->string('phoneVisitor', 100);
            $table->string('addressVisitor', 100);
            $table->string('companyVisitor', 100);
            
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
        Schema::dropIfExists('visitors');
    }
}
