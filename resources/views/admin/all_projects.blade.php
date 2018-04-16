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
                                        <td class="table-text"><div>{{ $project->name }}</div></td>

                                        @if($project->publishing_status == 1)
                                            <td class="table-text green"><div><i class="fa fa-eye"></i> Avaldatud</div></td>
                                        @else
                                            <td class="table-text red"><div><i class="fa fa-eye-slash"></i> Peidetud</div></td>

                                        @endif

                                        @if($project->submitted_by_student == 1)
                                            <td class="table-text green"><span class="label label-info">tudengi projektiidee</span></td>
                                        @else
                                            <td></td>
                                        @endif

                                        <td>

                                            <form action="{{ url('project/'.$project->id.'/edit') }}" method="GET">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-warning pull-right">
                                                    <i class="fa fa-btn fa-pencil"></i>{{trans('project.edit')}}
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
