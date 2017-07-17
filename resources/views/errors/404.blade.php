@extends('layouts.app')

@section('content')


    <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h1>
                        404. {{trans('errors.404')}}
                    </h1>
                    <a class="btn btn-primary btn-lg" href="{{url('/projects/open')}}" role="button">
                        {{trans('errors.button_search')}}
                    </a>

                </div>
            </div>

    </div>


@endsection
