@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-lg-12">
            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif
            <h2><i class="fa fa-lightbulb-o"></i> Vahekokkuvõte</h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$current_project->name}}</h3>
                </div>

                <div class="panel-body">

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

                                                        <h3>Vahekokkuvõtte materjalide esitamine</h3>



                                                        <!-- Group Materials -->
                                                        {{-- <div class="group-materials">
                                                            <div class="form-group">
                                                                <label for="midtermMaterialsUpload[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_materials')}}</label>
                                                                <div class="col-sm-8">
                                                                    <p>....</p> --}}
                                                                    <div class="dropzone" auth="student" id="midtermMaterialsUpload{{$group->id}}" project-id="{{$current_project->id}}" group-id="{{$group->id}}">
                                                                        <div class="dz-message" data-dz-message><span>{{trans('project.drop_materials_upload')}}</span></div>
                                                                    </div>
                                                                {{-- </div>
                                                            </div>
                                                        </div> --}}



                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    {{-- <a href="{{ url("project").'/'.$current_project->id }}"><button class="btn btn-default">Tagasi</button></a> --}}
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection