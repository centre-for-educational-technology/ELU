@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')


        <div class="col-sm-offset-1 col-sm-10">


            {{--Search form--}}
            @include('admin.search_users_form', ['url_data' => '/admin/users/search'])


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



                    <h3><i class="fa fa-btn fa-users"></i>Kasutajad</h3>




                    <div class="table-responsive">
                        <table class="table table-responsive table-striped">
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
                                            <ul class="list-unstyled list01 tags">
                                                @foreach ($user->roles as $role)

                                                    <li><span class="label label-info">{{ $role->name }}</span></li>
                                                @endforeach
                                            </ul>



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
    </div>
@endsection
