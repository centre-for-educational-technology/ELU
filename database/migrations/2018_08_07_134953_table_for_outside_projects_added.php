<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableForOutsideProjectsAdded extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outside_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->text('project_outcomes');
            $table->text('tags');
            $table->string('email');
            $table->string('tlu_contact')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('deleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('outside_projects');
    }
}
