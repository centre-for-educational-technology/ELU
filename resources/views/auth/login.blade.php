@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Login TLÜ kontoga</div>
                <div class="panel-body text-center">
                    <div class="btn-group">
                        <a class="btn btn-lg btn-primary" href="{{ url('/login/tlu') }}"><i class="fa fa-btn fa-university"></i>Logi sisse TLÜ kontoga</a>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Logi sisse</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-post</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Parool</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Jäta mind meelde
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group login">
                            <div class="col-md-6 col-md-offset-4">



                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Logi sisse
                                    </button>
                                </div>

                                <a class="btn btn-success" href="{{ url('/register') }}"><i class="fa fa-btn fa-user"></i> Registreeru</a>


                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Unustasid parooli?</a>




                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
