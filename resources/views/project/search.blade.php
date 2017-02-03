@extends('layouts.app')

@section('content')


    <div class="container">

        {{--Search form--}}
        <h1>{{trans('search.search')}}</h1>
        <div class="panel mt2em panel-default">
            <div class="panel-body">
                <div class="row">


                    <form action="{{ url('/project/search') }}" method="GET" class="form-horizontal search-project">
                        {{ csrf_field() }}

                        <div class="col-md-4">

                            <div class="input-group-btn search-panel">
                                <ul class="nav navbar-nav menu01" role="menu">
                                    <li class="active"><a href="#project">{{trans('search.project')}}</a></li>
                                    <li><a href="#member">{{trans('search.team_member')}}</a></li>
                                    <li><a href="#author">{{trans('search.supervisor')}}</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="col-md-10">
                                <div class="form-group nomargin search-input">

                                    <input type="hidden" name="search_param" value="project" id="search_param">
                                    <input type="text" class="form-control" name="search" placeholder="{{trans('search.enter_name')}}">
                                </div>
                            </div>

                            <div class="form-group search">
                                <div class="col-md-2">
                                    <button class="btn btn-primary" type="submit">{{trans('search.search')}}!</button>
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
            @if($param == 'author')
                <h2>"{{$name}}" juhendajat otsingu tulemused</h2>
            @elseif($param == 'member')
                <h2>"{{$name}}" kaaslast otsingu tulemused</h2>
            @elseif($param == 'tag')
                <h2>"{{$name}}" märksõna otsingu tulemused</h2>
            @else
                <h2>"{{$name}}" projekti otsingu tulemused</h2>
            @endif
        @endif



        @include('project.all')




    </div>





@endsection