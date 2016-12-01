@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="col-sm-offset-2 col-sm-8">

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

                                        <td>

                                            <form action="{{ url('project/'.$project->id) }}" method="GET">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-warning pull-right">
                                                    <i class="fa fa-btn fa-pencil"></i>Muuda
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form class="delete-project" action="{{ url('admin/all-projects/'.$project->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}


                                            </form>
                                            <button type="submit" id="delete" class="btn btn-danger pull-right">
                                                <i class="fa fa-btn fa-trash"></i>Kustuta
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
                        <h3 class="panel-title">Projekte ei leidnud</h3>
                    </div>
                    <div class="panel-body">
                        Logi sisse ja lisa projekti!
                    </div>
                </div>


            @endif

        </div>
    </div>
@endsection
