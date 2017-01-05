@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Login TLÜ kontoga</div>
                    <div class="panel-body text-center">
                        <div class="btn-group">
                            <a class="btn btn-lg btn-primary" href="{{ url('/login/tlu') }}"><i class="fa fa-btn fa-university"></i>Logi sisse TLÜ kontoga</a>


                        </div>
                        <h5><a href="{{ url('login') }}">Mul ei ole TLÜ kontot</a></h5>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection