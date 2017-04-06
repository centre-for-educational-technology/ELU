@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('auth.register')}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('auth.name')}}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('auth.email')}}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
                            <label for="institution" class="col-md-4 control-label">{{trans('project.institute')}}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="institution" name="institution">
                                    @php
                                        $institutes_array = array('Eesti Kunstiakadeemia', 'Eesti Maaülikool', 'Eesti Muusika- ja Teatriakadeemia', 'Tallinna Tehnikaülikool', 'Tartu Ülikool', trans('auth.other'));
                                    @endphp

                                    <option value="{{$institutes_array[0]}}" {{old('status') == $institutes_array[0] ? 'selected' : ''}}>{{$institutes_array[0]}}</option>
                                    <option value="{{$institutes_array[1]}}" {{old('status') == $institutes_array[1] ? 'selected' : ''}}>{{$institutes_array[1]}}</option>
                                    <option value="{{$institutes_array[2]}}" {{old('status') == $institutes_array[2] ? 'selected' : ''}}>{{$institutes_array[2]}}</option>
                                    <option value="{{$institutes_array[3]}}" {{old('status') == $institutes_array[3] ? 'selected' : ''}}>{{$institutes_array[3]}}</option>
                                    <option value="{{$institutes_array[4]}}" {{old('status') == $institutes_array[4] ? 'selected' : ''}}>{{$institutes_array[4]}}</option>
                                    <option value="{{$institutes_array[5]}}" {{old('status') == $institutes_array[5] ? 'selected' : ''}}>{{$institutes_array[5]}}</option>

                                </select>

                                @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>



                        <div id="other-institution" class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}" style="display:none;">
                            <label class="col-md-4 control-label" for="other-institution"></label>

                            <div class="col-md-6">
                                <input type="text" name="other-institution" class="form-control" placeholder="{{trans('auth.specify_institution')}}"/>

                                @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>



                        <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                            <label for="course" class="col-md-4 control-label">{{trans('auth.field')}}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="course" value="{{ old('course') }}">

                                @if ($errors->has('course'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('auth.password')}}</label>

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
                            <label class="col-md-4 control-label">{{trans('auth.confirm_password')}}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                            <div class="col-md-6 col-md-offset-4">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>{{trans('auth.register')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
