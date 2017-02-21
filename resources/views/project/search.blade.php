@extends('layouts.app')

@section('content')


    <div class="container">

        {{--Search form--}}
        @include('layouts.search_projects_form', ['url_data' => '/project/search'])


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