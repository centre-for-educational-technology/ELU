<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewProjectUserTableCreated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_project_user', function (Blueprint $table) {
            $table->integger('project_id');
            $table->integger('user_id');
            $table->string('participation_role');
            $table->float('points', 8, 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('new_project_user');
    }
}
