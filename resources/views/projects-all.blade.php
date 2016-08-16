@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="col-sm-offset-2 col-sm-8">


            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            @if (count($projects) > 0)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach ($projects as $index => $project)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{ $index }}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                    {{ $project->name }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{ $index }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $index }}">
                            <div class="panel-body">
                                {{ $project->description }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>



@endsection