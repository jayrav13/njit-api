<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gender', 1)->nullable();
            $table->string('roster_url');
            $table->string('schedule_url');
            $table->string('archives_url');
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
        Schema::drop('sports');
    }
}
