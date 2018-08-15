<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CosupervisorsPointsAcceptsNewProjectIds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cosupervisors_points', function (Blueprint $table) {
            $table->integer('project_id')->unsigned()->nullable()->change();
            $table->integer('new_project_id')->unsigned()->index()->nullable();
            $table->foreign('new_project_id')->references('id')->on('new_projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cosupervisors_points', function (Blueprint $table) {
            $table->integer('project_id')->unsigned()->change();
            $table->dropForeign('groups_new_project_id_foreign');
            $table->dropColumn('new_project_id');
        });
    }
}
