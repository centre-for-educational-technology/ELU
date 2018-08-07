@extends('layouts.app')

@section('content')
<!-- Pealkiri -->
<div class="col-log-6 col-lg-offset-3">
    <div class="col-lg-12">
        <h2 class="h2 class-uppercase"><b>{{trans('project.outside_adding')}}</b></h2>
    </div>
</div>

<div class="container">

    <div class="col-lg-6 col-lg-offset-3 panel panel-heading">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- PROJECT NAME -->
        <div class="col-lg-12 form-group">
            <p><label for="name_et">{{ trans('project.name') }} *</label><p>
            <p>{{ $project->name }}</p>
        </div>

        <!-- DESCRIPTION -->
        <div class="col-lg-12 form-group">
            <span class="row"><label for="description_et">
                {{ trans('project.description') }} *
                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{ trans('project.description_desc') }}"></i>
            </label></span>
            <p>{!! $project->description !!}</p>
        </div>

        <!-- EXPECTED OUTCOMES -->
        <div class="col-lg-12 form-group">
            <p><label for="project_outcomes_et">
                {{ trans('project.outcomes') }} *
                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{trans('project.outcomes_desc')}}"></i>
            </label></p>
            <p>{!! $project->project_outcomes !!}</p>
        </div>

        <!-- TAGS -->
        <div class="col-lg-12 form-group">
            <p><label for="tags_et">
                {{ trans('project.keywords') }} *
            </label></p>
            <input class="form-control tags_et" type="text" style="display:none;">
        </div>

        <!-- Div to show the selected tags_et to the user -->
        <div id="tags_et_output" class="form-group"></div>

        <!-- To save the tags -->
        <input type="hidden" name="keywords_et" id="keywords_et" value="{{ $project->tags }}">

        <!-- EMAIL -->
        <div class="col-lg-12 form-group">
            <p><label for="email_et">{{ trans('user.contact_email') }} *</label><p>
            <p>{{ $project->email }}</p>
        </div>

        <!-- CONTACT PERSON FROM UNIVERSITY -->
        <div class="col-lg-12 form-group">
            <p><label for="university_contact">{{ trans('project.university_contact') }}</label><p>
            <p>{{ $project->tlu_contact }}</p>
        </div>

    </div>

@endsection