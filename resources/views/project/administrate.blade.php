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
                            <h3 class="panel-title"><i class="fa fa-pencil"></i> {{trans('project.administrate')}} {{!empty($current_project->name_et)?$current_project->name_et:""}} {{$current_project->languages=="eten"?"//":""}} {{!empty($current_project->name_en)?$current_project->name_en:""}}<span class='label label-info'>{{trans('project.student_idea_label')}}</span> <span class='label label-danger'>{{trans('project.idea_not_in_use_label')}}</span></h3>
                        @else
                            <h3 class="panel-title"><i class="fa fa-pencil"></i> {{trans('project.administrate')}} {{!empty($current_project->name_et)?$current_project->name_et:""}} {{$current_project->languages=="eten"?"//":""}} {{!empty($current_project->name_en)?$current_project->name_en:""}}<span class='label label-info'>{{trans('project.student_idea_label')}}</span> <span class='label label-success'>{{trans('project.idea_in_use_label')}}</span></h3>
                        @endif

                    @else
                        <h3 class="panel-title"><i class="fa fa-pencil"></i> {{trans('project.administrate')}} {{!empty($current_project->name_et)?$current_project->name_et:""}} {{$current_project->languages=="eten"?"//":""}} {{!empty($current_project->name_en)?$current_project->name_en:""}}</h3>
                    @endif

                </div>

                <div class="panel-body">

                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Project Form -->
                    <form action="{{ url('/project/'.$current_project->id).'/administrate' }}" id="project-form" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    {{ csrf_field() }}


                        <!-- Project year -->
                        <div class="col-lg-6">
                            <h3>{{trans('project.study_year')}}</h3>
                            <select name="project_year" id="project_year">
                                @for ($i=(Carbon\Carbon::today()->format('Y')-1);$i<(Carbon\Carbon::today()->format('Y')+2);$i++)
                                    @if (substr($current_project->project_year, 0, 4)==$i)
                                        <option value="{{$i}}/{{$i+1}}" selected>{{$i}}/{{$i+1}}</option>
                                    @else
                                        <option value="{{$i}}/{{$i+1}}">{{$i}}/{{$i+1}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>

                        @if (Auth::user()->is('superadmin'))
                            <!-- Project status -->
                            <div class="col-lg-6">
                                <h3>{{trans('project.status')}}</h3>
                                <input type="checkbox" name="allow_join" id="allow_join"><span>{{trans('project.allow_join')}}</span>
                            </div>
                        @endif


                        <!-- Project members amount -->
                        <div class="col-lg-12">
                            <br><h3>{{trans('project.max_members')}}</h3>
                            <select name="max_members" id=max_members>
                                @for ($i=1;$i<4;$i++)
                                    <option value="{{$i*8}}" {{$current_project->max_members==$i*8?"selected":""}}>{{$i*8}}</option>
                                @endfor
                            </select>
                        </div>


                        <!-- Save changes -->
                        <div class="col-lg-12">
                            <br><button type="submit" id="save_administration" class="btn btn-info btn-lg btn-block">{{ trans('project.save_button') }}</button>
                        </div>


                    </form>
                </div>
    
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
                                                            <span class="label label-success">{{ getCourseName($course) }}</span>
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