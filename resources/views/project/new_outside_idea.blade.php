@extends('layouts.app')

@section('content')
<!-- Pealkiri -->
<div class="col-log-6 col-lg-offset-3">
    <div class="col-lg-12">
        <h2 class="h2 class-uppercase"><b>{{trans('project.outside_adding')}}</b></h2>
    </div>
</div>

<div class="container">

    <!-- Display Validation Errors -->
    @include('common.errors')

    <form action="{{ url('project/new/outside') }}" id="outside_project_form" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="col-lg-6 col-lg-offset-3 panel panel-heading">
            <!-- PROJECT NAME -->
            <div class="col-lg-12 form-group">
                <p><label for="name_et">{{ trans('project.name') }} *</label><p>
                <input class="form-control" type="text" name="name_et" value="{{ old('name_et') }}">
            </div>

            <!-- DESCRIPTION -->
            <div class="col-lg-12 form-group">
                <span class="row"><label for="description_et">
                    {{ trans('project.description') }} *
                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{ trans('project.description_desc') }}"></i>
                </label></span>
                <textarea class="mceSimple" id="description_et" name="description_et">{!! old('description_et') !!}</textarea>
            </div>

            <!-- EXPECTED OUTCOMES -->
            <div class="col-lg-12 form-group">
                <p><label for="project_outcomes_et">
                    {{ trans('project.outcomes') }} *
                    <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="{{trans('project.outcomes_desc')}}"></i>
                </label></p>
                <textarea class="mceSimple" id="project_outcomes_et" name="project_outcomes_et">{!! old('project_outcomes_et') !!}</textarea>
            </div>

            <!-- TAGS -->
            <div class="col-lg-12 form-group">
                <p><label for="tags_et">
                    {{ trans('project.keywords') }} *
                </label></p>
                <input class="form-control tags_et" type="text">
                <span style="visibility: hidden;">{{ trans('project.keywords_desc') }}</span>
            </div>

            <!-- Div to show the selected tags_et to the user -->
            <div id="tags_et_output" class="form-group"></div>

            <!-- To save the tags -->
            <input type="hidden" name="keywords_et" id="keywords_et" value="{{ old('keywords_et') }}">

            <!-- EMAIL -->
            <div class="col-lg-12 form-group">
                <p><label for="email_et">{{ trans('user.contact_email') }} *</label><p>
                <input class="form-control" type="text" name="email_et" value="{{ old('email_et') }}">
            </div>

            <!-- CONTACT PERSON FROM UNIVERSITY -->
            <div class="col-lg-12 form-group">
                <p><label for="university_contact">{{ trans('project.university_contact') }}</label><p>
                <input class="form-control" type="text" name="university_contact" value="{{ old('university_contact') }}">
            </div>

            <!-- RECAPTCHA -->
            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <div class="col-md-6 col-md-offset-3">
                    {!! app('captcha')->display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

        </div>

        <!-- SUBMIT BUTTON -->
        <div class="col-lg-8 col-lg-offset-2" style="padding-left: 7vw; padding-right: 7vw; padding-bottom:15vh;">
            <button type="submit" id="submit_outside_project" class="btn btn-info btn-lg btn-block">{{ trans('project.submit_button') }}</button>
        </div>

    </form>

@endsection