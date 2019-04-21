<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('join_q1')->nullable();
            $table->text('join_q2')->nullable();
            $table->text('join_q3')->nullable();
            $table->text('join_extra_q1')->nullable();
            $table->text('join_extra_q2')->nullable();
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
            $table->dropColumn('join_q1');
            $table->dropColumn('join_q2');
            $table->dropColumn('join_q3');
            $table->dropColumn('join_extra_q1');
            $table->dropColumn('join_extra_q2');
        });
    }
}
