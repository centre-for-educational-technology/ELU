@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-lg-12">
            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h1>Sulge liitumine projektidesse</h1>

                </div>

                <div class="panel-body">

                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Project Form -->
                    <form action="{{ url('/admin/close-projects') }}" id="project-form" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    {{ csrf_field() }}


                        <!-- Project year -->
                        <div class="col-lg-6">
                            <h3>{{trans('project.study_year')}}</h3>
                            <select name="project_year" id="project_year">
                                @for ($i=(Carbon\Carbon::today()->format('Y')-1);$i<=(Carbon\Carbon::today()->format('Y'));$i++)
                                        <option value="{{$i}}/{{$i+1}}">{{$i}}/{{$i+1}}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Study term -->
                        <div class="col-lg-6">
                            <h3>Semester</h3>
                            <select name="study_term" id=study_term>
                                <option value="0">{{ trans('project.autumn_semester') }}</option>
                                <option value="1">{{ trans('project.spring_semester') }}</option>
                                <option value="2">{{ trans('project.autumn_spring') }}</option>
                                <option value="3">{{ trans('project.spring_autumn') }}</option>
                            </select>
                        </div>


                        <!-- Save changes -->
                        <div class="col-lg-12">
                            <br><button type="submit" id="open_projects_for_joining" class="btn btn-info btn-lg btn-block">Sulge projektid</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
@endsection