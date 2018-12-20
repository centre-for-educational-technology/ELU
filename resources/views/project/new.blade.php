@extends('layouts.app')

@section('content')
<!-- Pealkiri -->

<div class="container">
<div class="sisu">
<div class="container-fluid">

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
                <!-- General comments about the project from LIFE coordinators -->
                <p></p>
            </div>
        </div>

        <?php $startingLanguage = App::getLocale(); ?>
        
        {{--
            <div class="row xtr-padding-btm">
                <div class="col-sm-7" ></div>
                <div class="col-sm-2" >
                    <div class="p-light">Hetkel avatud:</div>
                    <div class="p-light">KASUTAJANIMI poolt</div>
                </div>
                <div class="col-sm-3 p-light" >
                    <div class="p-light">Salvestatud :</div>
                    <div class="p-light">21-04-2018 22:45:06</div>
                    <div class="p-light">KASUTAJANIMI poolt</div>
                </div>
            </div>
        --}}

        <div class="row">
            <div class="col-sm-1 col-lg-2"> </div>
            <div class="col-sm-11 col-lg-10" >
                <h1>{{trans('project.adding')}}</h1>
                <div class="show-info-p h4">
                    <span id="open_learning_outcomes" class="glyphicon glyphicon-triangle-right"></span><span id="close_learning_outcomes" class="glyphicon glyphicon-triangle-bottom unseen"></span>{{ trans('project.about_fulfilling_expectations') }}
                </div>
                <div id="learning_outcomes" class="show-info-p p-light unseen"> {{ trans('project.expectations_to_meet_for') }}
                    <ul>
                        <li>{{ trans('project.expectations_to_meet_for_student_1') }}</li>
                        <li>{{ trans('project.expectations_to_meet_for_student_2') }}</li>
                        <li>{{ trans('project.expectations_to_meet_for_student_3') }}</li>
                        <li>{{ trans('project.expectations_to_meet_for_student_4') }}</li>
                        <li>{{ trans('project.expectations_to_meet_for_student_5') }}</li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Project language selection -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-sm-5 col-lg-5">
                <div class="input-element">
                <label class="h3 left">{{ trans('project.active_language_selection') }}
                </label>
                </div>
            </div>
            <div class="col-sm-5 col-lg-5" ></div>
        </div>

        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-sm-5 col-lg-5">
                <div class="input-element">
                    <input type="checkbox" name="project_in_estonian" class="hidden" id="languageChoiceET" value="true" checked>
                    <button class="btn-check full-col" id="btnLanguageET">Eesti keel</button>
                </div>
            </div>
            <div class="col-sm-5 col-lg-5">
                <div class="input-element">
                <div></div>
                    <input type="checkbox" name="project_in_english" class="hidden" id="languageChoiceEN" value="true" checked>
                    <button class="btn-check full-col" id="btnLanguageEN">English</button>
                </div>
            </div>
        </div>


        <!-- PROJECT NAME -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Project name in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label class="h3 left">{{ trans('project.name') }} *
                        <span class="tooltiptext">{{ trans('project.name_hover') }}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Project name input in Estonian -->
                    <input type="text" name="name_et" value="{{ old('name_et') }}" class="input-field">
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
                    <input type="text" name="name_en" value="{{ old('name_en') }}" class="input-field">
                    <div class="tool-tip">{{ trans('project.name_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        
        </div>

        <!-- DESCRIPTION -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Project description in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label for="description_et" class="h3 left">{{ trans('project.description') }} *
                        <span class="tooltiptext">{{ trans('project.description_hover') }}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Project description input in Estonian -->
                    <textarea id="description_et" name="description_et" cols="30" rows="10">{!! old('description_et') !!}</textarea>
                    <div class="tool-tip">{{ trans('project.description_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <!-- Project description in English -->
            <div class="col-sm-5 col-lg-5 form_english" > 
                <?php App::setLocale('en'); ?>
                <div class="input-element">
                    <label for="description_en" class="h3 left">{{ trans('project.description') }} *
                        <span class="tooltiptext">{{ trans('project.description_hover') }}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Project description input in English -->
                    <textarea id="description_en" name="description_en" cols="30" rows="10">{!! old('description_en') !!}</textarea>
                    <div class="tool-tip">{{ trans('project.description_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        </div>


        <!-- PROJECT OUTCOME -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Project outcome in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label for="project_outcomes_et" class="h3 left">{{ trans('project.outcomes') }} *
                        <span class="tooltiptext">{{trans('project.outcomes_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Project outcome input in Estonian -->
                    <textarea id="project_outcomes_et" name="project_outcomes_et" cols="30" rows="10">{!! old('project_outcomes_et') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <!-- Project outcome in English -->
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('en'); ?>
                <div class="input-element">
                    <label for="project_outcomes_en" class="h3 left">{{ trans('project.outcomes') }} *
                        <span class="tooltiptext">{{trans('project.outcomes_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Project outcome input in English -->
                    <textarea id="project_outcomes_en" name="project_outcomes_en" cols="30" rows="10">{!! old('project_outcomes_en') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        </div>


        <!-- INTERDISCIPLINARY APPROACH -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Interdisciplinary approach in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label for="interdisciplinary_approach_et" class="h3 left">{{ trans('project.interdisciplinary_desc') }} *
                        <span class="tooltiptext">{{trans('project.interdisciplinary_desc_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Interdisciplinary approach input in Estonian -->
                    <textarea id="interdisciplinary_approach_et" name="interdisciplinary_approach_et" cols="30" rows="10">{!! old('interdisciplinary_approach_et') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <!-- Interdisciplinary approach in English -->
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('en'); ?>
                <div class="input-element">
                    <label for="interdisciplinary_approach_en" class="h3 left">{{ trans('project.interdisciplinary_desc') }} *
                        <span class="tooltiptext">{{trans('project.interdisciplinary_desc_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Interdisciplinary approach input in English -->
                    <textarea id="interdisciplinary_approach_en" name="interdisciplinary_approach_en" cols="30" rows="10">{!! old('interdisciplinary_approach_en') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        </div>


        <!-- TAGS -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Tags in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label for="tags_et" class="h3 left">{{ trans('project.keywords') }} *
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Tags input in Estonian -->
                    <input type="text" class="input-field tags_et">
                    <div class="tool-tip">{{ trans('project.keywords_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                    <div class="clear-left"></div>
                    <!-- Div to show the selected tags_et to the user -->
                    <div id="tags_et_output" class="left"></div>
                    <!-- To save the tags -->
                    <input type="hidden" name="keywords_et" id="keywords_et" value="{{ old('keywords_et') }}">
                </div>
            </div>
            <!-- Tags in English -->
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label for="tags_en" class="h3 left">{{ trans('project.keywords') }} *
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Tags input in English -->
                    <input type="text" class="input-field tags_en">
                    <div class="tool-tip">{{ trans('project.keywords_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                    <div class="clear-left"></div>
                    <!-- Div to show the selected tags_en to the user -->
                    <div id="tags_en_output" class="left"></div>
                    <!-- To save the tags -->
                    <input type="hidden" name="keywords_en" id="keywords_en" value="{{ old('keywords_en') }}">
                </div>
            </div>
        </div>


        <!-- ADDITIONAL INFORMATION -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Additional information in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label for="additional_info_et" class="h3 left">{{ trans('project.extra_info') }}
                        <span class="tooltiptext">{{trans('project.extra_info_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Additional information input in Estonian -->
                    <textarea id="additional_info_et" name="additional_info_et" cols="30" rows="10">{!! old('additional_info_et') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <!-- Additional information in English -->
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('en'); ?>
                <div class="input-element">
                    <label for="additional_info_en" class="h3 left">{{ trans('project.extra_info') }}
                        <span class="tooltiptext">{{trans('project.extra_info_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Additional information input in English -->
                    <textarea id="additional_info_en" name="additional_info_en" cols="30" rows="10">{!! old('additional_info_en') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        </div>


        <!-- COMMENT FOR LIFE COORDINATORS -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Comment for LIFE coordinators in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label for="comment_for_coordinators_et" class="h3 left">{{ trans('project.comment_for_coordinators') }}
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Comment for LIFE coordinators input in Estonian -->
                    <textarea id="comment_for_coordinators_et" name="comment_for_coordinators_et" cols="30" rows="10">{!! old('comment_for_coordinators_et') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <!-- Comment for LIFE coordinators in English -->
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('en'); ?>
                <div class="input-element">
                    <label for="comment_for_coordinators_en" class="h3 left">{{ trans('project.comment_for_coordinators') }}
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Comment for LIFE coordinators input in English -->
                    <textarea id="comment_for_coordinators_en" name="comment_for_coordinators_en" cols="30" rows="10">{!! old('comment_for_coordinators_en') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        </div>


        <!-- PARTNERS -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Partner(s) in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label for="partners_et" class="h3 left">{{ trans('project.partners') }}
                        <span class="tooltiptext">{{trans('project.partners_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Partner(s) input in Estonian -->
                    <input type="text" name="partners_et" value="{{ old('partners_et') }}" class="input-field">
                    <div class="tool-tip">{{ trans('project.partners_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <!-- Partner(s) in English -->
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('en'); ?>
                <div class="input-element">
                    <label for="partners_en" class="h3 left">{{ trans('project.partners') }}
                        <span class="tooltiptext">{{trans('project.partners_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <!-- Partner(s) input in English -->
                    <input type="text" name="partners_en" value="{{ old('partners_en') }}" class="input-field">
                    <div class="tool-tip">{{ trans('project.partners_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        </div>


        <!-- PROJECT SEMESTER(S) -->
        <?php App::setLocale($startingLanguage); ?>
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-sm-5 col-lg-5">
                <div class="input-element">
                    <label class="h3 left">{{ trans('project.duration') }} *
                        <span class="tooltiptext">{{trans('project.duration_hover')}}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <div class="semesters">
                        <input type="radio" class="unseen" name="study_term" value="0" id="duration_0_radio" checked>
                        <button type="button" class="full-col btn-check study_term_button" id="duration_0">{{ trans('project.autumn_semester') }}</button>
                        <input type="radio" class="unseen" name="study_term" value="2" id="duration_2_radio">
                        <button type="button" class="full-col btn-check study_term_button" id="duration_2">{{ trans('project.autumn_spring') }}</button>
                        <input type="radio" class="unseen" name="study_term" value="1" id="duration_1_radio">
                        <button type="button" class="full-col btn-check study_term_button" id="duration_1">{{ trans('project.spring_semester') }}</button>
                        <input type="radio" class="unseen" name="study_term" value="3" id="duration_3_radio">
                        <button type="button" class="full-col btn-check study_term_button" id="duration_3">{{ trans('project.spring_autumn') }}</button>
                    </div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <div class="col-sm-5 col-lg-5"></div>
            <div class="col-sm-1"></div>
        </div>


        <!-- ADDITIONAL INFO ABOUT MEETINGS -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Additional info about the meetings in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div class="input-element">
                    <label class="h3 left">{{ trans('project.meetings_info') }}
                        <span class="red-light unseen"></span>
                    </label>
                    <textarea name="meetings_info_et"cols="30" rows="10">{!! old('meetings_info_et') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <!-- Additional info about the meetings in English -->
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('en'); ?>
                <div class="input-element">
                    <label class="h3 left">{{ trans('project.meetings_info') }}
                        <span class="red-light unseen"></span>
                    </label>
                    <textarea name="meetings_info_en"cols="30" rows="10">{!! old('meetings_info_en') !!}</textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
        </div>


        <!-- MEETINGS INFO -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <!-- Meetings info in Estonian -->
            <div class="col-sm-5 col-lg-5 form_estonian">
                <?php App::setLocale('et'); ?>
                <div id='first_meeting_et' class="input-element">
                    <label class="h3 left">{{ trans('project.meeting_dates') }} *
                        <span class="tooltiptext">{{ trans('project.meeting_dates_hover') }}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <div style="clear:left"></div>
                    <input type="text" class="date meeting_date_et">
                    <!-- Icons for adding/removing another Estonian meeting input field -->
                    <div class="date-tools">
                        <span id="add_meeting_et" class="glyphicon glyphicon-plus"></span>
                        <span id="remove_meeting_et" class="glyphicon glyphicon-trash"></span>
                    </div>
                    <textarea class="meeting_info_et" cols="30" rows="10"></textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
                <div id='other_meetings_et'></div>
                <input id="meetings_et" type="hidden" name="meetings_et" value="{{ old('meetings_et') }}">
            </div>
            <div class="col-sm-5 col-lg-5 form_english">
                <?php App::setLocale('en'); ?>
                <div id='first_meeting_en' class="input-element">
                    <label class="h3 left">{{ trans('project.meeting_dates') }} *
                        <span class="tooltiptext">{{ trans('project.meeting_dates_hover') }}</span>
                        <span class="red-light unseen"></span>
                    </label>
                    <div style="clear:left"></div>
                    <input type="text" class="date meeting_date_en">
                    <!-- Icons for adding/removing another Estonian meeting input field -->
                    <div class="date-tools">
                        <span id="add_meeting_en" class="glyphicon glyphicon-plus"></span>
                        <span id="remove_meeting_en" class="glyphicon glyphicon-trash"></span>
                    </div>
                    <textarea class="meeting_info_en" cols="30" rows="10"></textarea>
                    <div class="validation-error unseen">validation-error</div>
                </div>
                <div id='other_meetings_en'></div>
                <input id="meetings_en" type="hidden" name="meetings_en" value="{{ old('meetings_en') }}">
            </div>
        </div>


        <?php App::setLocale($startingLanguage); ?>


        <!-- FEATURED VIDEO LINK -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-sm-5 col-lg-5">
                <div class="input-element">
                    <label for="featured_video_link" class="h3 left">{{ trans('project.video_link') }}
                        <span class="red-light unseen"></span>
                    </label>
                    <input type="text" name="featured_video_link" value="{{ old('featured_video_link') }}" class="input-field">
                    <div class="tool-tip">{{ trans('project.video_link_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <div class="col-sm-5 col-lg-5"></div>
        </div>


        <!-- FEATURED IMAGE -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-sm-5 col-lg-5">
                <div class="input-element">
                    <label for="featured_image" class="h3">{{ trans('project.featured_image') }}
                        <span class="red-light unseen"></span>
                    </label>
                    <input type="file" name="featured_image" value="{{ old('featured_image') }}" class="input-field input-file">
                    <div class="tool-tip">{{ trans('project.video_link_tooltip') }}</div>
                    <div class="validation-error unseen">validation-error</div>
                </div>
            </div>
            <div class="col-sm-5 col-lg-5"></div>
        </div>


        <!-- SUPERVISOR -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-sm-5 col-lg-5">
                <div class="input-element">
                    <p><label for="supervisor" class="h4 control-label">{{ trans('project.supervisor') }} *</label></p>
                    <select id="supervisor" class="form-control" name="supervisor">
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
                </div>
            </div>
            <div class="col-sm-5 col-lg-5"></div>
        </div>


        <!-- SUPERVISING STUDENT -->
        @if (Auth::user()->is('student') && !Auth::user()->is('oppejoud'))
            <!--
            <p><label for="supervising_student" class="h4 control-label">{{ trans('project.supervising_student') }}</label></p>
            -->
            <input class="form-control" type="hidden" name="supervising_student" value="{{ Auth::user()->id }}">
        @endif

        <!-- COSUPERVISOR -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-sm-5 col-lg-5">
                <div class="input-element">

                    <p><label for="co_supervisor" class="h4 control-label">{{ trans('project.cosupervisor') }}</label></p>
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
                        <input type="hidden" id="co_supervisors" name="co_supervisors" value="{{ old('co_supervisors') }}">
                    </div>

                    <!-- Icons for adding/removing cosupervisor input -->
                    <div class="pull-right">
                        <span id="add_cosupervisor" class="glyphicon glyphicon-plus"></span>
                        <span id="remove_cosupervisor" class="glyphicon glyphicon-trash"></span>
                    </div>

                </div>
            </div>
            <div class="col-sm-5 col-lg-5"></div>
        </div>

        <!-- SUBMIT OPTIONS -->
        <div class="row form-row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-sm-5 col-lg-5"> 
                <div class="input-element xtr-padding-btm">
                    <input type="submit" id="submit_project" class="submit-form" value="{{ trans('project.submit_button') }}">
                    <input type="submit" id="save_project" class="btn btn-default btn-lg btn-block" value="{{ trans('project.save_button') }}">
                    <div class="btn-helper-center unseen">
                        <div class="left">salvesta</div>
                        <div class="right">jaga</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-lg-5" ></div>
            <div class="col-sm-1" ></div>
        </div>

        <div class="col-lg-12">
            <div class="col-lg-4">
            {{--
                <button type="submit" id="save_project_old_button" class="btn btn-default btn-lg btn-block">{{ trans('project.save_button') }}</button>
            --}}
            </div>
            <div class="col-lg-4">
                {{--
                <button type="button" class="btn btn-default btn-lg btn-block">
                    <span class="glyphicon glyphicon-share-alt" style="font-size:15px;" aria-hidden="true"></span> Jaga teistega
                </button>
                --}}
            </div>
            <div class="col-lg-4">
            {{--
                <button type="submit" id="submit_project_old_button" class="btn btn-info btn-lg btn-block">{{ trans('project.submit_button') }}</button>
            --}}
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
</div>
</div>

@endsection