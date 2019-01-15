@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-4 center-content">
        <form role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <table>
                <tr>
                    <th>
                        <div style="padding-top:20px;">{{trans('login.login')}}</div>
                    </th>
                </tr>
                <tr>
                    <td>
                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                            <label class="control-label">{{trans('login.email')}}</label>
                            <div>
                                <input type="email" class="input-field" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                    </td>
                </tr>


                <tr>
                    <td>
                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                            <label class="control-label">{{trans('login.password')}}</label>
                            <div>
                                <input type="password" class="input-field" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> {{trans('login.remember')}}
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i>{{trans('login.login_button')}}
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a class="mpci" href="{{ url('/password/reset') }}">{{trans('login.forgot_password')}}</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection
