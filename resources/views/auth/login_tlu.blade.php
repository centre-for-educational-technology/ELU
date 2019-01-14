@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-4 center-content">
            <a href="{{ url('/login/tlu') }}"><input type="submit" class="submit-form" value="{{ trans('login.login_tlu_button') }}"></a>
        </div>
        <div style="text-align: center;">
            <h5><a href="{{ url('login') }}">{{trans('login.no_tlu_button')}}</a></h5>
        </div>
    </div>


@endsection