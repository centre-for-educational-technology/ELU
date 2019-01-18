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


        <h1>{{trans('project.all')}}</h1>
        @include('project.all')


    </div>





@endsection