<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function(Blueprint $table) {
            $table->increments('id');
            $table->string('image_url');
            $table->string('name');
            $table->string('title');

            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('CASCADE');

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
        Schema::drop('coaches');
    }
}
