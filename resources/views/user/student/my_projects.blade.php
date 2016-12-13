@extends('layouts.app')

@section('content')


    <div class="container">
        <!-- Example row of columns -->
        {{--<h1>Otsi</h1>--}}
        {{--<div class="panel mt2em panel-default">--}}
        {{--<div class="panel-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-4">--}}
        {{--<ul class="nav navbar-nav menu01">--}}
        {{--<li class="active"><a href="#">Projekti</a></li>--}}
        {{--<li><a href="#">Kaaslast</a></li>--}}
        {{--<li><a href="#">Juhendajat</a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="col-md-8">--}}
        {{--<div class="form-group nomargin">--}}
        {{--<input type="email" class="form-control" placeholder="Sisesta märksõna">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        @if(\Session::has('message'))
            <div class="alert alert-info">
                {{\Session::get('message')}}
            </div>
        @endif

        <h2>Minu projektide nimekiri</h2>

        @if (count($projects) > 0)
            <div class="row">
                <div class="col-md-4 margt">
                    <ul class="nav menu02 menu02b nav-stacked">
                        @foreach($projects as $index =>$project)

                            @if($index == 0)
                                <li role="presentation" class="active"><a data-toggle="tab" href="#project{{$index}}">{{$project->name}}</a></li>
                            @else
                                <li role="presentation"><a data-toggle="tab" href="#project{{$index}}">{{$project->name}}</a></li>
                            @endif
                        @endforeach

                    </ul>



                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{ $projects->links() }}
                        </ul>
                    </nav>
                </div>
                <div class="col-md-8 margt content tab-content">
                    @foreach($projects as $index =>$project)

                        @if($index == 0)
                            <div id="project{{$index}}" class="tab-pane fade in active">
                                @else
                                    <div id="project{{$index}}" class="tab-pane fade">
                                        @endif

                                        <h2>{{ $project->name }}</h2>
                                        <p>{!! $project->embedded !!}</p>
                                        <p><strong>{{ $project->description }}</strong></p>
                                        @if (!empty($project->extra_info))
                                            <h3><span class="glyphicon ico-labyrinth"></span>Lisainfo</h3>
                                            <p>{!! $project->extra_info !!}</p>
                                        @endif


                                        <div class="row mt2em">

                                            <div class="col-md-6">

                                                @if(!empty($project->integrated_areas))

                                                    <h3><span class="glyphicon ico-topics"></span>Lõimitud valdkonnad</h3>
                                                    <ul class="list-unstyled list01">
                                                        @foreach (explode(PHP_EOL, $project->integrated_areas) as $integrated_area)
                                                            <li>{{ $integrated_area }}</li>
                                                        @endforeach
                                                    </ul>

                                                @endif

                                                @if(!empty($project->course))
                                                    <h3><span class="glyphicon ico-status"></span>Seotud kursused</h3>
                                                    <ul class="list-unstyled list01">
                                                        @foreach (explode(PHP_EOL, $project->courses) as $course)
                                                            <li>{{ $course }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                                <h3><span class="glyphicon ico-duration"></span>Projekti kestus</h3>
                                                <ul class="list-unstyled list01">
                                                    @if ( $project->study_term == 0 )
                                                        <li>Sügissemester</li>
                                                    @elseif ( $project->study_term == 1 )
                                                        <li>Kevadsemester</li>
                                                    @endif
                                                    {{--<h3><span class="glyphicon ico-duration"></span>Kestus</h3>--}}
                                                    <li>{{ Str::limit($project->start, 10, '') }} – {{ Str::limit($project->end, 10, '') }}</li>
                                                </ul>



                                                <h3><span class="glyphicon ico-status"></span>Staatus</h3>
                                                <ul class="list-unstyled list01">
                                                    @if ( $project->status == 0 )
                                                        <li>Lõppenud</li>
                                                    @elseif ( $project->status == 1 )
                                                        <li>Aktiivne</li>
                                                    @endif
                                                </ul>
                                            </div>



                                            <div class="col-md-6">


                                                <h3><span class="glyphicon ico-target"></span>Instituut</h3>
                                                <ul class="list-unstyled list01">
                                                    @if ( $project->institute == 0 )
                                                        <li>Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</li>
                                                    @elseif ( $project->institute == 1 )
                                                        <li>Digitehnoloogiate instituut</li>
                                                    @elseif ( $project->institute == 2 )
                                                        <li>Humanitaarteaduste instituut</li>
                                                    @elseif ( $project->institute == 3 )
                                                        <li>Haridusteaduste instituut</li>
                                                    @elseif ( $project->institute == 4 )
                                                        <li>Loodus- ja terviseteaduste instituut</li>
                                                    @elseif ( $project->institute == 5 )
                                                        <li>Rakvere kolledž</li>
                                                    @elseif ( $project->institute == 6 )
                                                        <li>Haapsalu kolledž</li>
                                                    @elseif ( $project->institute == 7 )
                                                        <li>Ühiskonnateaduste instituut</li>
                                                    @endif
                                                </ul>


                                                <h3><span class="glyphicon ico-mentor"></span>Juhendajad</h3>
                                                <ul class="list-unstyled list01 tags">
                                                    @foreach ($project->users as $user)
                                                        @if ( $user->pivot->participation_role == 'author' )
                                                            @if(!empty($user->full_name))
                                                                <li><span class="label label-primary">{{ $user->full_name }}</span></li>
                                                            @else
                                                                <li><span class="label label-primary">{{ $user->name }}</span></li>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </ul>




                                                @if(!empty($project->supervisor))

                                                    <h3><span class="glyphicon ico-mentor"></span>Kaasjuhendajad</h3>
                                                    <ul class="list-unstyled list01 tags">
                                                        @foreach (preg_split("/\\r\\n|\\r|\\n/", $project->supervisor) as $single_cosupervisor)
                                                            <li><li><span class="label label-primary">{{ $single_cosupervisor }}</span></li>
                                                        @endforeach
                                                    </ul>

                                                @endif


                                                <h3><span class="glyphicon ico-tag"></span>Märksõnad</h3>
                                                <ul class="list-unstyled list01 tags">
                                                    @foreach (explode(',', $project->tags) as $tag)
                                                        <li><span class="label label-primary">{{ $tag }}</span></li>

                                                    @endforeach
                                                </ul>



                                            </div>
                                        </div>


                                        <h3><span class="glyphicon ico-inspire"></span>Projektiga liitumine</h3>
                                        {{--Check for join deadline--}}
                                        @if (Carbon\Carbon::today()->format('Y-m-d') > Str::limit($project->join_deadline, 10, ''))
                                            <p class="red"><i class="fa fa-btn fa-frown-o"></i> Tähtaeg on läbi läinud! </p>
                                        @else
                                            @if(Auth::check())

                                                @if ($project->currentUserIs('member'))
                                                    <form action="{{ url('leave/'.$project->id) }}" method="POST">
                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-danger btn-lg">
                                                            Lahkun projektist
                                                        </button>
                                                    </form>

                                                @else
                                                    <form action="{{ url('join/'.$project->id) }}" method="POST">
                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-primary btn-lg">
                                                            Liitun projektiga
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <p>Logi sisse ja liitu projektiga</p>
                                            @endif


                                        @endif



                                        <h3><span class="glyphicon ico-brainstorm"></span>Projekti meeskond</h3>
                                        <h3 class="tag-label">
                                            @foreach ($project->users as $user)
                                                @if ( $user->pivot->participation_role == 'member' )
                                                    @if(!empty($user->full_name))
                                                        <span class="label label-primary">{{ $user->full_name }}
                                                            @if(!empty($user->courses))
                                                                @foreach($user->courses as $course)
                                                                    ({{ $course->name }})
                                                                @endforeach
                                                            @endif
                                            </span>
                                                    @else
                                                        <span class="label label-success">{{ $user->name }}</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </h3>



                                    </div>



                                    @endforeach

                            </div>
                </div>


                @else
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Projekte ei leidnud</h3>
                        </div>
                        <div class="panel-body">
                            Vali soobiva projekti ja liitu sellega!
                        </div>
                    </div>

                @endif

            </div>





@endsection