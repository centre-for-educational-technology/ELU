@extends('layouts.app')

@section('content')


    <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h1>
                        Lehte ei leitud.
                    </h1>
                    <h1>
                        /
                    </h1>
                    <h1>
                        Page not found.
                    </h1>
                    <a class="btn btn-primary btn-lg" href="{{url('/projects/open')}}" role="button">
                        Otsi projekt / Search project
                    </a>

                </div>
            </div>

    </div>


@endsection
