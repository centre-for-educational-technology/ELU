@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')


                <div class="col-sm-offset-2 col-sm-8">
                    <h3><i class="fa fa-btn fa-file-text"></i>Lehtede Haldus</h3>
                    <!-- Current Projects -->
                    @if (count($projects) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Olemasolevad projektid
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped project-table">
                                    <thead>
                                    <th>Projekt</th>
                                    <th>&nbsp;</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td class="table-text"><div>{{ $project->name }}</div></td>

                                            <!-- Project Delete Button -->
                                            <td>

                                                <form action="{{ url('project/'.$project->id) }}" method="GET">
                                                    {{ csrf_field() }}
                                                    {{--{{ method_field('PATCH') }}--}}

                                                    <button type="submit" class="btn btn-warning pull-left">
                                                        <i class="fa fa-btn fa-pencil"></i>Muuda
                                                    </button>
                                                </form>
                                                <form id="delete-project" action="{{ url('project/'.$project->id) }}" method="POST">
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
                            </div>
                        </div>
                    @endif
                </div>











            <!-- Current Projects -->
            {{--@if (count($projects) > 0)--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                        {{--Olemasolevad projektid--}}
                    {{--</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--<table class="table table-striped project-table">--}}
                            {{--<thead>--}}
                            {{--<th>Projekt</th>--}}
                            {{--<th>&nbsp;</th>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach ($projects as $project)--}}
                                {{--<tr>--}}
                                    {{--<td class="table-text"><div>{{ $project->name }}</div></td>--}}

                                    {{--<!-- Project Delete Button -->--}}
                                    {{--<td>--}}

                                        {{--<form action="{{ url('project/'.$project->id) }}" method="GET">--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--{{ method_field('PATCH') }}--}}

                                            {{--<button type="submit" class="btn btn-warning pull-left">--}}
                                                {{--<i class="fa fa-btn fa-pencil"></i>Muuda--}}
                                            {{--</button>--}}
                                        {{--</form>--}}
                                        {{--<form id="delete-project" action="{{ url('project/'.$project->id) }}" method="POST">--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--{{ method_field('DELETE') }}--}}


                                        {{--</form>--}}
                                        {{--<button type="submit" id="delete" class="btn btn-danger pull-right">--}}
                                            {{--<i class="fa fa-btn fa-trash"></i>Kustuta--}}
                                        {{--</button>--}}

                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}

    </div>
@endsection
