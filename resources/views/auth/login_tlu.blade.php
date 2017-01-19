@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('login.login_tlu')}}</div>
                    <div class="panel-body text-center">
                        <div class="btn-group">
                            <a class="btn btn-lg btn-primary" href="{{ url('/login/tlu') }}"><i class="fa fa-btn fa-university"></i>{{trans('login.login_tlu_button')}}</a>


                        </div>
                        <h5><a href="{{ url('login') }}">{{trans('login.no_tlu_button')}}</a></h5>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection