<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('number')->nullable();
            $table->string('image_url')->nullable();
            $table->string('name')->nullable();
            $table->string('year')->nullable();
            $table->string('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('position')->nullable();
            $table->string('hometown')->nullable();

            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports');

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
        Schema::drop('athletes');
    }
}
