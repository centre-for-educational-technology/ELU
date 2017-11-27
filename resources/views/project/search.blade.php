@extends('layouts.app')

@section('content')


    <div class="container">

        @if(\Session::has('message'))

            @if(\Session::get('message')['type'] == 'proposal')
                <div class="alert alert-warning">
                    {{\Session::get('message')['text']}}
                </div>
            @endif


        @endif


        <h1>{{trans('search.search')}}</h1>
        <ul class="nav nav-tabs">
            <li role="presentation" {{ setActive('projects/open/0') }}><a href="{{url('projects/open/0')}}">{{trans('search.open_projects')}}</a></li>
            <li role="presentation" {{ setActive('projects/ongoing/0') }}><a href="{{url('projects/ongoing/0')}}">{{trans('search.ongoing_projects')}}</a></li>
            <li role="presentation" {{ setActive('projects/finished/0') }}><a href="{{url('projects/finished/0')}}">{{trans('search.finished_projects')}}</a></li>
        </ul>

        {{--Search form--}}
        @if(isPath('projects/finished/0'))
            @include('layouts.search_projects_form', ['url_data' => '/projects/finished/0/search'])
        @elseif(isPath('projects/ongoing/0'))
            @include('layouts.search_projects_form', ['url_data' => '/projects/ongoing/0/search'])
        @else
            @include('layouts.search_projects_form', ['url_data' => '/projects/open/0/search'])
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





        @if(isPath('projects/finished/0'))
            @include('project.finished_all')
        @else
            @include('project.all')
        @endif


    </div>





@endsection