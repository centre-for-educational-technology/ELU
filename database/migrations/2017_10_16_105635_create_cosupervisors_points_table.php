<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosupervisorsPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosupervisors_points', function (Blueprint $table) {
            $table->increments('id');
	          $table->string('name');
	          $table->decimal('points', 8, 1);
		        $table->integer('project_id')->unsigned()->index();
		        $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cosupervisors_points');
    }
}
