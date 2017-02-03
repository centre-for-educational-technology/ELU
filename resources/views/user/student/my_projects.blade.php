@extends('layouts.app')

@section('content')


    <div class="container">

        @if(\Session::has('message'))
            <div class="alert alert-info">
                {{\Session::get('message')}}
            </div>
        @endif

        <h2>{{trans('nav.my_projects_student')}}</h2>


        @include('project.all', ['isTeacher' => false, 'isStudentMyProjectsView' => true])




    </div>





@endsection