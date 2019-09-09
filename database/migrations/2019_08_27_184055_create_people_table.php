<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string("cpf", 11)->unique()->unique();
            $table->string("id_number", 15)->unique();
            $table->string("adress", 50)->nullable();
            $table->string("neighborhood", 50)->nullable();
            $table->string("city", 50)->nullable();
            $table->unsignedBigInteger("state_id")->nullable();
            $table->integer("postal")->nullable();
            $table->bigInteger("phone");
            $table->boolean('activated')->default(1);
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
