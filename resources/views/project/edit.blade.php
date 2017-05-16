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
                    <form action="{{ url('/project/'.$current_project->id) }}" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- Project Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{trans('project.name')}}</label>

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
                            <label for="description" class="col-sm-3 control-label">{{trans('project.description')}}</label>

                            <div class="col-sm-6">

                                <textarea name="description" id="description" class="form-control mceSimple">{!! (empty( old('description')) ? $current_project->description :  old('description')) !!}</textarea>
                            </div>
                        </div>


                        <!-- Student idea info data -->
                        @if($current_project->submitted_by_student == 1)

                            @if(!empty($current_project->interdisciplinary_desc))
                                <div class="row">
                                    <label class="col-sm-3 control-label">{{trans('project.interdisciplinary_desc')}}</label>
                                    <div class="col-sm-6">
                                        <p>{{$current_project->interdisciplinary_desc}}</p>
                                    </div>

                                </div>
                            @endif

                            @if(!empty($current_project->novelty_desc))
                                    <div class="row">
                                        <label class="col-sm-3 control-label">{{trans('project.novelty_desc')}}</label>
                                        <div class="col-sm-6">
                                            <p>{{$current_project->novelty_desc}}</p>
                                        </div>

                                    </div>
                            @endif

                            @if(!empty($current_project->author_management_skills))
                                <div class="row">
                                    <label class="col-sm-3 control-label">{{trans('project.author_management_skills')}}</label>
                                    <div class="col-sm-6">
                                        <p>{{$current_project->author_management_skills}}</p>
                                    </div>

                                </div>
                            @endif


                        @endif


                        <!-- Project meeting info -->
                        <div class="form-group">
                            <label for="meeting_info" class="col-sm-3 control-label">{{trans('project.meeting_info')}}</label>

                            <div class="col-sm-6">
                                <input type="text" name="meeting_info" id="meeting_info" class="form-control" value="{{  (empty(old('meeting_info')) ?  $current_project->meeting_info : old('meeting_info')) }}">
                            </div>
                        </div>


                        <!-- Study area -->
                        <div class="form-group">
                            <label for="study_areas" class="col-sm-3 control-label">{{trans('project.study_area')}}</label>


                            <div class="col-sm-6">
                                <select class="js-example-basic-multiple form-control" id="study_areas" name="study_areas[]" multiple>



                                    @if ($courses->count())

                                        @foreach($courses as $course)

                                                @if(!empty(old('study_areas')))
                                                    <option {{ in_array( $course->id, old('study_areas')) ? "selected":"" }} value="{{ $course->id }}">{{ $course->name }}</option>

                                                @elseif($linked_courses_ids)
                                                    <option {{ in_array($course->id, $linked_courses_ids) ? "selected":"" }} value="{{ $course->id }}">{{ $course->name }}</option>

                                                @endif

                                        @endforeach

                                    @endif


                                </select>
                            </div>
                        </div>


                        <!-- Integrated areas -->
                        <!-- XXX to be removed -->
                        <div class="form-group">
                            <label for="integrated_areas" class="col-sm-3 control-label">{{trans('project.integrated_study_areas')}} <p>{{trans('project.one_per_line')}}</p></label>


                            <div class="col-sm-6">
                                <textarea name="integrated_areas" id="integrated_areas" class="form-control">{{ (empty(old('integrated_areas')) ? $current_project->integrated_areas : old('integrated_areas')) }}</textarea>
                            </div>
                        </div>


                        <!-- Study term -->
                        <div class="form-group">
                            <label for="study_term" class="col-sm-3 control-label">{{trans('project.duration')}}</label>

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
                                        <option value="2" selected>{{trans('project.both')}}</option>
                                    @else
                                        <option value="2">{{trans('project.both')}}</option>
                                    @endif

                                </select>
                            </div>
                        </div>


                        <!-- Study year -->
                        <div class="form-group">
                            <label for="study_year" class="col-sm-3 control-label">{{trans('project.study_year')}}</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="study_year" name="study_year">



                                    @if( old('study_year') == Carbon\Carbon::now()->year || $current_project->study_year == Carbon\Carbon::now()->year)
                                        <option value="{{Carbon\Carbon::now()->year}}" selected>{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>
                                        <option value="{{Carbon\Carbon::now()->year-1}}">{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                    @elseif(old('study_year') == Carbon\Carbon::now()->year-1 || $current_project->study_year == Carbon\Carbon::now()->year-1)
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



                    {{--<!-- Project Outcomes -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="project_outcomes" class="col-sm-3 control-label">Projekti väljundid <p>Üks per rida</p></label>--}}


                            {{--<div class="col-sm-6">--}}
                                {{--<textarea name="project_outcomes" id="project_outcomes" class="form-control">{{ (empty($current_project) ? old('project_outcomes') : $current_project->project_outcomes) }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Student Outcomes -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="student_outcomes" class="col-sm-3 control-label">Tudengi õpiväljundid <p>Üks per rida</p></label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<textarea name="student_outcomes" id="student_outcomes" class="form-control">{{ (empty($current_project) ? old('student_outcomes') : $current_project->student_outcomes) }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <!-- Related Courses -->
                        <div class="form-group">
                            <label for="related_courses" class="col-sm-3 control-label">{{trans('project.related_courses')}} <p>{{trans('project.one_per_line')}}</p></label>

                            <div class="col-sm-6">
                                <textarea name="related_courses" id="related_courses" class="form-control">{{ (empty(old('related_courses')) ?  $current_project->courses : old('related_courses')) }}</textarea>
                            </div>
                        </div>


                        {{--<!-- Project start -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="project_start" class="col-sm-3 control-label">{{trans('project.start')}}</label>--}}
                            {{--<div class='col-sm-6'>--}}
                                {{--<div class='input-group date' id='project_start'>--}}

                                    {{--<input type='text' class="form-control" name="project_start" id="project_start" value="{{ (empty($current_project) ? old('project_start') : empty($current_project->start) ? old('project_start') :$current_project->start) }}"/>--}}
                                    {{--<span class="input-group-addon">--}}
                                        {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                    {{--</span>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<!-- Project end -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="project_end" class="col-sm-3 control-label">{{trans('project.end')}}</label>--}}
                            {{--<div class='col-sm-6'>--}}
                                {{--<div class='input-group date' id='project_end'>--}}
                                    {{--<input type='text' class="form-control" name="project_end" id="project_end" value="{{ (empty($current_project) ? old('project_end') : empty($current_project->end) ? old('project_end') :$current_project->end) }}"/>--}}
                                    {{--<span class="input-group-addon">--}}
                                        {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}



                        <!-- Institutes -->
                        {{--<div class="form-group">--}}
                            {{--<label for="institutes" class="col-sm-3 control-label">{{trans('project.institute')}}</label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<select class="form-control" id="institutes" name="institutes">--}}

                                    {{--@if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 0 )--}}
                                        {{--<option value="0" selected>Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</option>--}}
                                    {{--@else--}}
                                        {{--<option value="0">Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</option>--}}
                                    {{--@endif--}}


                                    {{--@if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 1)--}}
                                        {{--<option value="1" selected>Digitehnoloogiate instituut</option>--}}
                                    {{--@else--}}
                                        {{--<option value="1">Digitehnoloogiate instituut</option>--}}
                                    {{--@endif--}}

                                    {{--@if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 2)--}}
                                        {{--<option value="2" selected>Humanitaarteaduste instituut</option>--}}
                                    {{--@else--}}
                                        {{--<option value="2">Humanitaarteaduste instituut</option>--}}
                                    {{--@endif--}}


                                    {{--@if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 3)--}}
                                        {{--<option value="3" selected>Haridusteaduste instituut</option>--}}
                                    {{--@else--}}
                                        {{--<option value="3">Haridusteaduste instituut</option>--}}
                                    {{--@endif--}}


                                    {{--@if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 4)--}}
                                        {{--<option value="4" selected>Loodus- ja terviseteaduste instituut</option>--}}
                                    {{--@else--}}
                                        {{--<option value="4">Loodus- ja terviseteaduste instituut</option>--}}
                                    {{--@endif--}}


                                    {{--@if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 5)--}}
                                        {{--<option value="5" selected>Rakvere kolledž</option>--}}
                                    {{--@else--}}
                                        {{--<option value="5">Rakvere kolledž</option>--}}
                                    {{--@endif--}}


                                    {{--@if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 6)--}}
                                        {{--<option value="6" selected>Haapsalu kolledž</option>--}}
                                    {{--@else--}}
                                        {{--<option value="6">Haapsalu kolledž</option>--}}
                                    {{--@endif--}}


                                    {{--@if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 7)--}}
                                        {{--<option value="7" selected>Ühiskonnateaduste instituut</option>--}}
                                    {{--@else--}}
                                        {{--<option value="7">Ühiskonnateaduste instituut</option>--}}
                                    {{--@endif--}}


                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}



                        <!-- Supervisors -->
                        <div class="form-group">
                            <label for="supervisors" class="col-sm-3 control-label">{{trans('project.supervisor')}}</label>


                            <div class="col-sm-6">
                                <select class="js-example-basic-multiple form-control" id="supervisors" name="supervisors[]" multiple>


                                    @if ($teachers->count())

                                        @foreach($teachers as $teacher)
                                            @if(!empty(old('supervisors')))
                                                <option {{ in_array( $teacher->id, old('supervisors')) ? "selected":"" }} value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
                                            @elseif($authors_ids)
                                                <option {{ in_array( $teacher->id, $authors_ids) ? "selected":"" }} value="{{ $teacher->id }}">{{ getUserName($teacher) }}</option>
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
                                <textarea name="cosupervisors" id="cosupervisors" class="form-control">{{ (empty(old('cosupervisors'))? $current_project->supervisor : old('cosupervisors') ) }}</textarea>
                            </div>
                        </div>





                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">{{trans('project.status')}}</label>

                            <div class="col-sm-6">
                                <select class="form-control" {{Auth::user()->is('admin')? '':'disabled'}} id="status" name="status">


                                    @if(count(old('status')) > 0)
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
                            <label for="tags" class="col-sm-3 control-label">{{trans('project.keywords')}} <p>{{trans('project.separated_with_commas')}}</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="tags" id="tags" class="form-control" value="{{ (empty(old('tags')) ? $current_project->tags :  old('tags')) }}" data-role="tagsinput" />
                            </div>
                        </div>


                        <!-- Project deadline for joining -->
                        <div class="form-group">
                            <label for="join_deadline" class="col-sm-3 control-label">{{trans('project.deadline')}}</label>
                            <div class='col-sm-6'>
                                <div class='input-group date' id='join_deadline'>

                                    <input type='text' class="form-control" name="join_deadline" id="join_deadline" value="{{ (empty(old('join_deadline')) ?  $current_project->join_deadline : old('join_deadline')) }}"/>
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
                                <textarea name="extra_info" id="extra_info" class="form-control">{{ (empty(old('extra_info')) ? $current_project->extra_info : old('extra_info')) }}</textarea>
                            </div>
                        </div>

                        <!-- Language-->
                        <div class="form-group">
                            <label for="language" class="col-sm-3 control-label">{{trans('project.language')}}</label>

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

                            <label for="publishing_status" class="col-sm-3 control-label">{{trans('project.publishing')}}</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="publishing_status" name="publishing_status">
                                    @if(count(old('publishing_status')) > 0)
                                        <option value="{{old('publishing_status') == 1 ? 1: 0}}" selected>{{old('publishing_status') == 1 ? trans('project.published'): trans('project.hidden')}}</option>

                                        <option value="{{old('publishing_status') == 1 ? 0: 1}}">{{old('publishing_status') == 0 ? trans('project.published'): trans('project.hidden')}}</option>
                                    @else
                                        <option value="{{$current_project->publishing_status == 1 ? 1: 0}}" selected>{{$current_project->publishing_status == 1 ? trans('project.published'): trans('project.hidden')}}</option>

                                        <option value="{{$current_project->publishing_status == 1 ? 0: 1}}">{{$current_project->publishing_status == 0 ? trans('project.published'): trans('project.hidden')}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>



                        <!-- Mendeley group link -->
                        <div class="form-group">
                            <label for="group_link" class="col-sm-3 control-label">{{trans('project.mendeley_group_link')}}</label>

                            <div class="col-sm-6">
                                <input type="text" name="group_link" id="group_link" class="form-control" value="{{ (empty(old('group_link')) ?  $current_project->group_link : old('group_link')) }}">
                            </div>
                        </div>



                        <!-- Add Project Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i>{{trans('project.change_button')}}
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
                                                            <span class="label label-success">{{ $course->name }}</span>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{trans('project.project_groups')}}
                        </div>

                        <div class="panel-body project-groups">
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
                                            <h4>{{$group->name}} <a href="{{url('/project/'.$current_project->id.'/group/delete/'.$group->id)}}" data-method="delete" data-token="{{csrf_token()}}"> <i class="fa fa-trash"></i></a></h4>
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
