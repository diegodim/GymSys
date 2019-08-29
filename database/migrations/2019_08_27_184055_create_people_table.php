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
            $table->string('name', 25);
            $table->integer("cpf")->unique()->unique();
            $table->string("id_number", 15)->unique();
            $table->string("public_place", 50)->nullable();
            $table->string("number", 50)->nullable();
            $table->string("neighborhood", 50)->nullable();
            $table->string("city", 50)->nullable();
            $table->integer("state_id")->nullable();
            $table->integer("zip_code")->nullable();
            $table->bigInteger("phone");
            $table->boolean('activated')->default(1);
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
        Schema::dropIfExists('people');
    }
}
