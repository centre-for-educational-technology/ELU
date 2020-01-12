@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus"></i> {{trans('project.add')}}</h3>
                </div>

                <div class="panel-body">

                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Project Form -->
                    <form action="{{ url('project/new')}}" id="project-form" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- Project Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{trans('project.name')}} *</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <!-- Project Embedded media -->
                        <div class="form-group">
                            <label for="embedded" class="col-sm-3 control-label">{{trans('project.video_link')}} <p>https://youtu.be/...</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="embedded" id="embedded" class="form-control" value="{{  old('embedded') }}">
                            </div>
                        </div>

                        <!-- Project Featured image -->
                        <div class="form-group">
                            <label for="featured_image" class="col-sm-3 control-label">{{trans('project.featured_image')}} <p>{{trans('project.portrait_orientation')}}</p></label>

                            <div class="col-sm-6">

                                <input type="file" name="featured_image" id="featured_image" class="form-control" value="{{ old('featured_image') }}">

                            </div>
                        </div>

                        <!-- Project description -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">{{trans('project.description')}} *</label>

                            <div class="col-sm-6">

                                <textarea name="description" id="description" class="form-control mceSimple">{!! old('description') !!}</textarea>
                            </div>
                        </div>


                        <!-- Project aim -->
                        <div class="form-group">
                            <label for="aim" class="col-sm-3 control-label">{{trans('project.aim')}} *</label>

                            <div class="col-sm-6">

                                <textarea name="aim" id="aim" class="form-control mceSimple">{!! old('aim') !!}</textarea>
                            </div>
                        </div>


                        <!-- Project Interdisciplinary Desc -->
                        <div class="form-group">
                            <label for="interdisciplinary_desc" class="col-sm-3 control-label">{{trans('project.interdisciplinary_desc')}}
                                <i class="fa fa-question-circle" style="cursor: pointer" data-toggle="popover" data-placement="top" data-content="{{trans('project.interdisciplinary_desc_desc')}}"></i>
                            </label>

                            <div class="col-sm-6">

                                <textarea name="interdisciplinary_desc" id="interdisciplinary_desc" class="form-control mceSimple">{!! old('interdisciplinary_desc') !!}</textarea>
                            </div>
                        </div>


                        <!-- Project Novelty Desc -->
                        <div class="form-group">
                            <label for="novelty_desc" class="col-sm-3 control-label">{{trans('project.novelty_desc')}} *</label>

                            <div class="col-sm-6">

                                <textarea name="novelty_desc" id="novelty_desc" class="form-control mceSimple">{!! old('novelty_desc') !!}</textarea>
                            </div>
                        </div>


                        <!-- Project Outcomes -->
                        <div class="form-group">
                            <label for="project_outcomes" class="col-sm-3 control-label">{{trans('project.outcomes')}} *</label>


                            <div class="col-sm-6">
                                <textarea name="project_outcomes" id="project_outcomes" class="form-control mceSimple">{!! old('project_outcomes') !!}</textarea>
                            </div>
                        </div>

                        <!-- Expectations for students -->
                        <div class="form-group">
                            <label for="student_expectations" class="col-sm-3 control-label">{{trans('project.student_expectations')}}</label>

                            <div class="col-sm-6">
                                <textarea name="student_expectations" id="student_expectations" class="form-control mceSimple">
                                    @if(empty( old('student_expectations')))
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_1')}}</i></p>
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_2')}}</i></p>
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_3')}}</i></p>
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_4')}}</i></p>
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_5')}}</i></p>
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_6')}}</i></p>
                                        <p class="mceNonEditable">{{trans('project.student_expectations_desc')}}</p>
                                    @else
                                        {!! old('student_expectations') !!}
                                    @endif
                                </textarea>
                            </div>
                        </div>


                        <div class="well well-sm">

                            <!-- Project meeting info -->
                            <div class="form-group">
                                <label for="meeting_info" class="col-sm-3 control-label">{{trans('project.meeting_info')}}</label>

                                <div class="col-sm-6">
                                    <input type="text" name="meeting_info" id="meeting_info" class="form-control" value="{{  old('meeting_info') }}">
                                </div>
                            </div>

                            <!-- Dates for group meetings -->
                            <div class="form-group">
                                <label for="meetings_dates_text" class="col-sm-3 control-label">{{trans('project.meetings_dates')}} *</label>

                                <div class="col-sm-6">
                                    <input type="text" name="meetings_dates_text" id="meetings_dates_text" class="form-control" value="{{  !empty(old('meetings_dates_text'))? old('meetings_dates_text') : '' }}">
                                </div>
                            </div>


                            <!-- Presentation of project results -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: right">{{trans('project.presentation_of_results')}}</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="presentation_results" name="presentation_results">
                                        @if ( old('presentation_results')) == 0)
                                        <option value="0" selected>{{trans('project.presentation_of_results_december')}}</option>
                                        @else
                                            <option value="0">{{trans('project.presentation_of_results_december')}}</option>
                                        @endif

                                        @if ( old('presentation_results')) == 1)
                                        <option value="1" selected>{{trans('project.presentation_of_results_may')}}</option>
                                        @else
                                            <option value="1">{{trans('project.presentation_of_results_may')}}</option>
                                        @endif

                                    </select>
                                </div>

                            </div>

                        </div>


                        <!-- Study term -->
                        <div class="form-group">
                            <label for="study_term" class="col-sm-3 control-label">{{trans('project.duration')}} *</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="study_term" name="study_term">
                                    @if ( old('study_term')) == 0)
                                        <option value="0" selected>{{trans('project.autumn_semester')}}</option>
                                    @else
                                        <option value="0">{{trans('project.autumn_semester')}}</option>
                                    @endif

                                    @if ( old('study_term')) == 1)
                                        <option value="1" selected>{{trans('project.spring_semester')}}</option>
                                    @else
                                        <option value="1">{{trans('project.spring_semester')}}</option>
                                    @endif

                                    @if ( old('study_term')) == 2)
                                        <option value="2" selected>{{trans('project.autumn_spring')}}</option>
                                    @else
                                        <option value="2">{{trans('project.autumn_spring')}}</option>
                                    @endif

                                    @if ( old('study_term')) == 3)
                                        <option value="3" selected>{{trans('project.spring_autumn')}}</option>
                                    @else
                                        <option value="3">{{trans('project.spring_autumn')}}</option>
                                    @endif

                                </select>
                            </div>
                        </div>



                        <!-- Study year -->
                        <div class="form-group">
                            <label for="study_year" class="col-sm-3 control-label">{{trans('project.study_year')}} *</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="study_year" name="study_year">
                                    @if( old('study_year') == Carbon\Carbon::now()->year)
                                        <option value="{{Carbon\Carbon::now()->year}}" selected>{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>
                                        <option value="{{Carbon\Carbon::now()->year-1}}">{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                    @elseif(old('study_year') == Carbon\Carbon::now()->year-1)
                                        <option value="{{Carbon\Carbon::now()->year-1}}" selected>{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                        <option value="{{Carbon\Carbon::now()->year}}">{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>
                                    @else
                                        @if(Carbon\Carbon::now()->month >= 6)
                                            <option value="{{Carbon\Carbon::now()->year}}" selected>{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>
                                            <option value="{{Carbon\Carbon::now()->year-1}}">{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                        @else
                                            <option value="{{Carbon\Carbon::now()->year-1}}" selected>{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                            <option value="{{Carbon\Carbon::now()->year}}">{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>

                                        @endif
                                    @endif

                                </select>
                            </div>
                        </div>


                        <!-- Supervisors -->
                        <div class="form-group">
                            <label for="supervisors" class="col-sm-3 control-label">{{trans('project.supervisor')}} *</label>


                            <div class="col-sm-6">
                                <select class="js-example-basic-multiple form-control" id="supervisors" name="supervisors[]" multiple>
                                    @if ($teachers->count())

                                        @foreach($teachers as $teacher)

                                            @if(!empty(old('supervisors')))
                                                <option {{ in_array( $teacher->id, old('supervisors')) ? "selected":"" }} value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
                                            @else
                                                <option value="{{ $teacher->id }}" {{ $author == $teacher->id ? 'selected="selected"' : '' }}>{{ getUserName($teacher) }}</option>
                                            @endif

                                        @endforeach

                                    @endif
                                </select>
                            </div>
                        </div>


                        <!-- Co-supervisors -->
                        <div class="form-group">
                            <label for="cosupervisors" class="col-sm-3 control-label">{{trans('project.cosupervisor')}} <p>{{trans('project.one_per_line')}}</p></label>

                            <div class="col-sm-6">
                                <textarea name="cosupervisors" id="cosupervisors" class="form-control">{{ old('cosupervisors') }}</textarea>
                            </div>
                        </div>


                        <!-- Tags -->
                        <div class="form-group">
                            <label for="tags" class="col-sm-3 control-label">{{trans('project.keywords')}} *<p>{{trans('project.separated_with_commas')}}</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags') }}" data-role="tagsinput" />
                            </div>
                        </div>


                        <!-- Project deadline for joining -->
                        <div class="form-group">
                            <label for="join_deadline" class="col-sm-3 control-label">{{trans('project.deadline')}} *</label>
                            <div class='col-sm-6'>
                                <div class='input-group date' id='join_deadline'>

                                    <input type='text' class="form-control" name="join_deadline" id="join_deadline" value="{{ old('join_deadline') }}"/>
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>

                                </div>
                            </div>
                        </div>

                        <!-- Extra info -->
                        <div class="form-group">
                            <label for="extra_info" class="col-sm-3 control-label">{{trans('project.extra_info')}}</label>

                            <div class="col-sm-6">
                                <textarea name="extra_info" id="extra_info" class="form-control">{{ old('extra_info') }}</textarea>
                            </div>
                        </div>

                        <div class=" well well-sm">
                            <!-- Questions for students who want to join project -->
                            <h4><strong>{{ trans('project.questions_for_students') }}</strong></h4>
                            <div class="form-group">
                                <label for="join_q1" class="col-sm-3 control-label">{{ trans('project.question') }}1 *</label>

                                <div class="col-sm-6">
                                    <input type="text" name="join_q1" id="join_q1" class="form-control" value="{{trans('project.why_join')}}" readonly>
                                </div>
                            </div>

                            <!-- Student contribution -->
                            <div class="form-group">
                                <label for="join_q2" class="col-sm-3 control-label">{{ trans('project.question') }}2 *</label>

                                <div class="col-sm-6">
                                    <input type="text" name="join_q2" id="join_q2" class="form-control" value="{{trans('project.my_contribution')}}" readonly>
                                </div>
                            </div>

                            <!-- Student expectations -->
                            <div class="form-group">
                                <label for="join_q3" class="col-sm-3 control-label">{{ trans('project.question') }}3 *</label>

                                <div class="col-sm-6">
                                    <input type="text" name="join_q3" id="join_q3" class="form-control" value="{{trans('project.my_expectations')}}" readonly>
                                </div>
                            </div>

                            <!-- Additional question field 1 -->
                            <div class="form-group extra_q" hidden="true">
                                    <label for="join_extra_q1" class="col-sm-3 control-label">{{ trans('project.additional_question') }}1</label>
            
                                    <div class="col-sm-6">
                                        <input type="text" name="join_extra_q1" id="join_extra_q1" class="form-control" value="">
                                    </div>
                            </div>

                            <!-- Additional question field 2 -->
                            <div class="form-group extra_q" hidden="true">
                                    <label for="join_extra_q2" class="col-sm-3 control-label">{{ trans('project.additional_question') }}2</label>
            
                                    <div class="col-sm-6">
                                        <input type="text" name="join_extra_q2" id="join_extra_q2" class="form-control" value="">
                                    </div>
                            </div>
                            
                            {{-- Add and remove question buttons --}}
                            <p>
                                    <div class="">{{ trans('project.option_to_add') }}</div>
                            </p>
                            
                            <p>
                                <div class="col-sm-3"></div>
                                <button type="button" class="btn btn-default btn-sm add_question_field_button" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{trans('project.add_field')}}
                                </button>
                            </p>

                            <p>
                                <div class="col-sm-3"></div>
                                <button type="button" class="btn btn-default btn-sm remove_question_field_button" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> {{trans('project.delete')}}
                                </button>
                            </p>
                        </div>

                        <!-- max_members-->
                        <div class="form-group">
                            <label for="max_members" class="col-sm-3 control-label">{{trans('project.max_members')}} *</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="max_members" name="max_members">
                                    @for ($i=6;$i<=18;$i++)
                                        <option value="{{ $i }}" {{ $i==18 ? 'selected' : ''}}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>


                        <!-- Language-->
                        <div class="form-group">
                            <label for="language" class="col-sm-3 control-label">{{trans('project.language')}} *</label>

                            <div class="col-sm-6">
                                <input type="hidden" name="language" value="{{$project_language}}">
                                <select class="form-control" id="language" name="language" disabled>
                                    
                                    <option value="et" {{$project_language == 'et' ? 'selected' : ''}}>Eesti</option>

                                    <option value="en" {{$project_language == 'en' ? 'selected' : ''}}>English</option>

                                </select>
                            </div>
                        </div>


                        <!-- Status -->
                        <div class="form-group">
                            <label for="publishing_status" class="col-sm-3 control-label">{{trans('project.publishing')}} *</label>

                            <div class="col-sm-6">
                                <input type="hidden" name="publishing_status" value=0>
                                <select class="form-control" id="publishing_status" name="publishing_status" disabled>

                                    <option value="0" selected>{{trans('project.hidden')}}</option>

                                    <option value="1">{{trans('project.published')}}</option>

                                </select>

                                <!-- Tooltip letting users know why the project status is hidden at first -->
                                {{trans('project.reason_of_initial_hiddenness')}}

                            </div>
                        </div>


                        {{--<!-- Mendeley group link -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="group_link" class="col-sm-3 control-label">{{trans('project.mendeley_group_link')}}</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="group_link" id="group_link" class="form-control" value="{{  old('group_link') }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <!-- Get notifications -->
                        <div class="form-group">

                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="checkbox">
                                    <h4>
                                        <label>
                                            <input name="get_notifications" id="get_notifications" type="checkbox"  {{ (old('get_notifications') =='on' ? 'checked' : '' )}}> {{trans('project.get_notification')}}
                                        </label>
                                    </h4>
                                </div>

                            </div>
                        </div>


                        <!-- Add Project Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button id="submit-project-button" type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>{{trans('project.add_button')}}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <!-- Current Projects -->
            @if (count($projects) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{trans('project.my_projects')}}
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-responsive table-striped project-table">
                            <thead>
                            <th>{{trans('project.project')}}</th>
                            <th>&nbsp;</th>
                            <!--
                            <th>&nbsp;</th>
                            -->
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="table-text"><div>{{ $project->name }}</div></td>

                                    <!-- Project Delete Button -->
                                    <td>

                                        <form action="{{ url('project/'.$project->id.'/edit') }}" method="GET">
                                            {{ csrf_field() }}
                                            {{--{{ method_field('PATCH') }}--}}

                                            <button type="submit" class="btn btn-warning pull-right">
                                                <i class="fa fa-btn fa-pencil"></i>{{trans('project.edit')}}
                                            </button>
                                        </form>
                                    </td>
                                    <!--
                                    <td>
                                        <form class="delete-project" action="{{ url('project/'.$project->id.'/delete') }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}


                                        </form>
                                        <button type="submit" id="delete" class="btn btn-danger pull-right">
                                            <i class="fa fa-btn fa-trash"></i>{{trans('project.delete')}}
                                        </button>

                                    </td>
                                    -->
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
