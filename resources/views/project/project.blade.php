@extends('layouts.app')

    @section('content')

        <div class="container">

            <div class="row">

                <div class="col-md-10 margt content col-md-offset-1">

                    <h1>{{ $project->name }}</h1>


                    <div class="row">
                        <div class="col-xs-7">
                            <div class="form-group nomargin">
                                <p><input class="form-control" name="share_url" title="Share link" value="{{url('project/'.$project->id)}}"></p>
                            </div>
                        </div>
                    </div>

                    @if (!empty($project->embedded))
                        <div class="embed-responsive embed-responsive-16by9">
                        {!! $project->embedded !!}
                        </div>
                    @endif


                    <p>{!! $project->description !!}</p>
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


                            @if (!empty($project->group_link))
                                <h3><span class="glyphicon ico-brainstorm"></span> {{trans('project.mendeley_group_link')}}</h3>
                                <a href="{{$project->group_link}}" target="_blank">{{trans('project.group_link_visit')}}</a>
                            @endif
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
                                        <li><span class="label label-primary">{{ $single_cosupervisor }}</span></li>
                                    @endforeach
                                </ul>

                            @endif


                            <h3><span class="glyphicon ico-tag"></span>{{trans('project.keywords')}}</h3>
                            <ul class="list-unstyled list01 tags keywords">
                                @foreach (explode(',', $project->tags) as $tag)
                                    <li><span class="label label-primary">{{ $tag }}</span></li>
                                @endforeach
                            </ul>

                            <div class="row">
                                <div class="col-sm-6">

                                    <a href="{{url('project/'.$project->id)}}" data-image="{{ url(asset('/css/bg05.png')) }}" data-title="{{$project->name}}" data-desc="{{str_limit($project->description, 150) }}" class="btnShare btn btn-block btn-social btn-facebook">
                                        <span class="fa fa-facebook"></span> {{trans('project.share_fb')}}
                                    </a>

                                    <a class="btn btn-block btn-social btn-twitter"
                                       href="https://twitter.com/intent/tweet?text={{ rawurlencode(str_limit($project->name, 80)) }}%20{{url('project/'.$project->id)}}"
                                       hashtags="elu,tlu">
                                        <span class="fa fa-twitter"></span> {{trans('project.share_twitter')}}
                                    </a>

                                </div>
                            </div>


                        </div>


                    </div>


                    <h3><span class="glyphicon ico-inspire"></span>{{trans('search.join')}}</h3>
                    @if(empty($isStudentMyProjectsView))
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

                    @else

                        @if ($project->currentUserIs('member'))
                            <form action="{{ url('leave/'.$project->id) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-danger btn-lg">
                                    <i class="fa fa-btn fa-frown-o"></i>Lahkun projektist
                                </button>
                            </form>

                        @else
                            <form action="{{ url('join/'.$project->id) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fa fa-btn fa-rocket"></i>{{trans('search.join_button')}}
                                </button>
                            </form>
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
                                        @if(!$user->courses->isEmpty())
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
                        <div  class="panel email-list panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{trans('search.team_emails')}}</h3>
                                <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
                            </div>
                            <div class="panel-body">
                                <div class="col-xs-8 mailto-list">
                                    @php
                                        $members_emails = '';
                                    @endphp
                                    @foreach ($project->users as $user)
                                        @if ( $user->pivot->participation_role == 'member' )
                                            @php
                                                $members_emails .=$user->email.',';
                                            @endphp
                                        @endif
                                    @endforeach


                                    <div class="form-group nomargin">
                                        <input class="form-control" name="share_url" title="Members emails" value="{{$members_emails}}">
                                    </div>

                                </div>
                                <div class="col-xs-4">
                                    <a href="mailto:{{$members_emails}}" class="btn btn-info pull-right" role="button">{{trans('search.send_to_all_button')}}</a>
                                </div>

                            </div>
                        </div>
                    @endif

                </div>

            </div>

        </div>


@endsection

