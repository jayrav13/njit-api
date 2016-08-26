<?php

use Illuminate\Database\Migrations\Migration;

class AddRequestCountToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->biginteger('requests_total')->default(0);
            $table->biginteger('requests_success')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('requests_total');
            $table->dropColumn('requests_success');
        });
    }
}
