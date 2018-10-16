<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToFitProjectsToNewForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->tinyInteger('created_by')->after('updated_at');
            $table->tinyInteger('updated_by')->after('created_by');
            $table->string('languages')->after('updated_by');
            $table->string('name_et')->after('languages')->nullable();
            $table->string('name_en')->after('name_et')->nullable();
            $table->text('comment_name_et')->after('name_en')->nullable();
            $table->text('comment_name_en')->after('comment_name_et')->nullable();
            $table->text('description_et')->after('comment_name_en')->nullable();
            $table->text('description_en')->after('description_et')->nullable();
            $table->text('comment_description_et')->after('description_en')->nullable();
            $table->text('comment_description_en')->after('comment_description_et')->nullable();
            $table->text('project_outcomes_et')->after('comment_description_en')->nullable();
            $table->text('project_outcomes_en')->after('project_outcomes_et')->nullable();
            $table->text('comment_project_outcomes_et')->after('project_outcomes_en')->nullable();
            $table->text('comment_project_outcomes_en')->after('comment_project_outcomes_et')->nullable();
            $table->text('interdisciplinary_approach_et')->after('comment_project_outcomes_en')->nullable();
            $table->text('interdisciplinary_approach_en')->after('interdisciplinary_approach_et')->nullable();
            $table->text('comment_interdisciplinary_approach_et')->after('interdisciplinary_approach_en')->nullable();
            $table->text('comment_interdisciplinary_approach_en')->after('comment_interdisciplinary_approach_et')->nullable();
            $table->text('tags_et')->after('comment_interdisciplinary_approach_en')->nullable();
            $table->text('tags_en')->after('tags_et')->nullable();
            $table->text('comment_tags_et')->after('tags_en')->nullable();
            $table->text('comment_tags_en')->after('comment_tags_et')->nullable();
            $table->text('additional_info_et')->after('comment_tags_en')->nullable();
            $table->text('additional_info_en')->after('additional_info_et')->nullable();
            $table->text('comment_additional_info_et')->after('additional_info_en')->nullable();
            $table->text('comment_additional_info_en')->after('comment_additional_info_et')->nullable();
            $table->text('comment_for_coordinators_et')->after('comment_additional_info_en')->nullable();
            $table->text('comment_for_coordinators_en')->after('comment_for_coordinators_et')->nullable();
            $table->text('comment_comment_for_coordinators_et')->after('comment_for_coordinators_en')->nullable();
            $table->text('comment_comment_for_coordinators_en')->after('comment_comment_for_coordinators_et')->nullable();
            $table->string('partners_et')->after('comment_comment_for_coordinators_en')->nullable();
            $table->string('partners_en')->after('partners_et')->nullable();
            $table->text('comment_partners_et')->after('partners_en')->nullable();
            $table->text('comment_partners_en')->after('comment_partners_et')->nullable();
            //$table->tinyInteger('study_term')->after('comment_partners_en')->nullable();
            $table->text('comment_study_term')->after('study_term')->nullable();
            $table->text('meetings_info_et')->after('comment_study_term')->nullable();
            $table->text('meetings_info_en')->after('meetings_info_et')->nullable();
            $table->text('comment_meetings_info_et')->after('meetings_info_en')->nullable();
            $table->text('comment_meetings_info_en')->after('comment_meetings_info_et')->nullable();
            $table->text('meetings_et')->after('comment_meetings_info_en')->nullable();
            $table->text('meetings_en')->after('meetings_et')->nullable();
            $table->text('comment_meetings_et')->after('meetings_en')->nullable();
            $table->text('comment_meetings_en')->after('comment_meetings_et')->nullable();
            $table->string('featured_video_link')->after('comment_meetings_en')->nullable();
            $table->text('comment_featured_video_link')->after('featured_video_link')->nullable();
            //$table->string('featured_image')->after('comment_featured_video_link')->nullable();
            $table->text('comment_featured_image')->after('featured_image')->nullable();
            //$table->string('supervisor')->after('comment_featured_image')->nullable();
            $table->string('supervising_student')->after('supervisor')->nullable();
            $table->string('co_supervisors')->after('supervising_student')->nullable();
            $table->string('project_year', 10)->after('co_supervisors')->nullable();
            $table->tinyInteger('status')->after('project_year')->nullable();
            $table->tinyInteger('available_to_join')->after('status')->nullable();
            $table->string('see_hidden_tokken', 128)->after('available_to_join')->nullable();
            $table->string('project_gdrive_folder_id', 255)->after('see_hidden_tokken')->nullable();
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
