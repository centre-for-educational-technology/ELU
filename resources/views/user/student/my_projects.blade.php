@extends('layouts.app')

@section('content')


    <div class="container">

        @if(\Session::has('message'))

                @if(\Session::get('message')['type'] == 'joined')
                <div class="alert alert-info">
                    {{\Session::get('message')['text']}}


                    <a href="{{url('project/'.\Session::get('project')['id'])}}" data-image="{{ url(asset('/css/bg05.png')) }}" data-title="{{\Session::get('project')['name']}}" data-desc="{{ str_limit(strip_tags(\Session::get('project')['description']), 150) }}" class="btnShare btn btn-social btn-social-icon btn-facebook">
                        <span class="fa fa-facebook"></span>
                    </a>

                    <a class="btn btn-social btn-social-icon btn-twitter"
                       href="https://twitter.com/intent/tweet?text={{rawurlencode(trans('project.twitter_share_joined_message'))}}%20{{ rawurlencode('"'.str_limit(\Session::get('project')['name'], 65).'"') }}%20{{url('project/'.\Session::get('project')['id'])}}"
                       hashtags="elu,tlu">
                        <span class="fa fa-twitter"></span>
                    </a>

                </div>
                @elseif(\Session::get('message')['type'] == 'left')
                <div class="alert alert-danger">
                    {{\Session::get('message')['text']}}
                </div>
                @elseif(\Session::get('message')['type'] == 'proposal')
                <div class="alert alert-warning">
                    {{\Session::get('message')['text']}}
                </div>
                @endif


        @endif

        <h1><i class="fa fa-lightbulb-o"></i> {{trans('nav.my_projects_student')}}</h1>


        @include('project.all', ['isTeacher' => false, 'isStudentMyProjectsView' => true])




    </div>





@endsection