<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFields2ToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
//	        $table->text('aim');
//	        $table->text('project_outcomes')->change();
//	        $table->text('student_expectations');
//	        $table->string('meeting_dates');
	        
//	        $table->integer('evaluation_date_id')->unsigned()->index();
	        $table->foreign('evaluation_date_id')->references('id')->on('evaluation_dates')->onDelete('cascade');
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
