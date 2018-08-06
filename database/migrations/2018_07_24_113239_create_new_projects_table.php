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
        Schema::create('new_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by');
            $table->string('languages');
            $table->string('name_et')->nullable();
            $table->string('name_en')->nullable();
            $table->text('comment_name_et')->nullable();
            $table->text('comment_name_en')->nullable();
            $table->text('description_et')->nullable();
            $table->text('description_en')->nullable();
            $table->text('comment_description_et')->nullable();
            $table->text('comment_description_en')->nullable();
            $table->text('project_outcomes_et')->nullable();
            $table->text('project_outcomes_en')->nullable();
            $table->text('comment_project_outcomes_et')->nullable();
            $table->text('comment_project_outcomes_en')->nullable();
            $table->text('interdisciplinary_approach_et')->nullable();
            $table->text('interdisciplinary_approach_en')->nullable();
            $table->text('comment_interdisciplinary_approach_et')->nullable();
            $table->text('comment_interdisciplinary_approach_en')->nullable();
            $table->text('tags_et')->nullable();
            $table->text('tags_en')->nullable();
            $table->text('comment_tags_et')->nullable();
            $table->text('comment_tags_en')->nullable();
            $table->text('additional_info_et')->nullable();
            $table->text('additional_info_en')->nullable();
            $table->text('comment_additional_info_et')->nullable();
            $table->text('comment_additional_info_en')->nullable();
            $table->text('comment_for_coordinators_et')->nullable();
            $table->text('comment_for_coordinators_en')->nullable();
            $table->text('comment_comment_for_coordinators_et')->nullable();
            $table->text('comment_comment_for_coordinators_en')->nullable();
            $table->tinyInteger('study_term')->nullable();
            $table->text('comment_study_term')->nullable();
            $table->text('meetings_info_et')->nullable();
            $table->text('meetings_info_en')->nullable();
            $table->text('comment_meetings_info_et')->nullable();
            $table->text('comment_meetings_info_en')->nullable();
            $table->text('meetings_et')->nullable();
            $table->text('meetings_en')->nullable();
            $table->text('comment_meetings_et')->nullable();
            $table->text('comment_meetings_en')->nullable();
            $table->string('featured_video_link')->nullable();
            $table->text('comment_featured_video_link')->nullable();
            $table->string('featured_image')->nullable();
            $table->text('comment_featured_image')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('supervising_student')->nullable();
            $table->string('co_supervisors')->nullable();
            $table->string('project_year', 10)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('available_to_join')->nullable();
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
        Schema::drop('new_projects');
    }
}
