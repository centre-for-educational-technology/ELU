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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{trans('project.my_projects')}}
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class="table table-responsive table-striped project-table">
                                <thead>
                                <th>{{trans('project.project')}}</th>
                                <th>{{trans('project.status')}}</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td class="table-text"><div>{{ $project->name }}</div></td>

                                            @if($project->publishing_status == 1)
                                                <td class="table-text green"><div><i class="fa fa-eye"></i> {{trans('project.published')}}</div></td>
                                            @else
                                                <td class="table-text red"><div><i class="fa fa-eye-slash"></i> {{trans('project.hidden')}}</div></td>

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
                                            <form class="delete-project" action="{{ url('project/'.$project->id.'/delete') }}" method="POST">
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
                        </div>

                    </div>
                @endif

            @else

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('project.no_projekt_found')}}</h3>
                    </div>
                    <div class="panel-body">
                        {{trans('project.no_projekt_found_desc')}}
                    </div>
                </div>


            @endif

        </div>
    </div>
@endsection
