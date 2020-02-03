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

                    <!-- Project Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{trans('project.name')}} *</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ (empty( old('name')) ? $current_project->name :  old('name')) }}">
                            </div>
                        </div>

                        <!-- Project Embedded media -->
                        <div class="form-group">
                            <label for="embedded" class="col-sm-3 control-label">{{trans('project.video_link')}} <p>https://youtu.be/...</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="embedded" id="embedded" class="form-control" value="{{ (empty( old('embedded')) ? $current_project->embedded :  old('embedded')) }}">
                            </div>

                            <button type="button" class="btn btn-default btn-sm" id="clear-embedded" style="margin-top: 5.5px">{{trans('project.delete')}}</button>


                        </div>




                        <!-- Project Featured image -->
                        <div class="form-group">

                            <label for="featured_image" class="col-sm-3 control-label">{{trans('project.featured_image')}} <p>{{trans('project.portrait_orientation')}}</p></label>



                            <div class="col-sm-6">
                                @if ((!empty($current_project->featured_image)))
                                    <p><img src="{{url('storage/projects_featured_images/'.$current_project->featured_image)}}" class="img-thumbnail featured-image-preview"></p>
                                @endif

                                <input type="file" name="featured_image" id="featured_image" class="form-control" value="{{ old('featured_image') }}">
                            </div>
                        </div>

                        <!-- Project Description -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">{{trans('project.description')}} *</label>

                            <div class="col-sm-6">

                                <textarea name="description" id="description" class="form-control mceSimple" onchange="pls">{!! (empty( old('description')) ? $current_project->description :  old('description')) !!}</textarea>
                            </div>
                        </div>


                        <!-- Project aim -->
                        <div class="form-group">
                            <label for="aim" class="col-sm-3 control-label">{{trans('project.aim')}} *</label>

                            <div class="col-sm-6">

                                <textarea name="aim" id="aim" class="form-control mceSimple">{!! (empty( old('aim')) ? $current_project->aim :  old('aim')) !!}</textarea>
                            </div>
                        </div>


                        <!-- Project Interdisciplinary Desc -->
                        <div class="form-group">
                            <label for="interdisciplinary_desc" class="col-sm-3 control-label">{{trans('project.interdisciplinary_desc')}}
                                <i class="fa fa-question-circle" style="cursor: pointer" data-toggle="popover" data-placement="top" data-content="{{trans('project.interdisciplinary_desc_desc')}}"></i>
                            </label>

                            <div class="col-sm-6">

                                <textarea name="interdisciplinary_desc" id="interdisciplinary_desc" class="form-control mceSimple">{!! (empty( old('interdisciplinary_desc')) ? $current_project->interdisciplinary_desc :  old('interdisciplinary_desc')) !!}</textarea>
                            </div>
                        </div>


                        <!-- Project Novelty Desc -->
                        <div class="form-group">
                            <label for="novelty_desc" class="col-sm-3 control-label">{{trans('project.novelty_desc')}} *</label>

                            <div class="col-sm-6">

                                <textarea name="novelty_desc" id="novelty_desc" class="form-control mceSimple">{!! (empty( old('novelty_desc')) ? $current_project->novelty_desc :  old('novelty_desc')) !!}</textarea>
                            </div>
                        </div>


                        <!-- Project Outcomes -->
                        <div class="form-group">
                            <label for="project_outcomes" class="col-sm-3 control-label">{{trans('project.outcomes')}} *</label>


                            <div class="col-sm-6">
                                <textarea name="project_outcomes" id="project_outcomes" class="form-control mceSimple">{!! (empty( old('project_outcomes')) ? $current_project->project_outcomes :  old('project_outcomes')) !!}</textarea>
                            </div>
                        </div>

                        <!-- Expectations for students -->
                        <div class="form-group">
                            <label for="student_expectations" class="col-sm-3 control-label">{{trans('project.student_expectations')}}</label>

                            <div class="col-sm-6">
                                <textarea name="student_expectations" id="student_expectations" class="form-control mceSimple" readonly="readonly">
                                    @if(empty( old('student_expectations')))
                                    <div class="mceNonEditable">

                                        @if(!empty($current_project->student_expectations))
                                            {{$current_project->student_expectations}}
                                        @else
                                            <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_1')}}</i></p>
                                            <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_2')}}</i></p>
                                            <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_3')}}</i></p>
                                            <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_4')}}</i></p>
                                            <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_5')}}</i></p>
                                            <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_6')}}</i></p>
                                        @endif
                                        
                                        @else
                                        {{ old('student_expectations') }}
                                        @endif
                                    </div>
                                </textarea>
                            </div>
                            @if (Auth::user()->is('admin'))
                                <script>
                                if ($('#student_expectations_ifr')[0]) {
                                    for (var j = 0;j<$('#student_expectations_ifr')[0].contentDocument.children[0].children[1].children.length;j++) {
                                        $('#student_expectations_ifr')[0].contentDocument.children[0].children[1].children[j].attributes[1].value = true;
                                    }
                                } else {
                                    var checkForExpectations = window.setInterval(function () {
                                        if ($('#student_expectations_ifr')[0]) {
                                            for (var j = 0;j<$('#student_expectations_ifr')[0].contentDocument.children[0].children[1].children.length;j++) {
                                                $('#student_expectations_ifr')[0].contentDocument.children[0].children[1].children[j].attributes[1].value = true;
                                            }
                                            clearInterval(checkForExpectations);
                                        }
                                    }, 1000);
                                }
                                </script>
                            @endif
                        </div>


                        <!-- Student idea info data -->
                        @if($current_project->submitted_by_student == 1)


                            @if(!empty($current_project->author_management_skills))
                                <div class="row">
                                    <label class="col-sm-3 control-label">{{trans('project.author_management_skills')}}</label>
                                    <div class="col-sm-6">
                                        <p>{{$current_project->author_management_skills}}</p>
                                    </div>

                                </div>
                            @endif


                        @endif

                        <div class="well well-sm">


                            <!-- Project meeting info -->
                            <div class="form-group">
                                <label for="meeting_info" class="col-sm-3 control-label">{{trans('project.meeting_info')}}</label>

                                <div class="col-sm-6">
                                    <input type="text" name="meeting_info" id="meeting_info" class="form-control" value="{{  (empty(old('meeting_info')) ?  $current_project->meeting_info : old('meeting_info')) }}">
                                </div>
                            </div>


                            <!-- Dates for group meetings -->
                            <div class="form-group">
                                <label for="meetings_dates_text" class="col-sm-3 control-label">{{trans('project.meetings_dates')}} *</label>
                                
                                <div class="col-sm-6">
                                    @if ($current_project->meeting_dates == 'NONE')
                                        <input type="text" name="meetings_dates_text" id="meetings_dates_text" class="form-control" value="{{  !empty(old('meetings_dates_text'))? old('meetings_dates_text') : '' }}">
                                    @else
                                        <input type="text" name="meetings_dates_text" id="meetings_dates_text" class="form-control" value="{{  !empty(old('meetings_dates_text'))? old('meetings_dates_text') : $current_project->meeting_dates }}">
                                    @endif
                                </div>
                            </div>

                            <!-- Presentation of project results -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: right">{{trans('project.presentation_of_results')}}</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="presentation_results" name="presentation_results">

                                        @if ((empty(old('presentation_results')) ?  $current_project->presentation_results : old('presentation_results')) == 0)
                                            <option value="0" selected>{{trans('project.presentation_of_results_december')}}</option>
                                        @else
                                            <option value="0">{{trans('project.presentation_of_results_december')}}</option>
                                        @endif

                                        @if ((empty(old('presentation_results')) ?  $current_project->presentation_results : old('presentation_results')) == 1)
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

                                    @if ((empty(old('study_term')) ?  $current_project->study_term : old('study_term')) == 0)
                                        <option value="0" selected>{{trans('project.autumn_semester')}}</option>
                                    @else
                                        <option value="0">{{trans('project.autumn_semester')}}</option>
                                    @endif

                                    @if ((empty(old('study_term')) ?  $current_project->study_term : old('study_term')) == 1)
                                        <option value="1" selected>{{trans('project.spring_semester')}}</option>
                                    @else
                                        <option value="1">{{trans('project.spring_semester')}}</option>
                                    @endif

                                    @if ( (empty(old('study_term')) ?  $current_project->study_term : old('study_term')) == 2)
                                        <option value="2" selected>{{trans('project.autumn_spring')}}</option>
                                    @else
                                        <option value="2">{{trans('project.autumn_spring')}}</option>
                                    @endif

                                    @if ( (empty(old('study_term')) ?  $current_project->study_term : old('study_term')) == 3)
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

                                    @if (Carbon\Carbon::now()->month >= 6)
                                        @for ($year=2016;$year<Carbon\Carbon::now()->year+2;$year++)
                                            @if (old('study_year') == $year || $current_project->study_year == $year)
                                                <option value="{{$year}}" selected> {{$year}}/{{$year+1}}</option>
                                            @else
                                                <option value="{{$year}}"> {{$year}}/{{$year+1}}</option>
                                            @endif
                                        @endfor
                                    @else
                                        @for ($year=2016;$year<Carbon\Carbon::now()->year+1;$year++)
                                            @if (old('study_year') == $year || $current_project->study_year == $year)
                                                <option value="{{$year}}" selected> {{$year}}/{{$year+1}}</option>
                                            @else
                                                <option value="{{$year}}"> {{$year}}/{{$year+1}}</option>
                                            @endif
                                        @endfor
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
                                            @elseif($authors_ids)
                                                <option {{ in_array( $teacher->id, $authors_ids) ? "selected":"" }} value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
                                            @else
                                                <option value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
                                            @endif

                                        @endforeach

                                    @endif

                                </select>
                                @if(Auth::user()->is('admin'))
                                    <span>
                                        Esmakordne juhendaja
                                        <input type="checkbox" name="is_first_time_supervisor" {{ $current_project->is_first_time_supervisor == 1 ? "checked" : "" }}>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Co-supervisors -->
                        <div class="form-group">
                            <label for="cosupervisors" class="col-sm-3 control-label">{{trans('project.cosupervisor')}} <p>{{trans('project.one_per_line')}}</p></label>

                            <div class="col-sm-6">
                                <textarea name="cosupervisors" id="cosupervisors" class="form-control">{{ (empty(old('cosupervisors'))? $current_project->supervisor : old('cosupervisors') ) }}</textarea>
                            </div>
                        </div>





                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">{{trans('project.status')}}</label>

                            <div class="col-sm-6">
                                <select class="form-control" {{Auth::user()->is('admin')? '':'disabled'}} id="status" name="status">


                                    @if(old('status', null) != null)
                                        <option value="{{old('status') == 1 ? 1: 0}}" selected>{{old('status') == 1 ? trans('project.active'): trans('project.finished')}}</option>

                                        <option value="{{old('status') == 1 ? 0: 1}}">{{old('status') == 0 ? trans('project.active'): trans('project.finished')}}</option>
                                    @else
                                        <option value="{{$current_project->status == 1 ? 1: 0}}" selected>{{$current_project->status == 1 ? trans('project.active'): trans('project.finished')}}</option>

                                        <option value="{{$current_project->status == 1 ? 0: 1}}">{{$current_project->status == 0 ? trans('project.active'): trans('project.finished')}}</option>
                                    @endif


                                </select>
                                @if(!Auth::user()->is('admin'))
                                    <input type="hidden" name="status" value="1" />
                                @endif
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="form-group">
                            <label for="tags" class="col-sm-3 control-label">{{trans('project.keywords')}} *<p>{{trans('project.separated_with_commas')}}</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="tags" id="tags" class="form-control" value="{{ (empty(old('tags')) ? $current_project->tags :  old('tags')) }}" data-role="tagsinput" />
                            </div>
                        </div>


                        <!-- Project deadline for joining -->
                        <div class="form-group">
                            <label for="join_deadline" class="col-sm-3 control-label">{{trans('project.deadline')}} *</label>
                            <div class='col-sm-6'>
                                <div class='input-group date' id='join_deadline'>

                                    <input {{Auth::user()->is('admin') ? '' : 'readonly'}} type='text' class="form-control" name="join_deadline" id="join_deadline" value="{{ (empty(old('join_deadline')) ?  $current_project->join_deadline : old('join_deadline')) }}"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>

                                </div>
                                @if (Auth::user()->is('admin'))
                                    <span>
                                        Projekt paigutada avatud projektide alla
                                        @if ($current_project->is_open == true)
                                            <input type="checkbox" name="is_open" value="true" checked>
                                        @else
                                            <input type="checkbox" name="is_open" value="true">
                                        @endif
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Extra info -->
                        <div class="form-group">
                            <label for="extra_info" class="col-sm-3 control-label">{{trans('project.extra_info')}}</label>

                            <div class="col-sm-6">
                                <textarea name="extra_info" id="extra_info" class="form-control">{{ (empty(old('extra_info')) ? $current_project->extra_info : old('extra_info')) }}</textarea>
                            </div>
                        </div>


                        <div class="well well-sm">
                            <!-- Questions for students who want to join project -->
                            <h4><strong>{{ trans('project.questions_for_students') }}</strong></h4>
                            <div class="form-group">
                                <label for="join_q1" class="col-sm-3 control-label">{{ trans('project.question') }}1</label>

                                <div class="col-sm-6">
                                    <input type="text" name="join_q1" id="join_q1" class="form-control" value="{{trans('project.why_join')}}" readonly>
                                </div>
                            </div>

                            <!-- Student contribution -->
                            <div class="form-group">
                                <label for="join_q2" class="col-sm-3 control-label">{{ trans('project.question') }}2</label>

                                <div class="col-sm-6">
                                    <input type="text" name="join_q2" id="join_q2" class="form-control" value="{{trans('project.my_contribution')}}" readonly>
                                </div>
                            </div>

                            <!-- Student expectations -->
                            <div class="form-group">
                                <label for="join_q3" class="col-sm-3 control-label">{{ trans('project.question') }}3</label>

                                <div class="col-sm-6">
                                    <input type="text" name="join_q3" id="join_q3" class="form-control" value="{{trans('project.my_expectations')}}" readonly>
                                </div>
                            </div>


                            <!-- Additional question 1  -->
                            @if ($current_project->join_extra_q1)
            
                                <div class="form-group extra_q">
                                    <label for="join_extra_q1" class="col-sm-3 control-label">{{ trans('project.additional_question') }}1</label>
            
                                        <div class="col-sm-6">
                                            <input type="text" name="join_extra_q1" id="join_extra_q1" class="form-control" value="{{$current_project->join_extra_q1}}">
                                        </div>
                                </div>
                            @else 
                                <div class="form-group extra_q" hidden>
                                    <label for="join_extra_q1" class="col-sm-3 control-label">{{ trans('project.additional_question') }}1</label>

                                        <div class="col-sm-6">
                                            <input type="text" name="join_extra_q1" id="join_extra_q1" class="form-control" value="">
                                        </div>
                                </div>
                            @endif


                            <!-- Additional question 2  -->
                            @if ($current_project->join_extra_q2)
                                <div class="form-group extra_q">
                                    <label for="join_extra_q2" class="col-sm-3 control-label">{{ trans('project.additional_question') }}2</label>
            
                                    <div class="col-sm-6">
                                        <input type="text" name="join_extra_q2" id="join_extra_q2" class="form-control" value="{{$current_project->join_extra_q2}}">
                                    </div>
                                </div>
                            @else
                                <div class="form-group extra_q" hidden>
                                    <label for="join_extra_q2" class="col-sm-3 control-label">{{ trans('project.additional_question') }}2</label>
            
                                    <div class="col-sm-6">
                                        <input type="text" name="join_extra_q2" id="join_extra_q2" class="form-control" value="">
                                    </div>
                                </div>
                            @endif        

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
                                        <option value="{{ $i }}" {{ $current_project->max_members >= $i ? 'selected' : ''}}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>


                        <!-- Language-->
                        <div class="form-group">
                            <label for="language" class="col-sm-3 control-label">{{trans('project.language')}} *</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="language" name="language">
                                    @if ((empty(old('language')) ?  $current_project->language : old('language')) == 'et')
                                        <option value="et" selected>Eesti</option>
                                    @else
                                        <option value="et">Eesti</option>
                                    @endif


                                    @if ((empty(old('language')) ?  $current_project->language : old('language')) == 'en')
                                        <option value="en" selected>English</option>
                                    @else
                                        <option value="en">English</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <!-- Publishing status -->
                        <div class="form-group">

                            <label for="publishing_status" class="col-sm-3 control-label">{{trans('project.publishing')}} *</label>

                            <div class="col-sm-6">

                                @if($current_project->publishing_status > 0)
                                    <select class="form-control" id="publishing_status" name="publishing_status">
                                        @if($current_project->publishing_status > 0)
                                            <option value="{{$current_project->publishing_status == 1 ? 1: 0}}" selected>{{$current_project->publishing_status == 1 ? trans('project.published'): trans('project.hidden')}}</option>

                                            <option value="{{$current_project->publishing_status == 1 ? 0: 1}}">{{$current_project->publishing_status == 0 ? trans('project.published'): trans('project.hidden')}}</option>
                                        @else
                                            <option value="{{$current_project->publishing_status == 1 ? 1: 0}}">{{$current_project->publishing_status == 1 ? trans('project.published'): trans('project.hidden')}}</option>

                                            <option value="{{$current_project->publishing_status == 1 ? 0: 1}}" selected>{{$current_project->publishing_status == 0 ? trans('project.published'): trans('project.hidden')}}</option>
                                        @endif
                                    </select>
                                @else
                                    @if (Auth::user()->is('admin'))
                                        <select class="form-control" id="publishing_status" name="publishing_status">
                                            @if(old('publishing_status', null) != null)
                                                <option value="{{old('publishing_status') == 1 ? 1: 0}}" selected>{{old('publishing_status') == 1 ? trans('project.published'): trans('project.hidden')}}</option>

                                                <option value="{{old('publishing_status') == 1 ? 0: 1}}">{{old('publishing_status') == 0 ? trans('project.published'): trans('project.hidden')}}</option>
                                            @else
                                                <option value="{{$current_project->publishing_status == 1 ? 1: 0}}" selected>{{$current_project->publishing_status == 1 ? trans('project.published'): trans('project.hidden')}}</option>

                                                <option value="{{$current_project->publishing_status == 1 ? 0: 1}}">{{$current_project->publishing_status == 0 ? trans('project.published'): trans('project.hidden')}}</option>
                                            @endif
                                        </select>
                                    @else
                                        <input type="hidden" name="publishing_status" value=0>
                                        <select class="form-control" id="publishing_status" name="publishing_status" disabled>

                                            <option value="0" selected>{{trans('project.hidden')}}</option>

                                            <option value="1">{{trans('project.published')}}</option>

                                        </select>

                                        <!-- Tooltip letting users know why the project status is hidden at first -->
                                        {{trans('project.reason_of_initial_hiddenness')}}
                                    @endif
                                @endif
                            </div>
                        </div>



                        {{--<!-- Mendeley group link -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="group_link" class="col-sm-3 control-label">{{trans('project.mendeley_group_link')}}</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="group_link" id="group_link" class="form-control" value="{{ (empty(old('group_link')) ?  $current_project->group_link : old('group_link')) }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <!-- Get notifications -->
                        <div class="form-group">

                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="checkbox">
                                    <h4>
                                        <label>
                                            <input name="get_notifications" id="get_notifications" type="checkbox" {{(empty(old('get_notifications')) ? (($current_project->get_notifications == 1) ? 'checked':'') : 'checked' )}}> {{trans('project.get_notification')}}
                                        </label>
                                    </h4>

                                </div>
                            </div>
                        </div>



                        <!-- Add Project Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button id="submit-project-button" type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i>{{trans('project.save_button')}}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            @if(Auth::user()->is('admin'))

                {{--Add students to project--}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{trans('project.add_students_manually')}}
                    </div>

                    <div class="panel-body">
                        <form action="{{ url('project/'.$current_project->id.'/attach-users') }}" method="POST" class="form-horizontal new-project ">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="attached-users" class="col-sm-3 control-label">{{trans('project.student_names_or_emails')}}</label>


                                <div class="col-sm-6">
                                    <select class="js-users-data-ajax multiple form-control" id="attached-users" project-id="{{$current_project->id}}" name="attached-users[]" multiple>
                                        <option value="Otsi tudengi"></option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-user"></i>{{trans('project.add_button')}}
                                    </button>
                                </div>
                            </div>


                        </form>


                    </div>
                </div>

            @endif


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
                                    @if(Auth::user()->is('admin'))
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
                                                @if(Auth::user()->is('admin'))
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
