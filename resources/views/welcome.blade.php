@extends('layouts.app')

@section('content')
    <div class="container">
        {{--Search form--}}


        <div class="col-md-12 search">

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

        </div>

        <div class="col-md-12">
            <div class="col-md-6">


                @if (count($projects) > 0)

                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><h3>Uuemad Projektid</h3></div>
                        <div class="panel-body">
                            <h4>Siin on viimaste projektide nimekiri</h4>
                        </div>

                        <table class="table table-striped">
                            <tbody>
                            @foreach ($projects as $index => $project)
                                <tr>

                                    <td>

                                        <h4 class="list-group-item-heading">{{ $project->name }}</h4>

                                        @if ( $project->institute == 0 )
                                            <p class="list-group-item-text">Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</p>
                                        @elseif ( $project->institute == 1 )
                                            <p class="list-group-item-text">Digitehnoloogiate instituut</p>
                                        @elseif ( $project->institute == 2 )
                                            <p class="list-group-item-text">Humanitaarteaduste instituut</p>
                                        @elseif ( $project->institute == 3 )
                                            <p class="list-group-item-text">Haridusteaduste instituut</p>
                                        @elseif ( $project->institute == 4 )
                                            <p class="list-group-item-text">Loodus- ja terviseteaduste instituut</p>
                                        @elseif ( $project->institute == 5 )
                                            <p class="list-group-item-text">Rakvere kolledž</p>
                                        @elseif ( $project->institute == 6 )
                                            <p class="list-group-item-text">Haapsalu kolledž</p>
                                        @elseif ( $project->institute == 7 )
                                            <p class="list-group-item-text">Ühiskonnateaduste instituut</p>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td>
                                    <a href="projects-all" class="btn btn-success pull-right" role="button"><i class="fa fa-btn fa-eye"></i>Näita Rohkem</a>

                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>





                @else
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Projekte ei leidnud</h3>
                        </div>
                        <div class="panel-body">
                            Logi sisse ja lisa projekti!
                        </div>
                    </div>

                @endif
            </div>
            <div class="col-md-6">
                <div class="bs-callout bs-callout-info" id="callout-navs-tabs-plugin"> <h3>Viimane Uudis</h3> <p>{!! nl2br($news->body) !!}</p> </div>
            </div>
            <div class="col-md-6 pull-right">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>KKK</h3></div>

                    <div class="panel-body">
                        {!! str_limit(nl2br($faq->body), $limit = 500, $end = '... <a href="faq">Loe edasi</a>')  !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="bs-callout bs-callout-info" id="callout-navs-tabs-plugin"> <h3>Üldinfo</h3> <p>{!! nl2br($info->body) !!}</p> </div>
            </div>
        </div>

    </div>
@endsection
