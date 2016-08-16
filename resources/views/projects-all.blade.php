@extends('layouts.app')

@section('content')

    <div class="container">



        <div class="col-sm-offset-1 col-sm-10">
            <div class="page-header">
                <h1>IDP Projektide nimekiri <small>Vajuta pealkirjal</small></h1>
            </div>


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
                                <div class="jumbotron" id="project-view">
                                    <h1>{{ $project->name }}</h1>
                                    <p>{{ $project->description }}</p>
                                    <h3>Projekti väljundid</h3>
                                    <p>{{ $project->project_outcomes }}</p>
                                    <h3>Tudengi õpiväljundid</h3>
                                    <p>{{ $project->student_outcomes }}</p>
                                    <h3>Seotud kursused</h3>
                                    <p>{{ $project->courses }}</p>
                                    <h3>Kestus</h3>
                                    <p>{{ $project->start }} – {{ $project->end }}</p>
                                    <h3>Instituut</h3>

                                    @if ( $project->institute == 0 )
                                        <p>Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</p>
                                    @elseif ( $project->institute == 1 )
                                        <p>Digitehnoloogiate instituut</p>
                                    @elseif ( $project->institute == 2 )
                                        <p>Humanitaarteaduste instituut</p>
                                    @elseif ( $project->institute == 3 )
                                        <p>Haridusteaduste instituut</p>
                                    @elseif ( $project->institute == 4 )
                                        <p>Loodus- ja terviseteaduste instituut</p>
                                    @elseif ( $project->institute == 5 )
                                        <p>Rakvere kolledž</p>
                                    @elseif ( $project->institute == 6 )
                                        <p>Haapsalu kolledž</p>
                                    @elseif ( $project->institute == 7 )
                                        <p>Ühiskonnateaduste instituut</p>
                                    @endif

                                    <h3>Juhendaja(d)</h3>
                                    <p>{{ $project->supervisor }}</p>
                                    <h3>Staatus</h3>

                                    @if ( $project->status == 0 )
                                        <p>Lõppenud</p>
                                    @elseif ( $project->status == 1 )
                                        <p>Aktiivne</p>
                                    @endif

                                    <h3>Märksõnad</h3>

                                    <h3>
                                    @foreach (explode(',', $project->tags) as $tag)
                                        <span class="label pull-left label-info">{{ $tag }}</span>

                                    @endforeach
                                    </h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            @else
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Projekte ei leidnud</h3>
                </div>
                <div class="panel-body">
                    Logi sisse ja lisa projekti!
                </div>
            </div>

            @endif

        </div>
    </div>



@endsection