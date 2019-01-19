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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->text('project_outcomes')->after('updated_at')->nullable();
            $table->string('student_outcomes')->after('project_outcomes')->nullable();
            $table->string('courses')->after('student_outcomes')->nullable();
            $table->datetime('start')->after('courses')->nullable();
            $table->datetime('end')->after('start')->nullable();
            $table->string('institute')->after('end');
            $table->tinyInteger('status')->after('supervisor')->nullable();
            $table->string('tags')->after('status');
            $table->string('embedded')->after('tags')->nullable();
            $table->string('join_link')->after('study_term')->nullable();
            $table->string('integrated_areas')->after('join_link')->nullable();
            $table->text('description')->after('integrated_areas');
            $table->string('publishing_status')->after('description');
            $table->text('extra_info')->after('publishing_status')->nullable();
            $table->datetime('join_deadline')->after('extra_info')->nullable();
            $table->string('language')->after('submitted_by_student');
            $table->string('group_link')->after('language')->nullable();
            $table->smallInteger('study_year')->after('featured_image');
            $table->string('meeting_info')->after('study_year')->nullable();
            $table->text('summary')->after('meeting_info')->nullable();
            $table->text('interdisciplinary_desc')->after('summary')->nullable();
            $table->text('novelty_desc')->after('interdisciplinary_desc')->nullable();
            $table->text('author_management_skills')->after('novelty_desc')->nullable();
            $table->tinyInteger('requires_review')->after('author_management_skills')->nullable();
            $table->text('aim')->after('get_notifications');
            $table->text('student_expectations')->after('aim');
            $table->string('meeting_dates')->after('student_expectations');
            $table->tinyInteger('presentation_results')->after('evaluation_date_id');
            $table->tinyInteger('summary_version')->after('presentation_results')->nullable();
        });
    }
}
