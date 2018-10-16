<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUnnecessaryColumnsForNewForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['name', 'project_outcomes', 'student_outcomes', 'courses', 'start', 'end', 'institute', 'status', 'tags', 'embedded', 'join_link', 'integrated_areas', 'description', 'publishing_status', 'extra_info', 'join_deadline', 'language', 'group_link', 'study_year', 'meeting_info', 'summary', 'interdisciplinary_desc', 'novelty_desc', 'author_management_skills', 'requires_review', 'aim', 'student_expectations', 'meeting_dates', 'presentation_results', 'summary_version']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
