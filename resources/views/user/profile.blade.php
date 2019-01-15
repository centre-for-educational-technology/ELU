@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-md-8 col-md-offset-2 center-content">
        <div class="row">
            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @elseif(\Session::has('error'))
                <div class="alert alert-danger">
                    {{\Session::get('error')}}
                </div>
            @endif
        </div>

    <div class="row profile-box xtr-padding-top">

        <div class="col-md-12 col-xs-12 xtr-padding-btm life-pink-background xtr-padding-top" align="center">
            <div class="outter"><img src="{{ $user->gravatar }}?s=120&d=mm" class="image-circle"/></div>
            <h1>{{ getUserName($user) }}</h1>
            @if($user->is('student'))
                @if(isTLUUser($user))
                    @if(count($user->courses)>0)
                        <h5>{{ getUserCourse($user) }}</h5>
                    @endif
                    <h6>{{ trans('front.tallinn_university') }}</h6>
                @else
                    <h5>{{ $user->course }}</h5>
                    <h6>{{ $user->institution }}</h6>
                @endif
            @endif

            @foreach ($user->roles as $role)
                <h6><span class="navbar-role">{{ trans('nav.'.$role->name) }}</span></h6>
            @endforeach

        </div>

        <div class="col-12 bg-grey xtr-padding-top xtr-margin-top xtr-padding-btm xtr-margin-btm">

            @if($user->is('oppejoud'))

                <div class="col-md-12 col-xs-12 profile-project teacher line" align="center">
                    <h3><a class="box-hover" href="{{url('teacher/my-projects')}}">{{ trans('project.my_projects') }}</a></h3>
                    @if (count(getTeacherProjects($user)) > 0)
                        @foreach(getTeacherProjects($user) as $project)
                            <h4><a class="box-hover" href="{{ url('project/'.$project->id) }}">{{ $project->name_et }}//{{ $project->name_en }}</a></h4>
                        @endforeach
                    @else
                        <h3><a class="box-hover" href="project/new">{{ trans('project.add') }}</a></h3>
                    @endif
                </div>

            @endif


            @if($user->is('student'))

                @if($user->isMemberOfProject())
                    <div class="col-md-12 col-xs-12 profile-project line" align="center">
                        <h3><a class="box-hover" href="{{ url('project/'.Auth::user()->isMemberOfProject()['id']) }}">
                            {{ trans('user.in_team', ['name' => Auth::user()->isMemberOfProject()['name']]) }}  <i class="fa fa-external-link"></i>
                        </a></h3>
                    </div>
                @else
                    <div class="col-md-12 col-xs-12 profile-project line" align="center">
                        <h3><a class="box-hover" href="{{ url('projects/open') }}">{{ trans('user.not_in_team') }}</a></h3>
                    </div>
                @endif

            @endif

        </div>


        <div class="col-12 xtr-padding-top xtr-padding-btm border-grey">
            @if($user->is('student'))

                @if(isTLUUser($user))
                    <div class="col-12 xtr-padding-top">
                        <div class="col-md-12 col-xs-12 profile-control" id="contact-email-form" align="center">
                            <h3>{{ trans('user.contact_email_heading') }}</h3>
                            <div class="row">
                                <div class="col-12" align="center">
                                    <button class="btn btn-sm btn-info" id="filler">
                                        <i class="fa fa-btn fa-copy"></i>{{ trans('user.copy_tlu_address_button') }}
                                    </button>
                                </div>
                            </div>

                            <form action="{{ url('/profile/update-contact-email') }}" method="POST" class="form-horizontal contact-email">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">{{ trans('user.contact_email') }}</label>

                                    <div class="col-md-6">
                                        <input type="hidden" class="form-control" name="tlu_email" id="tlu_email" value="{{ $user->email }}">
                                        <input type="email" class="form-control contact-email" name="email" value="{{ !empty($user->contact_email) ? $user->contact_email : old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                                    <label for="email_confirmation" class="col-md-4 control-label">{{ trans('user.confirm_contact_email') }}</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control contact-email" name="email_confirmation" value="{{ !empty($user->contact_email) ? $user->contact_email : old('email') }}">
                                        @if ($errors->has('email_confirmation'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Add Project Button -->
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-pencil"></i>{{ trans('project.change_button') }}
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                @endif

            @endif


            @if(!isTLUUser($user))

                <div class="col-md-12 col-xs-12 profile-control" align="center">
                    <h3>{{ trans('user.change_password') }}</h3>
                    <form action="{{ url('/profile/update-password') }}" method="POST" class="form-horizontal new-project">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="current_password" class="col-md-4 control-label">{{ trans('user.current_password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="current_password">

                                @if ($errors->has('current_password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('current_password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ trans('user.new_password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-md-4 control-label">{{ trans('user.confirm_password') }}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <!-- Add Project Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-pencil"></i>{{ trans('project.change_button') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>


            @endif
        </div>

        </div>

    </div>
</div>

@endsection