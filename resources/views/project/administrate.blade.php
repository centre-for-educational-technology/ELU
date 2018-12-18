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


                        @if ($current_project->status != 5)
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
                        @endif

                        @if (Auth::user()->is('superadmin'))
                            <!-- Project status -->
                            <div class="col-lg-6">
                                <h3>{{trans('project.status')}}</h3>
                                <input type="checkbox" name="allow_join" id="allow_join"><span>{{trans('project.allow_join')}}</span>
                            </div>
                        @endif


                        <!-- Project members amount -->
                        <div class="col-lg-12">
                            @php
                                $members_in_project = 0;
                                foreach ($current_project->users as $user) {
			                        if($user->pivot->participation_role == 'member') {
                                        $members_in_project+=1;
                                    }
                                }
                            @endphp

                            <br><h3>{{trans('project.max_members')}}</h3>
                            <select name="max_members" id=max_members>
                                @for ($i=1;$i<=24;$i++)
                                    @if ($i>=$members_in_project)
                                        <option value="{{$i}}" {{$current_project->max_members==$i?"selected":""}}>{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>


                        <!-- Save changes -->
                        <div class="col-lg-12">
                            <br><button type="submit" id="save_administration" class="btn btn-info btn-lg btn-block">{{ trans('project.save_button') }}</button>
                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection