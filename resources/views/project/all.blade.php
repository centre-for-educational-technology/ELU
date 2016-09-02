@extends('layouts.app')

@section('content')

    <div class="container">

        {{--Search form--}}
        <div class="col-md-12">

            <form action="{{ url('/project/search') }}" method="GET" class="form-horizontal search-project pull-left">
                {{ csrf_field() }}


                <div class="input-group pull-left col-sm-4">
                    <input type="text" class="form-control" name="search" placeholder="Projekti nimi...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span> Otsi!</button>
                  </span>
                </div><!-- /input-group -->



            </form>


        </div>

        <div class="col-md-12">
            <div class="page-header">
                <h1>ELU Projektide nimekiri <small>Vajuta pealkirjal</small></h1>
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
                                    <p>{{ $project->desciption }}</p>
                                    <p>{!! $project->embedded !!}</p>
                                    <h3>Projekti väljundid</h3>

                                    {{--Explode by new line--}}
                                    @foreach (explode(PHP_EOL, $project->project_outcomes) as $project_outcome)
                                        <p>{{ $project_outcome }}</p>
                                    @endforeach


                                    <h3>Tudengi õpiväljundid</h3>
                                    @foreach (explode(PHP_EOL, $project->student_outcomes) as $student_outcome)
                                        <p>{{ $student_outcome }}</p>
                                    @endforeach

                                    <h3>Seotud kursused</h3>
                                    @foreach (explode(PHP_EOL, $project->courses) as $course)
                                        <p>{{ $course }}</p>
                                    @endforeach
                                    <h3>Kestus</h3>


                                    <p>{{ Str::limit($project->start, 10, '') }} – {{ Str::limit($project->end, 10, '') }}</p>


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
                                    <h3 class="tag-label">
                                    @foreach (explode(PHP_EOL, $project->supervisor) as $single_supervisor)
                                        <span class="label label-success">{{ $single_supervisor }}</span>

                                    @endforeach
                                    </h3>

                                    <h3>Staatus</h3>

                                    @if ( $project->status == 0 )
                                        <p>Lõppenud</p>
                                    @elseif ( $project->status == 1 )
                                        <p>Aktiivne</p>
                                    @endif

                                    <h3>Märksõnad</h3>

                                    <h3 class="tag-label">
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
                {{ $projects->links() }}

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