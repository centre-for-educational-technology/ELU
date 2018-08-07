<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OutsideProjectUserTableCreated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outside_project_user', function (Blueprint $table) {
            $table->integer('outside_project_id');
            $table->integer('user_id');
            $table->string('participation_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('outside_project_user');
    }
}
