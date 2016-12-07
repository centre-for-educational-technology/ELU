<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableColumnsToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
          $table->string('project_outcomes')->nullable()->change();
          $table->string('student_outcomes')->nullable()->change();
          $table->string('courses')->nullable()->change();
          $table->dateTime('start')->nullable()->change();
          $table->dateTime('end')->nullable()->change();
          $table->string('supervisor')->nullable()->change();
          $table->boolean('status')->nullable()->change();
          $table->text('extra_info')->nullable()->change();
          $table->dateTime('join_deadline')->nullable()->change();
          $table->string('join_link')->nullable()->change();
          $table->string('integrated_areas')->nullable()->change();
          $table->string('embedded')->nullable()->change();

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
