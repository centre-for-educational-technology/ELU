<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_user', function (Blueprint $table) {
            $table->text('join_a1')->nullable();
            $table->text('join_a2')->nullable();
            $table->text('join_a3')->nullable();
            $table->text('join_extra_a1')->nullable();
            $table->text('join_extra_a2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_user', function (Blueprint $table) {
            $table->dropColumn('join_a1');
            $table->dropColumn('join_a2');
            $table->dropColumn('join_a3');
            $table->dropColumn('join_extra_a1');
            $table->dropColumn('join_extra_a2');
        });
    }
}
