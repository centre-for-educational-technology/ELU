@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="col-sm-12">

            {{--Search form--}}
            @include('admin.search_projects_form', ['url_data' => '/admin/all-projects/search'])

            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            @if (count($projects) > 0)


                @if (count($projects) > 0)

                    <h3><i class="fa fa-heartbeat"></i> Kõik projektid</h3>



                            <div class="table-responsive">
                            <table class="table table-striped table-responsive project-table">
                                <thead>
                                <th>Projekt</th>
                                <th>Staatus</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <!--
                                <th>&nbsp;</th>
                                -->
                                </thead>
                                <tbody>
                                @foreach ($projects as $project)

                                    <tr>
                                        @if ($project->languages == 'et' || $project->languages == 'eten')
                                            <td class="table-text"><div><a href="{{ url('project/'.$project->id) }}">{{ $project->name_et }}</a></div></td>
                                        @else
                                            <td class="table-text"><div><a href="{{ url('project/'.$project->id) }}">{{ $project->name_et }}</a></div></td>
                                        @endif

                                        <td>
                                            @if ($project->status == 1 || $project->status == NULL)
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

                                        @if($project->submitted_by_student == 1)
                                            <td class="table-text green"><span class="label label-info">tudengi projektiidee</span></td>
                                        @else
                                            <td></td>
                                        @endif

                                        <td>

                                            <form action="{{ url('project/'.$project->id.'/check') }}" method="GET">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-warning pull-right">
                                                    <i class="fa fa-btn fa-pencil"></i>{{trans('project.final_view')}}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            @if(projectHasUsers($project))
                                                @if (projectHasGroupsWithMembers($project))
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
                                        <!--
                                        <td>
                                            <form class="delete-project" action="{{ url('admin/all-projects/'.$project->id.'/delete') }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}


                                            </form>
                                            <button type="submit" id="delete" class="btn btn-danger pull-right">
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



                @endif

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