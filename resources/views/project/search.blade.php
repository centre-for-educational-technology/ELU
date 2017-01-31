@extends('layouts.app')

@section('content')


    <div class="container">


        {{--Search form--}}
        <h1>{{trans('search.search')}}</h1>
        <div class="panel mt2em panel-default">
            <div class="panel-body">
                <div class="row">

                    <form action="{{ url('/project/search') }}" method="GET" class="form-horizontal search-project">
                        {{ csrf_field() }}

                        <div class="col-md-4">

                            <div class="input-group-btn search-panel">
                                <ul class="nav navbar-nav menu01" role="menu">
                                    <li class="active"><a href="#project">{{trans('search.project')}}</a></li>
                                    <li><a href="#member">{{trans('search.team_member')}}</a></li>
                                    <li><a href="#author">{{trans('search.supervisor')}}</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="col-xs-10">
                                <div class="form-group nomargin">

                                    <input type="hidden" name="search_param" value="project" id="search_param">
                                    <input type="text" class="form-control" name="search" placeholder="{{trans('search.enter_name')}}">
                                </div>
                            </div>

                            <div class="form-group search">
                                <div class="col-xs-2">
                                    <button class="btn btn-primary" type="submit">{{trans('search.search')}}!</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>



        @if(\Session::has('message'))
            <div class="alert alert-info">
                {{\Session::get('message')}}
            </div>
        @endif


        @if($param == 'author')
            <h2>"{{$name}}" juhendajat otsingu tulemused</h2>
        @elseif($param == 'member')
            <h2>"{{$name}}" kaaslast otsingu tulemused</h2>
        @elseif($param == 'tag')
            <h2>"{{$name}}" märksõna otsingu tulemused</h2>
        @else
            <h2>"{{$name}}" projekti otsingu tulemused</h2>
        @endif

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
                            {!! $projects->render() !!}
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
                                            <h3><span class="glyphicon ico-labyrinth"></span>{{trans('project.extra_info')}}</h3>
                                            <p>{!! $project->extra_info !!}</p>
                                        @endif


                                        <div class="row mt2em">

                                            <div class="col-md-6">

                                                @if(!empty($project->integrated_areas))

                                                    <h3><span class="glyphicon ico-topics"></span>{{trans('project.integrated_study_areas')}}</h3>
                                                    <ul class="list-unstyled list01">
                                                        @foreach (explode(PHP_EOL, $project->integrated_areas) as $integrated_area)
                                                            <li>{{ $integrated_area }}</li>
                                                        @endforeach
                                                    </ul>

                                                @endif

                                                @if(!empty($project->course))
                                                    <h3><span class="glyphicon ico-status"></span>{{trans('project.related_courses')}}</h3>
                                                    <ul class="list-unstyled list01">
                                                        @foreach (explode(PHP_EOL, $project->courses) as $course)
                                                            <li>{{ $course }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                                <h3><span class="glyphicon ico-duration"></span>{{trans('project.duration')}}</h3>
                                                <ul class="list-unstyled list01">
                                                    @if ( $project->study_term == 0 )
                                                        <li>{{trans('project.autumn_semester')}}</li>
                                                    @elseif ( $project->study_term == 1 )
                                                        <li>{{trans('project.spring_semester')}}</li>
                                                    @endif
                                                    {{--<h3><span class="glyphicon ico-duration"></span>Kestus</h3>--}}
                                                    {{--<li>{{ Str::limit($project->start, 10, '') }} – {{ Str::limit($project->end, 10, '') }}</li>--}}
                                                </ul>



                                                <h3><span class="glyphicon ico-status"></span>{{trans('project.status')}}</h3>
                                                <ul class="list-unstyled list01">
                                                    @if ( $project->status == 0 )
                                                        <li>{{trans('project.finished')}}</li>
                                                    @elseif ( $project->status == 1 )
                                                        <li>{{trans('project.active')}}</li>
                                                    @endif
                                                </ul>


                                                <h3><span class="glyphicon ico-target"></span>{{trans('project.language')}}</h3>
                                                <ul class="list-unstyled list01">
                                                    @if ( $project->language == 'et' )
                                                        <li>Eesti</li>
                                                    @elseif ( $project->language == 'en' )
                                                        <li>English</li>
                                                    @endif
                                                </ul>
                                            </div>



                                            <div class="col-md-6">


                                                {{--<h3><span class="glyphicon ico-target"></span>Instituut</h3>--}}
                                                {{--<ul class="list-unstyled list01">--}}
                                                    {{--@if ( $project->institute == 0 )--}}
                                                        {{--<li>Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</li>--}}
                                                    {{--@elseif ( $project->institute == 1 )--}}
                                                        {{--<li>Digitehnoloogiate instituut</li>--}}
                                                    {{--@elseif ( $project->institute == 2 )--}}
                                                        {{--<li>Humanitaarteaduste instituut</li>--}}
                                                    {{--@elseif ( $project->institute == 3 )--}}
                                                        {{--<li>Haridusteaduste instituut</li>--}}
                                                    {{--@elseif ( $project->institute == 4 )--}}
                                                        {{--<li>Loodus- ja terviseteaduste instituut</li>--}}
                                                    {{--@elseif ( $project->institute == 5 )--}}
                                                        {{--<li>Rakvere kolledž</li>--}}
                                                    {{--@elseif ( $project->institute == 6 )--}}
                                                        {{--<li>Haapsalu kolledž</li>--}}
                                                    {{--@elseif ( $project->institute == 7 )--}}
                                                        {{--<li>Ühiskonnateaduste instituut</li>--}}
                                                    {{--@endif--}}
                                                {{--</ul>--}}


                                                <h3><span class="glyphicon ico-mentor"></span>{{trans('project.supervisor')}}</h3>
                                                <ul class="list-unstyled list01 tags">
                                                    @foreach ($project->users as $user)
                                                        @if ( $user->pivot->participation_role == 'author' )
                                                            @if(!empty($user->full_name))
                                                                <li><span class="label label-primary">{{ $user->full_name }} ({{ $user->email }})</span></li>
                                                            @else
                                                                <li><span class="label label-primary">{{ $user->name }} ({{ $user->email }})</span></li>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </ul>




                                                @if(!empty($project->supervisor))

                                                    <h3><span class="glyphicon ico-mentor"></span>{{trans('project.cosupervisor')}}</h3>
                                                    <ul class="list-unstyled list01 tags">
                                                        @foreach (preg_split("/\\r\\n|\\r|\\n/", $project->supervisor) as $single_cosupervisor)
                                                            <li><li><span class="label label-primary">{{ $single_cosupervisor }}</span></li>
                                                        @endforeach
                                                    </ul>

                                                @endif


                                                <h3><span class="glyphicon ico-tag"></span>{{trans('project.keywords')}}</h3>
                                                <ul class="list-unstyled list01 tags keywords">
                                                    @foreach (explode(',', $project->tags) as $tag)
                                                        <li><span class="label label-primary">{{ $tag }}</span></li>

                                                    @endforeach
                                                </ul>


                                            </div>
                                        </div>


                                        <h3><span class="glyphicon ico-inspire"></span>{{trans('search.join')}}</h3>
                                        {{--Check for join deadline--}}
                                        @if (Carbon\Carbon::today()->format('Y-m-d') > Str::limit($project->join_deadline, 10, ''))
                                            <p class="red"><i class="fa fa-btn fa-frown-o"></i>{{trans('project.deadline_over')}}</p>
                                        @else
                                            @if(Auth::check())

                                                @if(Auth::user()->is('student'))
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
                                                                {{trans('search.join_button')}}
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <p>Sul ei ole tudengi rolli</p>
                                                @endif

                                            @else
                                                <p>Logi sisse ja liitu projektiga</p>
                                            @endif


                                        @endif



                                        <h3><span class="glyphicon ico-brainstorm"></span>{{trans('search.team')}}</h3>
                                        <h3 class="tag-label">
                                            {{--Check if there are members in this project; later used to decide whether to build a panel with emails listing--}}
                                            @php
                                                $members_count=0;
                                            @endphp

                                            @foreach ($project->users as $user)
                                                @if ( $user->pivot->participation_role == 'member' )
                                                    @php
                                                        $members_count++;
                                                    @endphp
                                                    @if(!empty($user->full_name))
                                                        @php
                                                            $parts = explode(" ", $user->full_name);
                                                            $lastname = array_pop($parts);
                                                            $firstname = implode(" ", $parts);
                                                        @endphp
                                                        <span class="label label-primary">{{ $firstname }}
                                                            @if(!empty($user->courses))
                                                                @foreach($user->courses as $course)
                                                                    / {{ $course->name }}
                                                                @endforeach
                                                            @endif
                                                            {{$isTeacher? '('.$user->email.')' : ''}}
                                                        </span>
                                                    @else
                                                        @php
                                                            $parts = explode(" ", $user->name);
                                                            if (count($parts)>1){
                                                                $lastname = array_pop($parts);
                                                                $firstname = implode(" ", $parts);
                                                            }else{
                                                                $firstname = $user->name;
                                                            }
                                                        @endphp
                                                        <span class="label label-primary">{{ $firstname }} {{$isTeacher? '('.$user->email.')' : ''}}</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </h3>


                                        @if($isTeacher && $members_count>0)
                                            <div  class="panel email-list panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">{{trans('search.team_emails')}}</h3>
                                                    <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-xs-9 mailto-list">
                                                        @php
                                                            $members_emails = '';
                                                        @endphp
                                                        @foreach ($project->users as $user)
                                                            @if ( $user->pivot->participation_role == 'member' )
                                                                @if ($user != $project->users->last())
                                                                    {{$user->email}},
                                                                @else
                                                                    {{$user->email}}
                                                                @endif
                                                                @php
                                                                    $members_emails .=$user->email.',';
                                                                @endphp
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                    <div class="col-xs-3">

                                                        <a href="mailto:{{$members_emails}}" class="btn btn-info pull-right" role="button">{{trans('search.send_to_all_button')}}</a>
                                                    </div>



                                                </div>
                                            </div>
                                        @endif



                                    </div>



                                    @endforeach

                            </div>
                </div>


                @else
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{trans('project.no_projekt_found')}}</h3>
                        </div>
                        <div class="panel-body">
                            Logi sisse ja lisa projekti!
                        </div>
                    </div>

                @endif

            </div>





@endsection