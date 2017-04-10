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
            <li role="presentation" {{ setActive('projects/open') }}><a href="{{url('projects/open')}}">{{trans('search.open_projects')}}</a></li>
            <li role="presentation" {{ setActive('projects/ongoing') }}><a href="{{url('projects/ongoing')}}">{{trans('search.ongoing_projects')}}</a></li>
            <li role="presentation" {{ setActive('projects/finished') }}><a href="{{url('projects/finished')}}">{{trans('search.finished_projects')}}</a></li>
        </ul>

        {{--Search form--}}
        @if(isPath('projects/finished'))
            @include('layouts.search_projects_form', ['url_data' => '/projects/finished/search'])
        @elseif(isPath('projects/ongoing'))
            @include('layouts.search_projects_form', ['url_data' => '/projects/ongoing/search'])
        @else
            @include('layouts.search_projects_form', ['url_data' => '/projects/open/search'])
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





        @if(isPath('projects/finished'))
            @include('project.finished_all')
        @else
            @include('project.all')
        @endif


    </div>





@endsection