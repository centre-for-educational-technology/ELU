@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-lg-12">
            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if($current_project->submitted_by_student == 1)

                        @if($current_project->requires_review == 1)
                            <h3 class="panel-title"><i class="fa fa-pencil"></i> {{trans('project.edit')}} <span class='label label-info'>{{trans('project.student_idea_label')}}</span> <span class='label label-danger'>{{trans('project.idea_not_in_use_label')}}</span></h3>

                        @else
                            <h3 class="panel-title"><i class="fa fa-pencil"></i> {{trans('project.edit')}} <span class='label label-info'>{{trans('project.student_idea_label')}}</span> <span class='label label-success'>{{trans('project.idea_in_use_label')}}</span></h3>
                        @endif
                    @else
                        <h3 class="panel-title"><i class="fa fa-pencil"></i> {{trans('project.edit')}}</h3>
                    @endif



                </div>

                <div class="panel-body">

                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Project Form -->
                    <form action="{{ url('/project/'.$current_project->id) }}" id="project-form" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
            <div class=col-lg-6>
                <!-- Description about project language selection -->
                <p></p>

                <!-- Project language selection -->
                <div class="col-lg-12 panel panel-heading">
                    <p>
                        {{ trans('project.active_language_selection') }}
                    </p>
                    <span id="project_in_estonian"><input type="checkbox" name="project_in_estonian" value="true" checked><span>Eesti keel</span></span>
                    <span id="project_in_english"><input type="checkbox" name="project_in_english" value="true" checked><span>English</span></span>
                </div>

                <!-- Reminder about fulfilling learning outcomes -->
                <p>
                    <span id="open_learning_outcomes" style="display:none;" class="glyphicon glyphicon-triangle-right"></span><span id="close_learning_outcomes" class="glyphicon glyphicon-triangle-bottom"></span>{{ trans('project.about_fulfilling_expectations') }}
                </p>

                <!-- Course's learning outcomes  -->
                <div id="learning_outcomes"><p>{{ trans('project.expectations_to_meet_for') }}</p>
                <p>
                    <ul>
                        <li>{{ trans('project.expectations_to_meet_for_student_1') }}</li>
                        <li>{{ trans('project.expectations_to_meet_for_student_2') }}</li>
                        <li>{{ trans('project.expectations_to_meet_for_student_3') }}</li>
                        <li>{{ trans('project.expectations_to_meet_for_student_4') }}</li>
                        <li>{{ trans('project.expectations_to_meet_for_student_5') }}</li>
                    </ul>
                </p>
                </div>

            </div>
            <div class=col-lg-6>
                <!-- General comments about the project from LIFE coordinators -->
                <p></p>
            </div>
            </div>

            <?php $startingLanguage = App::getLocale(); ?>
            <!-- Start of the first block -->
            <div class="col-lg-12 panel panel-heading">

        <!-- PROJECT NAME -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Project name in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element form-group">
                    <label class="h3 left">{{ trans('project.name') }} *
                        <span class="tooltiptext">{{ trans('project.name_hover') }}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Project name input in Estonian -->
                    <input type="text" name="name_et" value="{{ (empty(old('name_et')) ? $current_project->name_et :  old('name_et')) }}" class="input-field form-control">
                    <div class="tool-tip">{{ trans('project.name_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <!-- Project name in English -->
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('en'); ?>
                <div class="input-element">
                    <label class="h3 left">{{ trans('project.name') }} *
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Project name input in English -->
                    <input type="text" name="name_en" value="{{ (empty(old('name_en')) ? $current_project->name_en :  old('name_en')) }}" class="input-field">
                    <div class="tool-tip">{{ trans('project.name_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        
        </div>
                <!-- PROJECT NAME -->
                <!-- Project name in Estonian -->
                <!-- Project name input in Estonian -->
                <!-- Comment for name in Estonian -->
                <!--
                <div class="col-lg-12">


                    <div class="col-lg-6 form_estonian">
                        <?php App::setLocale('et'); ?>
                        <div class="form-group">
                            <p><label for="name_et">{{ trans('project.name') }} *</label></p>
                            <input class="form-control" type="text" name="name_et" value="{{ (empty(old('name_et')) ? $current_project->name_et :  old('name_et')) }}">
                        </div>

                        <div id="comment_name_et"></div>

                    </div>

                    <div class="col-lg-6 form_english">
                        
                        <?php App::setLocale('en'); ?>
                        <div class="form-group">
                            <p><label for="name_en">{{ trans('project.name') }} *</label></p>
                            <input class="form-control" type="text" name="name_en" value="{{ (empty(old('name_en')) ? $current_project->name_en :  old('name_en')) }}">
                        </div>
                        
                        <div id="comment_name_en"></div>
                        
                    </div>
                </div>
            -->
            <!-- Comment for name in English -->
            <!-- Project name input in English -->
                <!-- Project name in English -->
                

                <!-- DESCRIPTION -->
                <div class="col-lg-12">

                    <!-- Project description in Estonian -->
                    <div class="col-lg-6 form_estonian">

                        <!-- Project description input in Estonian -->
                        <?php App::setLocale('et'); ?>
                        <div class="form-group">
                            <p><label for="description_et">
                                {{ trans('project.description') }} *
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{ trans('project.description_desc') }}"></i>
                            </label></p>
                            <textarea class="mceSimple" id="description_et" name="description_et">{!! (empty(old('description_et')) ? $current_project->description_et :  old('description_et')) !!}</textarea>
                        </div>

                        <!-- Comment for description in Estonian -->
                        <div id="comment_description_et"></div>

                    </div>

                    <!-- Project description in English -->
                    <div class="col-lg-6 form_english">

                        <!-- Project description input in English -->
                        <?php App::setLocale('en'); ?>
                        <div class="form-group">
                            <p><label for="description_en">
                                {{ trans('project.description') }} *
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{trans('project.description_desc')}}"></i>
                            </label></p>
                            <textarea class="mceSimple" id="description_en" name="description_en">{!! (empty(old('description_en')) ? $current_project->description_en :  old('description_en')) !!}</textarea>
                        </div>

                        <!-- Comment for description in English -->
                        <div id="comment_description_en"></div>

                    </div>
                </div>


                <!-- PROJECT OUTCOME -->
                <div class="col-lg-12">

                    <!-- Project outcome in Estonian -->
                    <div class="col-lg-6 form_estonian">

                        <!-- Project outcome input in Estonian -->
                        <?php App::setLocale('et'); ?>
                        <div class="form-group">
                            <p><label for="project_outcomes_et">
                                {{ trans('project.outcomes') }} *
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{trans('project.outcomes_desc')}}"></i>
                            </label></p>
                            <textarea class="mceSimple" id="project_outcomes_et" name="project_outcomes_et">{!! (empty(old('project_outcomes_et')) ? $current_project->project_outcomes_et :  old('project_outcomes_et')) !!}</textarea>
                        </div>

                        <!-- Comment for outcome in Estonian -->
                        <div id="comment_project_outcome_et"></div>

                    </div>

                    <!-- Project outcome in English -->
                    <div class="col-lg-6 form_english">

                        <!-- Project outcome input in English -->
                        <?php App::setLocale('en'); ?>
                        <div class="form-group">
                            <p><label for="project_outcomes_en">
                                {{ trans('project.outcomes') }} *
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{trans('project.outcomes_desc')}}"></i>
                            </label></p>
                            <textarea class="mceSimple" id="project_outcomes_en" name="project_outcomes_en">{!! (empty(old('project_outcomes_en')) ? $current_project->project_outcomes_en :  old('project_outcomes_en')) !!}</textarea>
                        </div>

                        <!-- Comment for outcome in English -->
                        <div id="comment_project_outcome_en"></div>

                    </div>
                </div>


                <!-- INTERDISCIPLINARY APPROACH -->
                <div class="col-lg-12">

                    <!-- Interdisciplinary approach in Estonian -->
                    <div class="col-lg-6 form_estonian">

                        <!-- Interdisciplinary approach input in Estonian -->
                        <?php App::setLocale('et'); ?>
                        <div class="form-group">
                            <p><label for="interdisciplinary_approach_et">
                                {{ trans('project.interdisciplinary_desc') }} *
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{trans('project.interdisciplinary_desc_desc')}}"></i>
                            </label></p>
                            <textarea class="mceSimple" id="interdisciplinary_approach_et" name="interdisciplinary_approach_et">{!! (empty(old('interdisciplinary_approach_et')) ? $current_project->interdisciplinary_approach_et :  old('interdisciplinary_approach_et')) !!}</textarea>
                        </div>

                        <!-- Comment for interdisciplinary approach in Estonian -->
                        <div id="comment_interdisciplinary_approach_et"></div>

                    </div>

                    <!-- Interdisciplinary approach in English -->
                    <div class="col-lg-6 form_english">

                        <!-- Interdisciplinary approach input in English -->
                        <?php App::setLocale('en'); ?>
                        <div class="form-group">
                            <p><label for="interdisciplinary_approach_en">
                                {{ trans('project.interdisciplinary_desc') }} *
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{trans('project.interdisciplinary_desc_desc')}}"></i>
                            </label></p>
                            <textarea class="mceSimple" id="interdisciplinary_approach_en" name="interdisciplinary_approach_en">{!! (empty(old('interdisciplinary_approach_en')) ? $current_project->interdisciplinary_approach_en :  old('interdisciplinary_approach_en')) !!}</textarea>
                        </div>

                        <!-- Comment for interdisciplinary approach in English -->
                        <div id="comment_interdisciplinary_approach_en"></div>

                    </div>
                </div>


                <!-- TAGS -->
                <div class="col-lg-12">

                    <!-- Tags in Estonian -->
                    <div class="col-lg-6 form_estonian">

                        <!-- Tags input in Estonian -->
                        <?php App::setLocale('et'); ?>
                        <div class="form-group">
                            <p><label for="tags_et">
                                {{ trans('project.keywords') }} *
                            </label></p>
                            <input class="form-control tags_et" type="text">
                            <span style="visibility: hidden;">{{ trans('project.keywords_desc') }}</span>
                        </div>

                        <!-- Div to show the selected tags_et to the user -->
                        <div id="tags_et_output" class="form-group"></div>

                        <!-- To save the tags -->
                        <input type="hidden" name="keywords_et" id="keywords_et" value="{{ (empty(old('tags_et')) ? $current_project->tags_et :  old('tags_et')) }}">

                        <!-- Comment for tags in Estonian -->
                        <div id="comment_tags_et"></div>

                    </div>

                    <!-- Tags in English -->
                    <div class="col-lg-6 form_english">

                        <!-- Tags input in English -->
                        <?php App::setLocale('en'); ?>
                        <div class="form-group">
                            <p><label for="tags_en">
                                {{ trans('project.keywords') }} *
                            </label></p>
                            <input class="form-control tags_en" type="text">
                            <span style="visibility: hidden;">{{ trans('project.keywords_desc') }}</span>
                        </div>

                        <!-- Div to show the selected tags_en to the user -->
                        <div id="tags_en_output" class="form-group row"></div>
                        
                        <!-- To save the tags -->
                        <input type="hidden" name="keywords_en" id="keywords_en" value="{{ (empty(old('tags_en')) ? $current_project->tags_en :  old('tags_en')) }}">

                        <!-- Comment for tags in English -->
                        <div id="comment_tags_en"></div>

                    </div>
                </div>


                <!-- ADDITIONAL INFORMATION -->
                <div class="col-lg-12">

                    <!-- Additional information in Estonian -->
                        <div class="col-lg-6 form_estonian">

                        <!-- Additional information input in Estonian -->
                        <?php App::setLocale('et'); ?>
                        <div class="form-group">
                            <p><label for="additional_info_et">{{ trans('project.extra_info') }}</label></p>
                            <textarea class="mceSimple" name="additional_info_et" >{!! (empty(old('additional_info_et')) ? $current_project->additional_info_et :  old('additional_info_et')) !!}</textarea>
                        </div>

                        <!-- Comment for additional information in Estonian -->
                        <div id="comment_additional_info_et"></div>

                    </div>

                    <!-- Additional information in English -->
                        <div class="col-lg-6 form_english">

                        <!-- Additional information input in English -->
                        <?php App::setLocale('en'); ?>
                        <div class="form-group">
                            <p><label for="additional_info_en">{{ trans('project.extra_info') }}</label></p>
                            <textarea class="mceSimple" name="additional_info_en">{!! (empty(old('additional_info_en')) ? $current_project->additional_info_en :  old('additional_info_en')) !!}</textarea>
                        </div>

                        <!-- Comment for additional information in English -->
                        <div id="comment_additional_info_en"></div>

                    </div>
                </div>


                <!-- COMMENT FOR LIFE COORDINATORS -->
                <div class="col-lg-12">

                    <!-- Comment for LIFE coordinators in Estonian -->
                    <div class="col-lg-6 form_estonian">

                        <!-- Comment for LIFE coordinators input in Estonian -->
                        <?php App::setLocale('et'); ?>
                        <div class="form-group">
                            <p><label for="comment_for_coordinators_et">{{ trans('project.comment_for_coordinators') }}</label></p>
                            <textarea class="mceSimple" name="comment_for_coordinators_et">{!! (empty(old('comment_for_coordinators_et')) ? $current_project->comment_for_coordinators_et :  old('comment_for_coordinators_et')) !!}</textarea>
                        </div>

                        <!-- Comment for comment for LIFE coordinators in Estonian -->
                        <div id="comment_comment_for_coordinators_et"></div>

                    </div>

                    <!-- Comment for LIFE coordinators in English -->
                    <div class="col-lg-6 form_english">

                        <!-- Comment for LIFE coordinators input in English -->
                        <?php App::setLocale('en'); ?>
                        <div class="form-group">
                            <p><label for="comment_for_coordinators_en">{{ trans('project.comment_for_coordinators') }}</label></p>
                            <textarea class="mceSimple" name="comment_for_coordinators_en">{!! (empty(old('comment_for_coordinators_en')) ? $current_project->comment_for_coordinators_en :  old('comment_for_coordinators_en')) !!}</textarea>
                        </div>

                        <!-- Comment for comment for LIFE coordinators in  -->
                        <div id="comment_comment_for_coordinators_en"></div>

                    </div>
                </div>


                <!-- PARTNERS -->
                <div class="col-lg-12">

                    <!-- Partner(s) in Estonian -->
                    <div class="col-lg-6 form_estonian">

                        <!-- Partner(s) input in Estonian -->
                        <?php App::setLocale('et'); ?>
                        <div class="form-group">
                            <p><label for="partners_et">{{ trans('project.partners') }}</label></p>
                            <input class="form-control" type="text" name="partners_et" value="{{ (empty(old('partners_et')) ? $current_project->partners_et :  old('partners_et')) }}">
                        </div>

                        <!-- Comment for Partner(s) in Estonian -->
                        <div id="comment_partners_et"></div>

                    </div>

                    <!-- Partner(s) in English -->
                    <div class="col-lg-6 form_english">

                        <!-- Partner(s) input in English -->
                        <?php App::setLocale('en'); ?>
                        <div class="form-group">
                            <p><label for="partners_en">{{ trans('project.partners') }}</label></p>
                            <input class="form-control" type="text" name="partners_en" value="{{ (empty(old('partners_en')) ? $current_project->partners_en :  old('partners_en')) }}">
                        </div>

                        <!-- Comment for Partner(s) in English -->
                        <div id="comment_partners_en"></div>

                    </div>
                </div>


            <!-- End of the first block -->
            </div>


            <!-- Start of the second block -->
            <div class="col-lg-12 panel panel-heading">

                <!-- Project semester(s) -->
                <?php App::setLocale($startingLanguage); ?>
                <label for="project_duration">
                    {{ trans('project.duration') }}
                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{trans('project.duration_desc')}}"></i>
                </label>
                <div class="col-lg-12" id="project_duration">
                    @if ($current_project->study_term == 0)
                        <div class="col-lg-6">
                            <button type="button" id="duration_0" class="btn btn-info btn-lg btn-block study_term_button">{{ trans('project.autumn_semester') }}</button>
                            <button type="button" id="duration_2" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.autumn_spring') }}</button>
                        </div>
                        
                        <div class="col-lg-6">
                            <button type="button" id="duration_1" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.spring_semester') }}</button>
                            <button type="button" id="duration_3" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.spring_autumn') }}</button>
                        </div>
                    @elseif ($current_project->study_term == 1)
                        <div class="col-lg-6">
                            <button type="button" id="duration_0" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.autumn_semester') }}</button>
                            <button type="button" id="duration_2" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.autumn_spring') }}</button>
                        </div>

                        <div class="col-lg-6">
                            <button type="button" id="duration_1" class="btn btn-info btn-lg btn-block study_term_button">{{ trans('project.spring_semester') }}</button>
                            <button type="button" id="duration_3" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.spring_autumn') }}</button>
                        </div>
                    @elseif ($current_project->study_term == 2)
                        <div class="col-lg-6">
                            <button type="button" id="duration_0" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.autumn_semester') }}</button>
                            <button type="button" id="duration_2" class="btn btn-info btn-lg btn-block study_term_button">{{ trans('project.autumn_spring') }}</button>
                        </div>

                        <div class="col-lg-6">
                            <button type="button" id="duration_1" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.spring_semester') }}</button>
                            <button type="button" id="duration_3" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.spring_autumn') }}</button>
                        </div>
                    @else
                        <div class="col-lg-6">
                            <button type="button" id="duration_0" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.autumn_semester') }}</button>
                            <button type="button" id="duration_2" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.autumn_spring') }}</button>
                        </div>

                        <div class="col-lg-6">
                            <button type="button" id="duration_1" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.spring_semester') }}</button>
                            <button type="button" id="duration_3" class="btn btn-info btn-lg btn-block study_term_button">{{ trans('project.spring_autumn') }}</button>
                        </div>
                    @endif
                </div>
                <div style="display:none">
                    @if ($current_project->study_term == 0)
                        <input id="duration_0_radio" name="study_term" type="radio" value="0" checked>
                        <input id="duration_1_radio" name="study_term" type="radio" value="1">
                        <input id="duration_2_radio" name="study_term" type="radio" value="2">
                        <input id="duration_3_radio" name="study_term" type="radio" value="3">
                    @elseif ($current_project->study_term == 1)
                        <input id="duration_0_radio" name="study_term" type="radio" value="0">
                        <input id="duration_1_radio" name="study_term" type="radio" value="1" checked>
                        <input id="duration_2_radio" name="study_term" type="radio" value="2">
                        <input id="duration_3_radio" name="study_term" type="radio" value="3">
                    @elseif ($current_project->study_term == 2)
                        <input id="duration_0_radio" name="study_term" type="radio" value="0">
                        <input id="duration_1_radio" name="study_term" type="radio" value="1">
                        <input id="duration_2_radio" name="study_term" type="radio" value="2" checked>
                        <input id="duration_3_radio" name="study_term" type="radio" value="3">
                    @else
                        <input id="duration_0_radio" name="study_term" type="radio" value="0">
                        <input id="duration_1_radio" name="study_term" type="radio" value="1">
                        <input id="duration_2_radio" name="study_term" type="radio" value="2">
                        <input id="duration_3_radio" name="study_term" type="radio" value="3" checked>
                    @endif
                </div>

            <!-- End of the second block -->
            </div>


            <!-- Start of the third block -->
            <div class="col-lg-12 panel panel-heading">

                <!-- Meetings in Estonian start -->
                <div class="col-lg-6 form_estonian">

                    <!-- Additional info about the meetings in Estonian -->
                    <?php App::setLocale('et'); ?>
                    <div class="col-lg-12">
                        <label for="meetings_info_et">
                            {{ trans('project.meetings_info') }}
                        </label>
                        <textarea rows="5" name="meetings_info_et" style="width: 100%;">{!! (empty(old('meetings_info_et')) ? $current_project->meetings_info_et :  old('meetings_info_et')) !!}</textarea>
                    </div>


                    <!-- Meetings info in Estonian -->
                    <div class="col-lg-12">
                        <label for="first_meeting_et">
                            {{ trans('project.meeting_dates') }} *
                            <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{ trans('project.meeting_dates_desc') }}"></i>
                        </label>
                        <div id='first_meeting_et'>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="col-lg-12"><span class="glyphicon glyphicon-calendar" style="font-size:75px;"></span></div>
                                    <div class="col-lg-12"><input type="text" class="form-control meeting_date_et"></div>
                                </div>
                                <div class="col-lg-7">
                                    <textarea rows="5" style="width: 100%;" class="meeting_info_et" placeholder="{{ trans('project.meeting_additional_info') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id='other_meetings_et'>
                        </div>
                        <input id="meetings_et" type="hidden" name="meetings_et" value="{{ (empty(old('meetings_et')) ? $current_project->meetings_et :  old('meetings_et')) }}">
                    </div>

                    <!-- Icons for adding/removing another Estonian meeting input field -->
                    <div class="col-lg-12">
                        <div class="pull-left">
                            <span id="remove_meeting_et" class="glyphicon glyphicon-trash"></span>
                            <span id="add_meeting_et" class="glyphicon glyphicon-plus"></span>
                        </div>
                    </div>

                <!-- Meetings in Estonian end -->
                </div>


                <!-- Meetings in English start -->
                <div class="col-lg-6 form_english">

                    <!-- Additional info about the meetings in English -->
                    <?php App::setLocale('en'); ?>
                    <div class="col-lg-12">
                        <label for="meetings_info_en">
                            {{ trans('project.meetings_info') }}
                        </label>
                        <textarea rows="5" name="meetings_info_en" style="width: 100%;">{!! (empty(old('meetings_info_en')) ? $current_project->meetings_info_en :  old('meetings_info_en')) !!}</textarea>
                    </div>


                    <!-- Meetings info in English -->
                    <div class="col-lg-12">
                        <label for="first_meeting_en">
                            {{ trans('project.meeting_dates') }} *
                            <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{ trans('project.meeting_dates_desc') }}"></i>
                        </label>
                        <div id='first_meeting_en'>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="col-lg-12"><span class="glyphicon glyphicon-calendar" style="font-size:75px;"></span></div>
                                    <div class="col-lg-12"><input type="text" class="form-control meeting_date_en"></div>
                                </div>
                                <div class="col-lg-7">
                                    <textarea rows="5" style="width: 100%;" class="meeting_info_en" placeholder="{{ trans('project.meeting_additional_info') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id='other_meetings_en'>
                        </div>
                        <input id="meetings_en" type="hidden" name="meetings_en" value="{{ (empty(old('meetings_en')) ? $current_project->meetings_en :  old('meetings_en')) }}">
                    </div>

                    <!-- Icons for adding/removing another English meeting input field -->
                    <div class="col-lg-12">
                        <div class="pull-left">
                            <span id="remove_meeting_en" class="glyphicon glyphicon-trash"></span>
                            <span id="add_meeting_en" class="glyphicon glyphicon-plus"></span>
                        </div>
                    </div>

                <!-- Meetings in English end -->
                </div>

            <!-- End of the third block -->
            </div>


            <!-- Start of the fourth block -->
            <div class="col-lg-12 panel panel-heading">
                <div class="col-lg-6">
                <?php App::setLocale($startingLanguage); ?>

                <!-- Featured video link -->
                <p><label for="featured_video_link">{{ trans('project.video_link') }}</label></p>
                <input class="form-control" type="text" name="featured_video_link" value="{{ (empty(old('featured_video_link')) ? $current_project->featured_video_link :  old('featured_video_link')) }}">

                <!-- Featured image -->
                <p><label for="featured_image">{{ trans('project.featured_image') }}</label></p>
                <input type="file" name="featured_image" id="featured_image" class="form-control" value="{{ (empty(old('featured_image')) ? $current_project->featured_image :  old('featured_image')) }}">
                @if (!empty($current_project->featured_image))
                    <p><img class="img-thumbnail img-responsive featured-image" src="{{url('storage/projects_featured_images/'.$current_project->featured_image)}}"></p>
                @endif
                </div>

                <div class="col-lg-6">
                <!-- Supervisor -->
                <p><label for="supervisor">{{ trans('project.supervisor') }} *</label></p>
                <select id="supervisor" class="form-control" name="supervisor">
                    <option value='-1'> </option>
                    @if ($teachers->count())
                        @foreach($teachers as $teacher)
                            @if (old('supervisor')!='')
                                @if (old('supervisor')==$teacher->id)
                                    <option value="{{ $teacher->id }}" selected="selected">{{ getUserName($teacher) }}</option>
                                @else
                                    <option value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
                                @endif
                            @else
                                @if ($current_project->supervisor == $teacher->id)
                                    <option value="{{ $teacher->id }}" selected="selected">{{ getUserName($teacher) }}</option>
                                @else
                                    <option value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </select>

                <!-- Supervising student -->
                @if (Auth::user()->is('student') && !Auth::user()->is('oppejoud'))
                    <!--
                    <p><label for="supervising_student">{{ trans('project.supervising_student') }}</label></p>
                    -->
                    <input class="form-control" type="hidden" name="supervising_student" value="{{ Auth::user()->id }}">
                @endif

                <!-- Cosupervisor -->
                <p><label for="co_supervisor">{{ trans('project.cosupervisor') }}</label></p>
                <!-- div created to have something to append the inputs to, if user wants to add more than one cosupervisor -->
                <div id="co_supervisor_div">
                    <!--
                        <select class="form-control co_supervisor">
                        <option value='-1'> </option>
                        @if ($teachers->count())
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
                            @endforeach
                        @endif
                    </select>
                    -->
                    <input type="hidden" id="co_supervisors" name="co_supervisors" value="{{ (empty(old('co_supervisors')) ? $current_project->co_supervisors :  old('co_supervisors')) }}">
                </div>

                <!-- Icons for adding/removing cosupervisor input -->
                <div class="pull-right">
                    <span id="remove_cosupervisor" class="glyphicon glyphicon-trash"></span>
                    <span id="add_cosupervisor" class="glyphicon glyphicon-plus"></span>
                </div>

                </div>
            <!-- End of the fourth block -->
            </div>


            <!-- Submit options -->
            <div class="col-lg-12">
                <div class="col-lg-4">
                {{--
                --}}
                    <button type="submit" id="save_project" class="btn btn-default btn-lg btn-block">{{ trans('project.save_button') }}</button>
                </div>
                <div class="col-lg-4">
                    {{--
                    <button type="button" class="btn btn-default btn-lg btn-block">
                        <span class="glyphicon glyphicon-share-alt" style="font-size:15px;" aria-hidden="true"></span> Jaga teistega
                    </button>
                    --}}
                </div>
                <div class="col-lg-4">
                    <button type="submit" id="submit_project" class="btn btn-info btn-lg btn-block">{{ trans('project.submit_button') }}</button>
                </div>
                
                <!-- hidden submit button to trigger form validation after using preventDefault() -->
                <div style="display:none">
                    <button id="hidden_project_form_submit" type="submit" name="submit_project" value="true"></button>
                </div>
                <div style="display:none">
                    <button id="hidden_project_form_save" type="submit" name="save_project" value="true"></button>
                </div>
            </div>


    
            @php
                $members_count=0;
            @endphp
            <!-- Current Projects -->
            @if (count($current_project->users) > 0)
                <div class="panel panel-default">
                        <div class="panel-heading">
                            {{trans('search.team')}}
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-responsive project-table">
                                    <thead>
                                    <th>{{trans('project.user')}}</th>
                                    <th>{{trans('login.email')}}</th>
                                    <th>{{trans('project.course')}}</th>
                                    @if(!Auth::user()->is('project_moderator'))
                                        <th>&nbsp;</th>
                                    @endif
                                    </thead>
                                    <tbody>

                                    @foreach ($current_project->users as $user)
                                        <tr>
                                            @if ( $user->pivot->participation_role == 'member' )
                                                @php
                                                    $members_count++;
                                                @endphp
                                                <td class="table-text"><div>{{ getUserName($user) }}</div></td>
                                                <td class="table-text"><div>{{ getUserEmail($user) }}</div></td>
                                                <td>
                                                    @if(!$user->courses->isEmpty())
                                                        @foreach($user->courses as $course)
                                                            <span class="label label-success">{{ getCourseName($course) }}</span>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                @if(!Auth::user()->is('project_moderator'))
                                                    <td>
                                                        <form class="delete-user" action="{{ url('project/'.$current_project->id).'/unlink/'.$user->id }}" method="POST">
                                                            {{ csrf_field() }}


                                                        </form>
                                                        <button type="submit" id="delete-user-button" class="btn btn-danger pull-right">
                                                            <i class="fa fa-btn fa-unlink"></i>{{trans('project.delete')}}
                                                        </button>

                                                    </td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                @if($members_count>0)
                    @if(!Auth::user()->is('project_moderator'))
                        <div  class="panel email-list panel-default">
                            <div class="panel-heading">
                                <div>{{trans('search.team_emails')}}</div>
                                <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
                            </div>
                            <div class="panel-body">
                                <div class="col-xs-8 mailto-list">
                                    @php
                                        $members_emails = '';
                                    @endphp
                                    @foreach ($current_project->users as $user)
                                        @if ( $user->pivot->participation_role == 'member' )
                                            @php
                                                $members_emails .=getUserEmail($user).',';
                                            @endphp
                                        @endif
                                    @endforeach


                                    <div class="form-group nomargin">
                                        <input class="form-control" name="share_url" title="Members emails" value="{{$members_emails}}">
                                    </div>

                                </div>
                                <div class="col-xs-4">

                                    <a href="mailto:{{$members_emails}}" class="btn btn-info pull-right" role="button">{{trans('search.send_to_all_button')}}</a>
                                </div>



                            </div>
                        </div>

                    @endif



                    {{--Making groups from project team--}}
                    <div class="panel panel-default" id="project-groups-panel">
                        <div class="panel-heading">
                            {{trans('project.project_groups')}}
                        </div>

                        <div class="panel-body project-groups">
                            @if(count($current_project->groups)<=3)
                            <h3>{{trans('project.add_group')}}</h3>
                            <form action="{{ url('project/'.$current_project->id.'/add-group') }}" method="POST" class="form-horizontal new-project ">
                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">{{trans('project.new_group_name')}}</label>

                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-btn fa-users"></i>{{trans('project.add_button')}}
                                        </button>
                                    </div>
                                </div>


                            </form>
                            @endif

                            <h3>{{trans('project.assign_to_groups')}}</h3>

                            <div class="col-sm-6">
                                <div class="well">
                                    <h4>{{trans('project.not_in_group')}}</h4>
                                    <ul class="list-group" group-id="project_all_members" id="project_all_members">
                                    @foreach ($current_project->users as $user)
                                        @if ( $user->pivot->participation_role == 'member' )
                                            @if(userBelongsToGroup($user) == false)
                                                <li class="list-group-item" user-id="{{$user->id}}"><span class="drag-handle">☰</span> {{getUserName($user)}}</li>
                                            @endif
                                        @endif
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            @if (count($current_project->groups) > 0)
                                @foreach ($current_project->groups as $group)
                                    <div class="col-sm-6">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-sm-6" project-id="{{$current_project->id}}"><h3><a href="#" class="group-name" data-type="text" data-pk="{{$group->id}}" data-url="{!! url('api/group/rename') !!}">{{$group->name}}</a></h3></div>
                                                <div class="col-sm-6"><h3><a href="{{url('/project/'.$current_project->id.'/group/delete/'.$group->id)}}" data-method="delete" data-token="{{csrf_token()}}"> <i class="fa fa-trash pull-right"></i></a></h3></div>
                                            </div>
                                            <ul class="list-group project-group" group-id="{{$group->id}}">
                                                @foreach($group->users as $user)
                                                    <li class="list-group-item" user-id="{{$user->id}}"><span class="drag-handle">☰</span> {{getUserName($user)}}</li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </div>

                @endif
            @endif



            @if($members_count>0)
                    @if (projectHasGroupsWithMembers($current_project))

                    <div class="col-lg-12 text-center">
                        <div class="btn-group">
                            <a class="btn btn-lg btn-primary not-empty" id="groups-finish-button" href="{{ url('project/'.$current_project->id.'/finish') }}"><i class="fa fa-btn fa-flag-checkered"></i>{{trans('project.finish_project_button')}}</a>
                        </div>
                    </div>

                    @else
                    <div class="col-lg-12 text-center">
                        <div class="btn-group">
                            <a class="btn btn-lg btn-primary" id="groups-finish-button" href="{{ url('project/'.$current_project->id.'/finish') }}"><i class="fa fa-btn fa-flag-checkered"></i>{{trans('project.finish_project_button')}}</a>
                        </div>
                    </div>


                    @endif
            @endif
        </div>
    </div>
@endsection