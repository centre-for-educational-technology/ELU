@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="col-sm-12">

            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            @if (count($new_projects) > 0)

                            <h3><i class="fa fa-pencil"></i> {{trans('project.my_projects')}}</h3>



                            <div class="table-responsive">
                            <table class="table table-responsive table-striped project-table">
                                <thead>
                                <th>{{trans('project.project')}}</th>
                                <!--
                                <th>{{trans('project.publishing_status')}}</th>
                                -->
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>{{trans('project.status')}}</th>
                                <!--
                                <th>&nbsp;</th>
                                -->
                                </thead>
                                <tbody>
                                @foreach ($new_projects as $project)
                                    <tr>
                                        @if ($project->name_et)
                                            <td class="table-text"><div>{{ $project->name_et }}</div></td>
                                        @else
                                            <td class="table-text"><div>{{ $project->name_en }}</div></td>
                                        @endif

                                            @if($project->publishing_status == 1)
                                                <!--
                                                <td class="table-text green"><div><i class="fa fa-eye"></i> {{trans('project.published')}}</div></td>
                                                -->
                                            @else
                                                <!--
                                                <td class="table-text red"><div><i class="fa fa-eye-slash"></i> {{trans('project.hidden')}}</div></td>
                                                -->

                                            @endif

                                        <td>

                                            @if($project->status == 1 || $project->status == 3)

                                                <form action="{{ url('new-project/'.$project->id.'/edit') }}" method="GET">
                                                    {{ csrf_field() }}
                                                    {{--{{ method_field('PATCH') }}--}}

                                                    <button type="submit" class="btn btn-warning pull-right btn-sm">
                                                        <i class="fa fa-btn fa-pencil"></i>{{trans('project.edit')}}
                                                    </button>
                                                </form>

                                            @elseif ($project->status == 5)

                                                <form action="{{ url('new-project/'.$project->id.'/temporary-view') }}" method="GET">
                                                    {{ csrf_field() }}
                                                    {{--{{ method_field('PATCH') }}--}}

                                                    <button type="submit" class="btn btn-warning pull-right btn-sm">
                                                        <i class="fa fa-btn fa-pencil"></i>{{trans('project.final_view')}}
                                                    </button>
                                                </form>

                                            @endif
                                        </td>
                                        <!--
                                        -->
                                        <td>
                                            @if(newProjectHasUsers($project))
                                                @if (newProjectHasGroupsWithMembers($project))
                                                    <div class="col-lg-12 text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-primary" href="{{ url('project/'.$project->id.'/calculate-load') }}"><i class="fa fa-btn fa-calculator"></i> {{trans('project.calc_load')}}</a>
                                                        </div>
                                                    </div>

                                                @else
                                                    <div class="col-lg-12 text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-primary disabled" href="#"><i class="fa fa-btn fa-calculator"></i> {{trans('project.calc_load')}}</a>
                                                        </div>
                                                    </div>


                                                @endif
                                            @else

                                                <div class="col-lg-12 text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-primary disabled" href="#"><i class="fa fa-btn fa-calculator"></i> {{trans('project.calc_load')}}</a>
                                                    </div>
                                                </div>

                                            @endif
                                        </td>
                                        <td>
                                            @if(newProjectHasUsers($project))
                                                @if (newProjectHasGroupsWithMembers($project))

                                                    <div class="col-lg-12 text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-primary not-empty my-projects-view" id="groups-finish-button" href="{{ url('project/'.$project->id.'/finish') }}"><i class="fa fa-btn fa-flag-checkered"></i>{{trans('project.finish_project_button')}}</a>
                                                        </div>
                                                    </div>

                                                @else
                                                    <div class="col-lg-12 text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-primary my-projects-view" project_id="{{$project->id}}" id="groups-finish-button" href="{{ url('project/'.$project->id.'/finish') }}"><i class="fa fa-btn fa-flag-checkered"></i>{{trans('project.finish_project_button')}}</a>
                                                        </div>
                                                    </div>


                                                @endif
                                            @else

                                                <div class="col-lg-12 text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-primary disabled my-projects-view" id="groups-finish-button" href="{{ url('project/'.$project->id.'/finish') }}"><i class="fa fa-btn fa-flag-checkered"></i>{{trans('project.finish_project_button')}}</a>
                                                    </div>
                                                </div>

                                            @endif
                                        </td>
                                        <td>
                                            <?php
                                            /*
                                            @if(newProjectHasGroupsWithMembers($project) && $project->status == 0)
                                                @if(isProjectResultsFilledIn($project))
                                                    <span class="label label-success">{{trans('project.summary_completed_status')}}</span>
                                                @else
                                                    <span class="label label-danger">{{trans('project.summary_not_completed_status')}}</span>
                                                @endif

                                            @else
                                                <span class="label label-info">{{trans('project.active_status')}}</span>
                                            @endif
                                            */
                                            ?>
                                            @if ($project->status == 1)
                                                <span class="label label-default">{{trans('project.status_saved')}}</span>
                                            @elseif ($project->status == 2)
                                                <span class="label label-info">{{trans('project.status_to_be_checked')}}</span>
                                            @elseif ($project->status == 3)
                                                <span class="label label-danger">{{trans('project.status_needs_change')}}</span>
                                            @elseif ($project->status == 4)
                                                <span class="label label-info">{{trans('project.status_council_check')}}</span>
                                            @elseif ($project->status == 5)
                                                <span class="label label-success">{{trans('project.status_active')}}</span>
                                            @endif
                                        </td>
                                        <!--
                                        <td>
                                            <form class="delete-project" action="{{ url('project/'.$project->id.'/delete') }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}


                                            </form>
                                            <button type="submit" id="delete" class="btn btn-danger btn-sm pull-right">
                                                <i class="fa fa-btn fa-trash"></i>{{trans('project.delete')}}
                                            </button>

                                        </td>
                                        -->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            {{ $projects->links() }}

            @else

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('project.no_project_found')}}</h3>
                    </div>
                    <div class="panel-body">
                        @if (!Auth::guest())
                            {{trans('project.no_project_found_desc_logged')}}
                        @else
                            {{trans('project.no_project_found_desc_not_logged')}}
                        @endif
                    </div>
                </div>


            @endif

        </div>
    </div>
@endsection
