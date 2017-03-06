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
                    <h3 class="panel-title"><i class="fa fa-plus"></i> {{trans('project.add')}}</h3>
                </div>

                <div class="panel-body">

                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Project Form -->
                    <form action="{{ url('/project/'.$current_project->id) }}" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- Project Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{trans('project.add')}}</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ (empty($current_project) ? old('name') : $current_project->name) }}">
                            </div>
                        </div>

                        <!-- Project Embedded media -->
                        <div class="form-group">
                            <label for="embedded" class="col-sm-3 control-label">{{trans('project.video_link')}} <p>https://youtu.be/...</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="embedded" id="embedded" class="form-control" value="{{ (empty($current_project) ? old('embedded') : $current_project->embedded) }}">
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

                                <textarea name="description" id="description" class="form-control mceSimple">{{ (empty($current_project) ? old('description') : $current_project->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Project meeting info -->
                        <div class="form-group">
                            <label for="meeting_info" class="col-sm-3 control-label">{{trans('project.meeting_info')}}</label>

                            <div class="col-sm-6">
                                <input type="text" name="meeting_info" id="meeting_info" class="form-control" value="{{  (empty($current_project) ? old('meeting_info') : $current_project->meeting_info) }}">
                            </div>
                        </div>


                        <!-- Study area -->
                        <div class="form-group">
                            <label for="study_areas" class="col-sm-3 control-label">{{trans('project.study_area')}}</label>


                            <div class="col-sm-6">
                                <select class="js-example-basic-multiple form-control" id="study_areas" name="study_areas[]" multiple>

                                    @if ($linked_courses)

                                        @foreach($linked_courses as $linked_course)

                                                <option value="{{ $linked_course->id }}" selected="selected">{{ $linked_course->name }}</option>

                                        @endforeach
                                    @endif


                                    @if ($courses->count())

                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
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
                                <textarea name="integrated_areas" id="integrated_areas" class="form-control">{{ (empty($current_project) ? old('integrated_areas') : $current_project->integrated_areas) }}</textarea>
                            </div>
                        </div>


                        <!-- Study term -->
                        <div class="form-group">
                            <label for="study_term" class="col-sm-3 control-label">{{trans('project.duration')}}</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="study_term" name="study_term">

                                    @if ((!empty($current_project) ?  $current_project->study_term : old('study_term')) == 0)
                                        <option value="0" selected>{{trans('project.autumn_semester')}}</option>
                                    @else
                                        <option value="0">{{trans('project.autumn_semester')}}</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->study_term : old('study_term')) == 1)
                                        <option value="1" selected>{{trans('project.spring_semester')}}</option>
                                    @else
                                        <option value="1">{{trans('project.spring_semester')}}</option>
                                    @endif

                                    @if ( (!empty($current_project) ?  $current_project->study_term : old('study_term')) == 2)
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
                                <textarea name="related_courses" id="related_courses" class="form-control">{{ (empty($current_project) ? old('related_courses') : $current_project->courses) }}</textarea>
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
                                    @if ($authors->count())

                                        @foreach($authors as $author)

                                            @if(!empty($author->full_name))
                                                <option value="{{ $author->id }}" selected="selected">{{ $author->full_name }}</option>
                                            @else
                                                <option value="{{ $author->id }}" selected="selected">{{ $author->name }}</option>
                                            @endif

                                        @endforeach
                                    @endif

                                    @if ($teachers->count())

                                        @foreach($teachers as $teacher)

                                            @if(!empty($teacher->full_name))
                                                <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                            @else
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                                <textarea name="cosupervisors" id="cosupervisors" class="form-control">{{ (empty($current_project) ? old('cosupervisors') : $current_project->supervisor) }}</textarea>
                            </div>
                        </div>





                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">{{trans('project.status')}}</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="status" name="status">

                                    @if ((!empty($current_project) ?  $current_project->status : old('status')) == 1)
                                        <option value="1" selected>{{trans('project.active')}}</option>
                                    @else
                                        <option value="1">{{trans('project.active')}}</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->status : old('status')) == 0)
                                        <option value="0" selected>{{trans('project.finished')}}</option>
                                    @else
                                        <option value="0">{{trans('project.finished')}}</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="form-group">
                            <label for="tags" class="col-sm-3 control-label">{{trans('project.keywords')}} <p>{{trans('project.separated_with_commas')}}</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="tags" id="tags" class="form-control" value="{{ (empty($current_project) ? old('tags') : $current_project->tags) }}" data-role="tagsinput" />
                            </div>
                        </div>


                        <!-- Project deadline for joining -->
                        <div class="form-group">
                            <label for="join_deadline" class="col-sm-3 control-label">{{trans('project.deadline')}}</label>
                            <div class='col-sm-6'>
                                <div class='input-group date' id='join_deadline'>

                                    <input type='text' class="form-control" name="join_deadline" id="join_deadline" value="{{ (empty($current_project) ? old('join_deadline') : empty($current_project->join_deadline) ? old('join_deadline') :$current_project->join_deadline) }}"/>
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
                                <textarea name="extra_info" id="extra_info" class="form-control">{{ (empty($current_project) ? old('extra_info') : $current_project->extra_info) }}</textarea>
                            </div>
                        </div>

                        <!-- Language-->
                        <div class="form-group">
                            <label for="language" class="col-sm-3 control-label">{{trans('project.language')}}</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="language" name="language">
                                    @if ((!empty($current_project) ?  $current_project->language : old('language')) == 'et')
                                        <option value="et" selected>Eesti</option>
                                    @else
                                        <option value="et">Eesti</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->language : old('language')) == 'en')
                                        <option value="en" selected>English</option>
                                    @else
                                        <option value="en">English</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="publishing_status" class="col-sm-3 control-label">{{trans('project.publishing')}}</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="publishing_status" name="publishing_status">


                                    @if ((!empty($current_project) ?  $current_project->publishing_status : old('publishing_status')) == 1)
                                        <option value="1" selected>{{trans('project.published')}}</option>
                                    @else
                                        <option value="1">{{trans('project.published')}}</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->publishing_status : old('publishing_status')) == 0)
                                        <option value="0" selected>{{trans('project.hidden')}}</option>
                                    @else
                                        <option value="0">{{trans('project.hidden')}}</option>
                                    @endif




                                </select>
                            </div>
                        </div>



                        <!-- Mendeley group link -->
                        <div class="form-group">
                            <label for="group_link" class="col-sm-3 control-label">{{trans('project.mendeley_group_link')}}</label>

                            <div class="col-sm-6">
                                <input type="text" name="group_link" id="group_link" class="form-control" value="{{ (empty($current_project) ? old('group_link') : $current_project->group_link) }}">
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
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @php
                                $members_count=0;
                            @endphp

                            @foreach ($current_project->users as $user)
                                <tr>
                                @if ( $user->pivot->participation_role == 'member' )
                                    @php
                                        $members_count++;
                                    @endphp
                                    @if(!empty($user->full_name))
                                        <td class="table-text"><div>{{ $user->full_name }}</div></td>

                                    @else
                                        <td class="table-text"><div>{{ $user->name }}</div></td>
                                    @endif
                                    <td class="table-text"><div>{{ $user->email }}</div></td>
                                    <td>
                                        @if(!$user->courses->isEmpty())
                                            @foreach($user->courses as $course)
                                                <span class="label label-success">{{ $course->name }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <form class="delete-user" action="{{ url('project/'.$current_project->id).'/unlink/'.$user->id }}" method="POST">
                                            {{ csrf_field() }}


                                        </form>
                                        <button type="submit" id="delete-user-button" class="btn btn-danger pull-right">
                                            <i class="fa fa-btn fa-unlink"></i>{{trans('project.delete')}}
                                        </button>

                                    </td>
                                @endif
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                @if($members_count>0)
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
                                            $members_emails .=$user->email.',';
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
            @endif


            @if(Auth::user()->is('admin'))

            {{--Add students to project--}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lisa tudengid käsitsi
                    </div>

                    <div class="panel-body">
                        <form action="{{ url('project/'.$current_project->id.'/attach-users') }}" method="POST" class="form-horizontal new-project ">
                        {{ csrf_field() }}

                            <div class="form-group">
                                <label for="attached-users" class="col-sm-3 control-label">Tudengite nimed või e-posti aadressid</label>


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
        </div>
    </div>
@endsection
