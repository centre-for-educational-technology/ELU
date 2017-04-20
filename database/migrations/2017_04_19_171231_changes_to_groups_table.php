<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesToGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
          $table->dropColumn('summary');
          $table->binary('images')->nullable();
          $table->text('results')->nullable();
          $table->text('activities')->nullable();
          $table->text('reflection')->nullable();
          $table->string('partners')->nullable();
          $table->text('students_opinion')->nullable();
          $table->text('supervisor_opinion')->nullable();
          $table->string('embedded')->nullable();
          $table->string('materials_types')->nullable();
          $table->binary('materials_links')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            //
        });
    }
}
