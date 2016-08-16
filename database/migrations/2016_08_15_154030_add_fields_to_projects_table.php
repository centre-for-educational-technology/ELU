<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function ($table) {
            $table->string('project_outcomes');
            $table->string('student_outcomes');
            $table->string('courses');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('institute');
            $table->string('supervisor');
            $table->boolean('status');
            $table->string('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
