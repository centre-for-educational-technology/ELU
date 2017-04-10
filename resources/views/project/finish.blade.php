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
                    <form action="{{ url('/project/'.$current_project->id.'/finish') }}" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <!-- Project Summary -->
                        <div class="form-group">
                            <label for="summary" class="col-sm-3 control-label">{{trans('project.finished_desc')}}</label>


                            <div class="col-sm-7">
                                <p>{{trans('project.finished_desc_desc')}}</p>

                                <textarea name="summary" id="summary" class="form-control mceSimple">{!! (empty($current_project) ? old('summary') : $current_project->summary) !!}</textarea>
                            </div>
                        </div>






                        @if (count($current_project->groups) > 0)
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

                                                        <h3>{{trans('project.impressions')}}</h3>

                                                        <!-- Group Embedded media -->
                                                        <div class="form-group">
                                                            <label for="group_embedded[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_video_link')}} <p>https://youtu.be/...</p></label>

                                                            <div class="col-sm-8">
                                                                <p>{{trans('project.group_video_link_desc')}}</p>
                                                                @if(!empty(json_decode($group->summary, true)['embedded']))
                                                                    @php
                                                                        preg_match('/src="([^"]+)"/', (json_decode($group->summary, true)['embedded']), $match);

                                                                        $embedded = $match[1];

                                                                    @endphp
                                                                    <input type="text" name="group_embedded[{{$group->id}}]" id="group_embedded[{{$group->id}}]" class="form-control" value="{!! $embedded !!}">
                                                                @else
                                                                    <input type="text" name="group_embedded[{{$group->id}}]" id="group_embedded[{{$group->id}}]" class="form-control" value="{!!  old('group_embedded.'.$group->id)!!}">

                                                                @endif
                                                            </div>
                                                        </div>



                                                        <!--Group images -->
                                                        <div class="form-group">

                                                            <label for="group_images[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_images')}}<p>{{trans('project.can_upload_multiple')}}</p></label>




                                                            <div class="col-sm-8">
                                                                <p>{{trans('project.group_images_desc')}}</p>

                                                                @if ((!empty(json_decode($group->summary, true)['images'])))
                                                                    @foreach(json_decode($group->summary, true)['images'] as $image)



                                                                        <div class="col-sm-6">

                                                                            <p class="thumbnail"><img src="{{url('storage/projects_groups_images/'.$group->id.'/'.$image)}}" class="featured-image-preview"></p>

                                                                        </div>

                                                                    @endforeach

                                                                @endif



                                                                <input type="file" multiple name="group_images[{{$group->id}}][]" class="form-control">

                                                            </div>

                                                        </div>

                                                        <!-- Project impressions -->
                                                        <div class="form-group">
                                                            <label for="group_impressions[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_impressions')}}</label>

                                                            <div class="col-sm-8">
                                                                <p>{{trans('project.group_impressions_desc')}}</p>

                                                                <textarea name="group_impressions[{{$group->id}}]" id="group_impressions[{{$group->id}}]" class="form-control mceSimple">{!! (empty($group->summary) ? old('group_impressions.'.$group->id) : json_decode($group->summary, true)['impressions']) !!}</textarea>
                                                            </div>
                                                        </div>

                                                        <!-- Group summary -->
                                                        <div class="form-group">
                                                            <label for="group_experience[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_experience')}}</label>

                                                            <div class="col-sm-8">

                                                                <p>{{trans('project.group_experience_desc')}} </p>
                                                                <p>{{trans('project.group_experience_desc2')}} </p>
                                                                <p>{{trans('project.group_experience_desc3')}} </p>
                                                                <p>{{trans('project.group_experience_desc4')}} </p>


                                                                <textarea name="group_experience[{{$group->id}}]" id="group_experience[{{$group->id}}]" class="form-control mceSimple">{!! (empty($group->summary) ? old('group_experience.'.$group->id) : json_decode($group->summary, true)['experience']) !!}</textarea>
                                                            </div>
                                                        </div>


                                                    </div>


                                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                            </div>
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