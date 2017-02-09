@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="col-sm-offset-1 col-sm-10">

            {{--Search form--}}
            <h3>Otsi</h3>
            <div class="panel mt2em panel-default">
                <div class="panel-body">
                    <div class="row">


                        <form action="{{ url('/admin/all-projects/search') }}" method="GET" class="form-horizontal search-users">
                            {{ csrf_field() }}

                            <div class="col-md-4">

                                <div class="input-group-btn search-panel">
                                    <ul class="nav navbar-nav menu01" role="menu">
                                        <li class="active"><a href="#project">Projekti</a></li>
                                        <li><a href="#member">Kaaslast</a></li>
                                        <li><a href="#author">Juhendajat</a></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="col-md-8">
                                <div class="col-xs-10">
                                    <div class="form-group nomargin">

                                        <input type="hidden" name="search_param" value="name" id="search_param">
                                        <input type="text" class="form-control" name="search" placeholder="Otsingusõna">
                                    </div>
                                </div>

                                <div class="form-group search">
                                    <div class="col-xs-2">
                                        <button class="btn btn-primary" type="submit">Otsi!</button>
                                    </div>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>

            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            @if (count($projects) > 0)


                @if (count($projects) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kõik projektid
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped project-table">
                                <thead>
                                <th>Projekt</th>
                                <th>Staatus</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
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
