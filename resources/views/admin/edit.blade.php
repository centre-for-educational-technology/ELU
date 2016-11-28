@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')


        <div class="col-sm-offset-2 col-sm-8">


            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <h3><i class="fa fa-btn fa-users"></i>Kasutajate rollid</h3>

                </div>
                <div class="panel-body">



                        <table class="table table-striped">
                            <thead>
                            <th>Nimi</th>
                            <th>E-post</th>
                            <th>Roll</th>
                            <th>&nbsp;</th>

                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="table-text"><div>{{ $user->name }}</div></td>
                                    <td class="table-text"><div>{{ $user->email }}</div></td>

                                    @if ($user->roles != null)

                                        <td class="table-text">
                                            @foreach ($user->roles as $role)

                                                <span class="label label-info">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                    @endif

                                <!-- Assign admin Button -->
                                    <td>

                                        @if ($user->is('admin'))

                                            <form action="{{ url('admin/edit/'.$user->id).'/remove' }}" method="POST">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-danger pull-left">
                                                    <i class="fa fa-btn fa-user"></i>Kustuta admini
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ url('admin/edit/'.$user->id).'/add' }}" method="POST">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-warning pull-left">
                                                    <i class="fa fa-btn fa-user"></i>Lisa adminisse
                                                </button>
                                            </form>


                                        @endif



                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                </div>
            </div>
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
