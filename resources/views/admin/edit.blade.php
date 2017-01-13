@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')


        <div class="col-sm-offset-1 col-sm-10">


            {{--Search form--}}
            <h3>Otsi</h3>
            <div class="panel mt2em panel-default">
                <div class="panel-body">
                    <div class="row">


                        <form action="{{ url('/admin/users/search') }}" method="GET" class="form-horizontal search-users">
                            {{ csrf_field() }}

                            <div class="col-md-4">

                                <div class="input-group-btn search-panel">
                                    <ul class="nav navbar-nav menu01" role="menu">
                                        <li class="active"><a href="#name">Nime</a></li>
                                        <li><a href="#email">E-posti</a></li>
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


            @if(!empty($param))
                @if($param == 'name')
                    <h2>"{{$name}}" nime järgi otsingu tulemused</h2>
                @elseif($param == 'email')
                    <h2>"{{$name}}" e-posti järgi otsingu tulemused</h2>
                @endif
            @endif


            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-btn fa-users"></i>Kasutajad
                </div>
                <div class="panel-body">



                        <table class="table table-striped">
                            <thead>
                            <th>Nimi</th>
                            <th>E-post</th>
                            <th>Roll</th>
                            <th>Lisa halduriks</th>
                            <th>Lisa õppejõuks</th>

                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    @if(!empty($user->full_name))
                                        <td class="table-text"><div>{{ $user->full_name }}</div></td>
                                    @else
                                        <td class="table-text"><div>{{ $user->name }}</div></td>
                                    @endif

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

                                            <form action="{{ url('admin/users/'.$user->id).'/remove-admin' }}" method="POST">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-danger pull-left">
                                                    <i class="fa fa-btn fa-star"></i>Kustuta
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ url('admin/users/'.$user->id).'/add-admin' }}" method="POST">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-warning pull-left">
                                                    <i class="fa fa-btn fa-star"></i>Lisa
                                                </button>
                                            </form>


                                        @endif



                                    </td>

                                    <!-- Assign teacher Button -->
                                    <td>

                                        @if ($user->is('oppejoud'))

                                            <form action="{{ url('admin/users/'.$user->id).'/remove-teacher' }}" method="POST">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-danger pull-left">
                                                    <i class="fa fa-btn fa-university"></i>Kustuta
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ url('admin/users/'.$user->id).'/add-teacher' }}" method="POST">
                                                {{ csrf_field() }}
                                                {{--{{ method_field('PATCH') }}--}}

                                                <button type="submit" class="btn btn-warning pull-left">
                                                    <i class="fa fa-btn fa-university"></i>Lisa
                                                </button>
                                            </form>


                                        @endif

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->render() !!}

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
