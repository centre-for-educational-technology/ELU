@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="col-sm-offset-1 col-sm-10">

            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            @if (count($projects) > 0)


                @if (count($projects) > 0)

                    <h3><i class="fa fa-paper-plane"></i> Projektiideed tudengite poolt</h3>


                    <div class="table-responsive">
                            <table class="table table-responsive table-striped project-table">
                                <thead>
                                <th>{{trans('project.project')}}</th>

                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                @foreach ($projects as $project)

                                    <tr>
                                        <td class="table-text"><div>{{ $project->name }}</div></td>

                                            @if($project->submitted_by_student == 1)
                                                <td class="table-text green"><span class="label label-info">{{trans('project.student_idea_label')}}</span></td>
                                            @else
                                                <td></td>
                                            @endif

                                            @if($project->requires_review == 0)
                                                <td class="table-text green"><span class="label label-success">{{trans('project.idea_in_use_label')}}</span></td>
                                            @else
                                                <td class="table-text green"><span class="label label-danger">{{trans('project.idea_not_in_use_label')}}</span></td>

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
                                            <form class="delete-project" action="{{ url('admin/all-projects/'.$project->id.'/delete') }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}


                                            </form>
                                            <button type="submit" id="delete" class="btn btn-danger pull-right">
                                                <i class="fa fa-btn fa-trash"></i>{{trans('project.delete')}}
                                            </button>

                                        </td>
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
                        <h3 class="panel-title">Projekte ei leidnud</h3>
                    </div>
                    <div class="panel-body">
                        Tudengid pole veel lisanud projekte.
                    </div>
                </div>


            @endif

        </div>
    </div>
@endsection
