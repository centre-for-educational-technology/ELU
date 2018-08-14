@extends('layouts.app')

@section('content')
<!-- Pealkiri -->
<div class="col-log-12 col-lg-offset-2">
    <h2 class="h2 class-uppercase"><b>{{trans('project.adding')}}</b></h2>
</div>

<div class="container">

    <!-- Display Validation Errors -->
    @include('common.errors')

    @if (Auth::user()->is('student') && !Auth::user()->is('oppejoud'))
    <form action="{{ url('student/project/new') }}" id="project_form" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
        {{ csrf_field() }}
    @else
    <form action="{{ url('project/new') }}" id="project_form" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
        {{ csrf_field() }}
    @endif

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
        <div class="col-lg-12">

            <!-- Project name in Estonian -->
            <div class="col-lg-6 form_estonian">

                <!-- Project name input in Estonian -->
                <?php App::setLocale('et'); ?>
                <div class="form-group">
                    <p><label for="name_et">{{ trans('project.name') }} *</label></p>
                    <input class="form-control" type="text" name="name_et" value="{{ old('name_et') }}">
                </div>

                <!-- Comment for name in Estonian -->
                <div id="comment_name_et"></div>

            </div>

            <!-- Project name in English -->
            <div class="col-lg-6 form_english">

                <!-- Project name input in English -->
                <?php App::setLocale('en'); ?>
                <div class="form-group">
                    <p><label for="name_en">{{ trans('project.name') }} *</label></p>
                    <input class="form-control" type="text" name="name_en" value="{{ old('name_en') }}">
                </div>

                <!-- Comment for name in English -->
                <div id="comment_name_en"></div>

            </div>
        </div>


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
                    <textarea class="mceSimple" id="description_et" name="description_et">{!! old('description_et') !!}</textarea>
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
                    <textarea class="mceSimple" id="description_en" name="description_en">{!! old('description_en') !!}</textarea>
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
                    <textarea class="mceSimple" id="project_outcomes_et" name="project_outcomes_et">{!! old('project_outcomes_et') !!}</textarea>
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
                    <textarea class="mceSimple" id="project_outcomes_en" name="project_outcomes_en">{!! old('project_outcomes_en') !!}</textarea>
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
                    <textarea class="mceSimple" id="interdisciplinary_approach_et" name="interdisciplinary_approach_et">{!! old('interdisciplinary_approach_et') !!}</textarea>
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
                    <textarea class="mceSimple" id="interdisciplinary_approach_en" name="interdisciplinary_approach_en">{!! old('interdisciplinary_approach_en') !!}</textarea>
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
                <input type="hidden" name="keywords_et" id="keywords_et" value="{{ old('keywords_et') }}">

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
                <input type="hidden" name="keywords_en" id="keywords_en" value="{{ old('keywords_en') }}">

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
                    <textarea class="mceSimple" name="additional_info_et" >{!! old('additional_info_et') !!}</textarea>
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
                    <textarea class="mceSimple" name="additional_info_en">{!! old('additional_info_en') !!}</textarea>
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
                    <textarea class="mceSimple" name="comment_for_coordinators_et">{!! old('comment_for_coordinators_et') !!}</textarea>
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
                    <textarea class="mceSimple" name="comment_for_coordinators_en">{!! old('comment_for_coordinators_en') !!}</textarea>
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
                    <input class="form-control" type="text" name="partners_et" value="{{ old('partners_et') }}">
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
                    <input class="form-control" type="text" name="partners_en" value="{{ old('partners_en') }}">
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
            <div class="col-lg-6">
                <button type="button" id="duration_0" class="btn btn-info btn-lg btn-block study_term_button">{{ trans('project.autumn_semester') }}</button>
                <button type="button" id="duration_1" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.autumn_spring') }}</button>
            </div>

            <div class="col-lg-6">
                <button type="button" id="duration_2" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.spring_semester') }}</button>
                <button type="button" id="duration_3" class="btn btn-default btn-lg btn-block study_term_button">{{ trans('project.spring_autumn') }}</button>
            </div>
        </div>
        <div style="display:none">
            <input id="duration_0_radio" name="study_term" type="radio" value="0" checked>
            <input id="duration_1_radio" name="study_term" type="radio" value="1">
            <input id="duration_2_radio" name="study_term" type="radio" value="2">
            <input id="duration_3_radio" name="study_term" type="radio" value="3">
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
                    {{ trans('project.meetings_info') }} *
                </label>
                <textarea rows="5" name="meetings_info_et" style="width: 100%;">{!! old('meetings_info_et') !!}</textarea>
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
                            <textarea rows="5" style="width: 100%;" class="meeting_info_et"></textarea>
                        </div>
                    </div>
                </div>
                <div id='other_meetings_et'>
                </div>
                <input id="meetings_et" type="hidden" name="meetings_et" value="{{ old('meetings_et') }}">
            </div>

            <!-- Icons for adding/removing another Estonian meeting input field -->
            <div class="col-lg-12">
                <div class="pull-right">
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
                    {{ trans('project.meetings_info') }} *
                </label>
                <textarea rows="5" name="meetings_info_en" style="width: 100%;">{!! old('meetings_info_en') !!}</textarea>
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
                            <textarea rows="5" style="width: 100%;" class="meeting_info_en"></textarea>
                        </div>
                    </div>
                </div>
                <div id='other_meetings_en'>
                </div>
                <input id="meetings_en" type="hidden" name="meetings_en" value="{{ old('meetings_en') }}">
            </div>

            <!-- Icons for adding/removing another English meeting input field -->
            <div class="col-lg-12">
                <div class="pull-right">
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
        <input class="form-control" type="text" name="featured_video_link" value="{{ old('featured_video_link') }}">

        <!-- Featured image -->
        <p><label for="featured_image">{{ trans('project.featured_image') }}</label></p>

        <input type="file" name="featured_image" id="featured_image" class="form-control" value="{{ old('featured_image') }}">

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
                        @if ($author == $teacher->id)
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
            <select class="form-control co_supervisor">
                <option value='-1'> </option>
                @if ($teachers->count())
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" id="co_supervisors" name="co_supervisors" value="{{ old('co_supervisors') }}">
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

    </form>

@endsection
