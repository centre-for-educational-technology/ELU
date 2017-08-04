@extends('layouts.app')

@section('content')
<div class="container">


    <div class="col-md-8 col-md-offset-2">
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

    <div class="row profile-box">


        <div class="col-md-12 col-xs-12" align="center">
            {{--<div class="line">--}}
                {{--<h3>--}}
                    {{--{{Carbon\Carbon::now()->format('d.n.Y')}}--}}
                {{--</h3>--}}
            {{--</div>--}}
            <div class="outter"><img src="{{ $user->gravatar }}?s=120&d=mm" class="image-circle"/></div>

            <h1>{{getUserName($user)}}</h1>

            @if($user->is('student'))


                @if(isTLUUser($user))
                    @if(count($user->courses)>0)
                        <h3>{{getUserCourse($user)}}</h3>
                    @endif
                    <h4>{{trans('front.tallinn_university')}}</h4>


                @else
                    <h3>{{$user->course}}</h3>
                    <h4>{{$user->institution}}</h4>
                @endif
            @endif

            <ul class="list-unstyled list01 tags">
                @foreach ($user->roles as $role)
                    <li><h4><span class="label label-primary">{{ trans('nav.'.$role->name) }}</span></h4></li>
                @endforeach
            </ul>
        </div>

        @if($user->is('oppejoud'))

            <div class="col-md-12 col-xs-12 profile-project teacher line" align="center">


                <h3><a href="{{url('teacher/my-projects')}}">{{trans('project.my_projects')}}</a></h3>

                    @if (count(getTeacherProjects($user)) > 0)

                        @foreach(getTeacherProjects($user) as $project)
                        <h4><a href="{{url('project/'.$project->id)}}">{{$project->name}} <i class="fa fa-external-link"></i></a></h4>
                        @endforeach

                    @else
                        <h3>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> {{trans('front.add')}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/project/new?lang=et') }}">Eesti keeles</a></li>
                                    <li><a href="{{ url('/project/new?lang=en') }}">In english</a></li>
                                </ul>
                            </li>
                        </h3>
                    @endif
            </div>
        @endif


        @if($user->is('student'))

            @if($user->isMemberOfProject())
                <a href="{{url('project/'.Auth::user()->isMemberOfProject()['id'])}}">
                    <div class="col-md-12 col-xs-12 profile-project line" align="center">

                        <h3>
                            {{trans('user.in_team', ['name' => Auth::user()->isMemberOfProject()['name']])}}  <i class="fa fa-external-link"></i>

                        </h3>

                    </div>
                </a>

            @else
                <a href="{{url('projects/open')}}">
                    <div class="col-md-12 col-xs-12 profile-project line" align="center">
                        <h3>

                            {{trans('user.not_in_team')}}

                        </h3>
                    </div>
                </a>
            @endif



            @if(isTLUUser($user))

                <div class="col-md-12 col-xs-12 profile-control" id="contact-email-form">
                    <h3>{{trans('user.contact_email_heading')}}</h3>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-sm btn-info" id="filler">
                                <i class="fa fa-btn fa-copy"></i>{{trans('user.copy_tlu_address_button')}}
                            </button>
                        </div>
                    </div>

                    <form action="{{ url('/profile/update-contact-email') }}" method="POST" class="form-horizontal contact-email">
                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{trans('user.contact_email')}}</label>

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
                            <label for="email_confirmation" class="col-md-4 control-label">{{trans('user.confirm_contact_email')}}</label>
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
                                    <i class="fa fa-btn fa-pencil"></i>{{trans('project.change_button')}}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>


            @endif


        @endif

        @if(!isTLUUser($user))


            <div class="col-md-12 col-xs-12 profile-control">
                <h3>{{trans('user.change_password')}}</h3>
                <form action="{{ url('/profile/update-password') }}" method="POST" class="form-horizontal new-project">
                    {{ csrf_field() }}


                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                        <label for="current_password" class="col-md-4 control-label">{{trans('user.current_password')}}</label>

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
                        <label for="password" class="col-md-4 control-label">{{trans('user.new_password')}}</label>

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
                        <label for="password_confirmation" class="col-md-4 control-label">{{trans('user.confirm_password')}}</label>
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
                                <i class="fa fa-btn fa-pencil"></i>{{trans('project.change_button')}}
                            </button>
                        </div>
                    </div>

                </form>

            </div>


        @endif




        </div>


    </div>
</div>

@endsection