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
                    <form action="{{ url('/project/'.$current_project->id.'/finishv2') }}" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    {{ csrf_field() }}


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

                                                        <h3>{{trans('project.group_results_heading')}}</h3>



                                                        <!--Group images -->
                                                        <div class="form-group">

                                                            <label for="group_images[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_images')}}<p>{{trans('project.can_upload_multiple')}}</p></label>


                                                            <div class="col-sm-8">
                                                                <p>{{trans('project.group_images_desc')}}</p>

                                                                <div class="dropzone" id="groupImagesUpload{{$group->id}}" project-id="{{$current_project->id}}" group-id="{{$group->id}}">
                                                                    <div class="dz-message" data-dz-message><span>{{trans('project.drop_files_upload')}}</span></div>

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


                                                        <h3>{{trans('project.group_materials_heading')}}</h3>

                                                        <button type="button" class="btn btn-default btn-sm add_links_field_button" group-id="{{$group->id}}" aria-label="Left Align">
                                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{trans('project.add_field')}}
                                                        </button>





                                                        <div class="group-materials">

                                                            @if(!empty(old('group_material_name.'.$group->id)))

                                                                @foreach(old('group_material_name.'.$group->id) as $key => $material)

                                                                    <button type="button" class="btn btn-default btn-sm remove_links_field_button" group-id="{{$group->id}}" aria-label="Left Align">
                                                                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> {{trans('project.delete')}}
                                                                    </button>



                                                                    <div id="group-materials_{{$group->id}}_{{$key}}">
                                                                        <!-- Group material name -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_name[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_material_name')}} </label>

                                                                            <div class="col-sm-6">
                                                                                <h3><input type="text" name="group_material_name[{{$group->id}}][]" class="form-control" value="{{old('group_material_name.'.$group->id)[$key]}}"/></h3>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Group material link -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_link[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_material_link')}}</label>

                                                                            <div class="col-sm-6">
                                                                                <input type="text" name="group_material_link[{{$group->id}}][]" value="{{old('group_material_link.'.$group->id)[$key]}}" class="form-control group-links"/>
                                                                            </div>

                                                                        </div>

                                                                        <!-- Group material tags -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_tags[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.keywords')}} <p>{{trans('project.separated_with_commas')}}</p></label>

                                                                            <div class="col-sm-6">
                                                                                <h3><input type="text" name="group_material_tags[{{$group->id}}][]" class="form-control tags" value="{{old('group_material_tags.'.$group->id)[$key]}}" data-role="tagsinput" /></h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                @endforeach


                                                            @elseif(count($group->materials)>0)
                                                                @foreach($group->materials as $key => $material)
                                                                    <button type="button" class="btn btn-default btn-sm remove_links_field_button" group-id="{{$group->id}}" aria-label="Left Align">
                                                                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> {{trans('project.delete')}}
                                                                    </button>


                                                                    <div id="group-materials_{{$group->id}}_{{$key}}">
                                                                        <!-- Group material name -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_name[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_material_name')}} </label>

                                                                            <div class="col-sm-6">
                                                                                <h3><input type="text" name="group_material_name[{{$group->id}}][]" class="form-control" value="{{$material->name}}"/></h3>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Group material link -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_link[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_material_link')}}</label>

                                                                            <div class="col-sm-6">
                                                                                <input type="text" name="group_material_link[{{$group->id}}][]" value="{{$material->link}}" class="form-control group-links"/>
                                                                            </div>

                                                                        </div>

                                                                        <!-- Group material tags -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_tags[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.keywords')}} <p>{{trans('project.separated_with_commas')}}</p></label>

                                                                            <div class="col-sm-6">
                                                                                <h3><input type="text" name="group_material_tags[{{$group->id}}][]" class="form-control tags" value="{{$material->tags}}" data-role="tagsinput" /></h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                @endforeach


                                                            @else
                                                                <button type="button" class="btn btn-default btn-sm remove_links_field_button" group-id="{{$group->id}}" aria-label="Left Align">
                                                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> {{trans('project.delete')}}
                                                                </button>

                                                                <div id="group-materials_{{$group->id}}_0">
                                                                        <!-- Group material name -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_name[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_material_name')}} </label>

                                                                            <div class="col-sm-6">
                                                                                <h3><input type="text" name="group_material_name[{{$group->id}}][]" class="form-control" value=""/></h3>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Group material link -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_link[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.group_material_link')}}</label>

                                                                            <div class="col-sm-6">
                                                                                <input type="text" name="group_material_link[{{$group->id}}][]" class="form-control group-links"/>
                                                                            </div>

                                                                        </div>

                                                                        <!-- Group material tags -->
                                                                        <div class="form-group">
                                                                            <label for="group_material_tags[{{$group->id}}]" class="col-sm-3 control-label">{{trans('project.keywords')}} <p>{{trans('project.separated_with_commas')}}</p></label>

                                                                            <div class="col-sm-6">
                                                                                <h3><input type="text" name="group_material_tags[{{$group->id}}][]" class="form-control tags" value="" data-role="tagsinput" /></h3>
                                                                            </div>
                                                                        </div>
                                                                </div>


                                                            @endif


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