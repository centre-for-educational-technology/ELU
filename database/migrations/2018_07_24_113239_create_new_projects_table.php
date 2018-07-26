<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_2', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by');
            $table->char('name_et')->nullable();
            $table->text('comment_name_et')->nullable();
            $table->char('name_en')->nullable();
            $table->text('comment_name_en')->nullable();
            $table->text('description_et')->nullable();
            $table->text('comment_description_et')->nullable();
            $table->text('description_en')->nullable();
            $table->text('comment_description_en')->nullable();
            $table->text('project_outcomes_et')->nullable();
            $table->text('comment_project_outcomes_et')->nullable();
            $table->text('project_outcomes_en')->nullable();
            $table->text('comment_project_outcomes_en')->nullable();
            $table->text('interdisciplinary_approach_et')->nullable();
            $table->text('comment_interdisciplinary_approach_et')->nullable();
            $table->text('interdisciplinary_approach_en')->nullable();
            $table->text('comment_interdisciplinary_approach_en')->nullable();
            $table->text('additional_information_et')->nullable();
            $table->text('comment_additional_information_et')->nullable();
            $table->text('additional_information_en')->nullable();
            $table->text('comment_additional_information_en')->nullable();
            $table->text('meetings__info_et')->nullable();
            $table->text('comment_meetings__info_et')->nullable();
            $table->text('meetings__info_en')->nullable();
            $table->text('comment_meetings__info_en')->nullable();
            $table->text('meetings_et')->nullable();
            $table->text('comment_meetings_et')->nullable();
            $table->text('meetings_en')->nullable();
            $table->text('comment_meetings_en')->nullable();
            $table->tinyInteger('study_term');
            $table->text('comment_study_term')->nullable();
            $table->char('featured_video_link')->nullable();
            $table->text('comment_featured_video_link')->nullable();
            $table->char('featured_image')->nullable();
            $table->text('comment_featured_image')->nullable();
            $table->char('supervisor');
            $table->char('cosupervisors')->nullable();
            $table->char('supervising_student')->nullable();
            $table->string('project_year', 10);
            $table->tinyInteger('status');
            $table->tinyInteger('available_to_join');
            $table->string('see_hidden_tokken', 128)->nullable();
            $table->string('project_gdrive_folder_id', 255)->nullable();
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
        Schema::drop('projects_2');
    }
}
