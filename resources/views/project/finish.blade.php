@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-lg-12">
            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif
            <h2><i class="fa fa-lightbulb-o"></i> {{trans('project.summary_title')}}</h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$current_project->name}}</h3>
                </div>

                <div class="panel-body">

                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Project Form -->
                    @if (Auth::user()->is('student') && !Auth::user()->is('admin') && !Auth::user()->is('oppejoud'))
                        <form action="{{ url('/finishv2/'.$current_project->id) }}" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    @else
                        <form action="{{ url('/project/'.$current_project->id.'/finishv2') }}" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    @endif
                    {{ csrf_field() }}


                    @if (count($current_project->groups) > 0)
                        @if (Auth::user()->is('student') && !Auth::user()->is('admin') && !Auth::user()->is('oppejoud'))

                            <div class="col-lg-10 col-lg-offset-1">

                                <div class="panel with-nav-tabs panel-primary project-groups-panel">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            @foreach ($current_project->groups as $group_key => $group)
                                                @if ($student_group == $group->id)
                                                    <li class="active"><a href="#{{$group->id}}" aria-controls="home" role="tab" data-toggle="tab">{{$group->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            @foreach ($current_project->groups as $group_key => $group)
                                                @if ($student_group == $group->id)
                                                    <div role="tabpanel" class="tab-pane project-groups fade in active" id="{{$group->id}}">

                                                        <h3>{{trans('project.group_members')}}</h3>

                                                        <ul class="list-group" group-id="{{$group->id}}">
                                                            @foreach($group->users as $user)
                                                                <li class="list-group-item" user-id="{{$user->id}}">{{getUserNameAndCourse($user)}}</li>
                                                            @endforeach
                                                        </ul>

                                                        <h3>{{trans('project.group_results_heading')}}</h3>

                                                        <!--Group images -->
                                                        <div class="form-group">
                                                            <label for="presentationUpload[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_images')}}<p>{{trans('project.reminder_for_poster')}}</p></label>
                                                            <div class="col-sm-8">
                                                                <div class="dropzone" id="presentationUpload{{$group->id}}" project-id="{{$current_project->id}}" auth="student" group-id="{{$group->id}}">
                                                                    <div class="dz-message" data-dz-message><span>{{trans('project.drop_poster_upload')}}</span></div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Group Embedded media -->
                                                        <div class="form-group">
                                                            <label for="group_embedded[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_video_link')}} <p>https://youtu.be/...</p></label>

                                                            <div class="col-sm-8">
                                                                <p>{{trans('project.group_video_link_desc')}}</p>

                                                                @if(!empty(old('group_embedded.'.$group->id)))

                                                                    <input type="text" name="group_embedded[{{$group->id}}]" id="group_embedded[{{$group->id}}]" class="form-control" value="{!!  old('group_embedded.'.$group->id) !!}">
                                                                    <button type="button" class="btn btn-default btn-sm" id="clear-group-embedded" style="margin-top: 5.5px">{{trans('project.delete')}}</button>

                                                                @elseif(!empty($group->embedded))

                                                                    @php

                                                                        preg_match('/src="([^"]+)"/', $group->embedded, $match);
                                                                        $embedded = $match[1];

                                                                    @endphp

                                                                    <input type="text" name="group_embedded[{{$group->id}}]" id="group_embedded[{{$group->id}}]" class="form-control" value="{!! $embedded !!}">
                                                                    <button type="button" class="btn btn-default btn-sm" id="clear-group-embedded" style="margin-top: 5.5px">{{trans('project.delete')}}</button>

                                                                @else

                                                                    <input type="text" name="group_embedded[{{$group->id}}]" id="group_embedded[{{$group->id}}]" class="form-control">
                                                                    <button type="button" class="btn btn-default btn-sm" id="clear-group-embedded" style="margin-top: 5.5px">{{trans('project.delete')}}</button>

                                                                @endif

                                                            </div>
                                                        </div>

                                                        <!-- Group Materials -->
                                                        <div class="group-materials">
                                                            <div class="form-group">
                                                                <label for="materialsUpload[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_materials')}}<p>{{trans('project.can_upload_multiple')}}</p></label>
                                                                <div class="col-sm-8">
                                                                    <p>{{trans('project.group_materials_desc')}}</p>
                                                                    <div class="dropzone" auth="student" id="materialsUpload{{$group->id}}" project-id="{{$current_project->id}}" group-id="{{$group->id}}">
                                                                        <div class="dz-message" data-dz-message><span>{{trans('project.drop_materials_upload')}}</span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="panel with-nav-tabs panel-primary project-groups-panel">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            @foreach ($current_project->groups as $group_key => $group)
                                                <li class="{{ ($group_key == 0 ? 'active' : '') }}"><a href="#{{$group->id}}" aria-controls="home" role="tab" data-toggle="tab">{{$group->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            @foreach ($current_project->groups as $group_key => $group)
                                                <div role="tabpanel" class="tab-pane project-groups fade in {{ ($group_key == 0 ? 'active' : '') }}" id="{{$group->id}}">
                                                    <h3>{{trans('project.group_members')}}</h3>
                                                    <ul class="list-group" group-id="{{$group->id}}">
                                                        @foreach($group->users as $user)
                                                            <li class="list-group-item" user-id="{{$user->id}}">{{getUserNameAndCourse($user)}}</li>
                                                        @endforeach
                                                    </ul>


                                                    <h3>{{trans('project.group_results_heading')}}</h3>

                                                    <!--Group images -->
                                                    <div class="form-group">
                                                        <label for="presentationUpload[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_images')}}<p>{{trans('project.reminder_for_poster')}}</p></label>
                                                        <div class="col-sm-8">
                                                            <div class="dropzone" id="presentationUpload{{$group->id}}" project-id="{{$current_project->id}}" group-id="{{$group->id}}">
                                                                <div class="dz-message" data-dz-message><span>{{trans('project.drop_poster_upload')}}</span></div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Group Embedded media -->
                                                    <div class="form-group">
                                                        <label for="group_embedded[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_video_link')}} <p>https://youtu.be/...</p></label>

                                                        <div class="col-sm-8">
                                                            <p>{{trans('project.group_video_link_desc')}}</p>

                                                            @if(!empty(old('group_embedded.'.$group->id)))

                                                                <input type="text" name="group_embedded[{{$group->id}}]" id="group_embedded[{{$group->id}}]" class="form-control" value="{!!  old('group_embedded.'.$group->id) !!}">
                                                                <button type="button" class="btn btn-default btn-sm" id="clear-group-embedded" style="margin-top: 5.5px">{{trans('project.delete')}}</button>

                                                            @elseif(!empty($group->embedded))

                                                                @php

                                                                    preg_match('/src="([^"]+)"/', $group->embedded, $match);
                                                                    $embedded = $match[1];

                                                                @endphp

                                                                <input type="text" name="group_embedded[{{$group->id}}]" id="group_embedded[{{$group->id}}]" class="form-control" value="{!! $embedded !!}">
                                                                <button type="button" class="btn btn-default btn-sm" id="clear-group-embedded" style="margin-top: 5.5px">{{trans('project.delete')}}</button>

                                                            @else

                                                                <input type="text" name="group_embedded[{{$group->id}}]" id="group_embedded[{{$group->id}}]" class="form-control">
                                                                <button type="button" class="btn btn-default btn-sm" id="clear-group-embedded" style="margin-top: 5.5px">{{trans('project.delete')}}</button>

                                                            @endif

                                                        </div>
                                                    </div>


                                                    <!-- Group Materials -->
                                                    <div class="group-materials">
                                                        <div class="form-group">
                                                            <label for="materialsUpload[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_materials')}}<p>{{trans('project.can_upload_multiple')}}</p></label>
                                                            <div class="col-sm-8">
                                                                <p>{{trans('project.group_materials_desc')}}</p>
                                                                <div class="dropzone" id="materialsUpload{{$group->id}}" project-id="{{$current_project->id}}" group-id="{{$group->id}}">
                                                                    <div class="dz-message" data-dz-message><span>{{trans('project.drop_materials_upload')}}</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    <!-- Add Project Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-btn fa-pencil"></i>{{trans('project.save_button')}}
                            </button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection