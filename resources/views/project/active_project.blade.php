@if(\Session::has('message'))

    @if(\Session::get('message')['type'] == 'joined')
        <div class="row">
            <div class="alert alert-info">
                {{\Session::get('message')['text']}}


                <a href="{{url('project/'.\Session::get('project')['id'])}}" data-image="{{ url(asset('/css/bg05.png')) }}" data-title="{{\Session::get('project')['name']}}" data-desc="{{ str_limit(strip_tags(\Session::get('project')['description']), 150) }}" class="btnShare btn btn-social btn-social-icon btn-facebook">
                    <span class="fa fa-facebook"></span>
                </a>

                <a class="btn btn-social btn-social-icon btn-twitter"
                   href="https://twitter.com/intent/tweet?text={{rawurlencode(trans('project.twitter_share_joined_message'))}}%20{{ rawurlencode('"'.str_limit(\Session::get('project')['name'], 65).'"') }}%20{{url('project/'.\Session::get('project')['id'])}}"
                   hashtags="elu,tlu">
                    <span class="fa fa-twitter"></span>
                </a>

            </div>
        </div>


    @elseif(\Session::get('message')['type'] == 'changed')

        <div class="row">
            <div class="alert alert-info">
                {{\Session::get('message')['text']}}

            </div>
        </div>


    @endif

@endif

<div class="row">


    <p class="col-md-10 margt content col-md-offset-1">

        <h1>{{ $project->name }}</h1>
        @if(!(Auth::guest()) && Auth::user()->is('project_moderator') && isMemberOfProject(Auth::user()->id, $project->id))
            <p>
                <form action="{{ url('project/'.$project->id.'/edit') }}" method="GET">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-btn fa-pencil"></i>{{trans('project.edit')}}
                    </button>
                </form>
            </p>

        @endif


        <div class="row">
            <div class="col-xs-7">
                <div class="form-group nomargin">
                    <p><input class="form-control" name="share_url" title="Share link" value="{{url('project/'.$project->id)}}"></p>
                </div>
            </div>
        </div>

        @if (!empty($project->featured_image))
            <p><img class="img-thumbnail img-responsive featured-image" src="{{url('storage/projects_featured_images/'.$project->featured_image)}}"></p>
        @endif

        @if (!empty($project->embedded))
            <div class="embed-responsive embed-responsive-16by9">
                {!! $project->embedded !!}
            </div>
        @endif


        <p>{!! $project->description !!}</p>



        <div class="row mt2em">

            <div class="col-md-6">

                @if(!empty($project->meeting_info))
                    <h3><span class="glyphicon ico-calendar"></span>{{trans('project.meeting_info')}}</h3>
                    <p>{{$project->meeting_info}}</p>
                @endif


                {{--XXX to be removed--}}
                @if(!empty($project->integrated_areas))

                    <h3><span class="glyphicon ico-topics"></span>{{trans('project.integrated_study_areas')}}</h3>
                    <ul class="list-unstyled list01">
                        @foreach (explode(PHP_EOL, $project->integrated_areas) as $integrated_area)
                            <li>{{ $integrated_area }}</li>
                        @endforeach
                    </ul>

                @endif

                {{--XXX to be removed--}}
                @if(!empty($project->courses))
                    <h3><span class="glyphicon ico-status"></span>{{trans('project.related_courses')}}</h3>
                    <ul class="list-unstyled list01">
                        @foreach (explode(PHP_EOL, $project->courses) as $course)
                            <li>{{ $course }}</li>
                        @endforeach
                    </ul>
                @endif


                @if(count($project->getCourses)>0)
                    <h3><span class="glyphicon ico-topics"></span>{{trans('project.study_area')}}</h3>
                    <ul class="list-unstyled list01 tags keywords">
                        @foreach ($project->getCourses as $course)
                            <li><span class="label label-primary">{{ getCourseName($course) }}</span></li>
                        @endforeach
                    </ul>
                @endif


                @if (!empty($project->extra_info))
                    <h3><span class="glyphicon ico-labyrinth"></span>{{trans('project.extra_info')}}</h3>
                    <p>{!! $project->extra_info !!}</p>
                @endif


                @if (!empty($project->group_link))
                    <h3><span class="glyphicon ico-brainstorm"></span> {{trans('project.mendeley_group_link')}}</h3>
                    <a href="{{$project->group_link}}" target="_blank">{{trans('project.group_link_visit')}}</a>
                @endif
            </div>



            <div class="col-md-6">

                <h3><span class="glyphicon ico-duration"></span>{{trans('project.duration')}}</h3>
                <ul class="list-unstyled list01">
                    @if ( $project->study_term == 0 )
                        <li>{{trans('project.autumn_semester')}}</li>
                    @elseif ( $project->study_term == 1 )
                        <li>{{trans('project.spring_semester')}}</li>
                    @elseif ( $project->study_term == 2 )
                        <li>{{trans('project.both')}}</li>
                    @endif

                    @if(!empty($project->study_year))
                        <p>{{$project->study_year}}/{{$project->study_year+1}}</p>
                    @endif

                </ul>


                {{--<h3><span class="glyphicon ico-status"></span>{{trans('project.status')}}</h3>--}}
                {{--<ul class="list-unstyled list01">--}}
                {{--@if ( $project->status == 0 )--}}
                {{--<li>{{trans('project.finished')}}</li>--}}
                {{--@elseif ( $project->status == 1 )--}}
                {{--<li>{{trans('project.active')}}</li>--}}
                {{--@endif--}}
                {{--</ul>--}}

                <h3><span class="glyphicon ico-target"></span>{{trans('project.language')}}</h3>
                <ul class="list-unstyled list01">
                    @if ( $project->language == 'et' )
                        <li>Eesti</li>
                    @elseif ( $project->language == 'en' )
                        <li>English</li>
                    @endif
                </ul>


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
                            <li><span class="label label-primary">{{ getUserName($user) }} ({{ getUserEmail($user) }})</span></li>
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

                <div class="row share">
                    <div class="col-sm-6">

                        <a href="{{url('project/'.$project->id)}}" data-image="{{ url(asset('/css/bg05.png')) }}" data-title="{{$project->name}}" data-desc="{{str_limit(strip_tags($project->description), 150) }}" class="btnShare btn btn-block btn-social btn-facebook">
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

        {{--Check for join deadline--}}
        @if (Carbon\Carbon::today()->format('Y-m-d') > Str::limit($project->join_deadline, 10, ''))
            <p class="red"><i class="fa fa-btn fa-frown-o"></i>{{trans('project.deadline_over')}}</p>
        @else
            @if(Auth::check())
                @if(Auth::user()->is('student'))
                    @if ($project->currentUserIs('member'))
                        {{--<form action="{{ url('leave/'.$project->id) }}" method="POST">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<button type="submit" class="btn btn-danger btn-lg">--}}
                        {{--{{trans('project.leave_project_button')}}--}}
                        {{--</button>--}}
                        {{--</form>--}}
                        <p class="text-success">{{trans('project.already_joined_this_notification')}}</p>

                    @elseif(Auth::user()->isMemberOfProject())

                        <p class="text-warning">{{trans('project.already_in_team_notification', ['name' => Auth::user()->isMemberOfProject()]['name'])}}</p>

                    @else
                        <form action="{{ url('join/'.$project->id) }}" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-primary btn-lg">
                                {{trans('search.join_button')}}
                            </button>
                        </form>
                    @endif
                @else
                    <p>{{trans('project.no_student_role_notification')}}</p>
                @endif


            @else
                <p>{{trans('project.log_in_and_join_notification')}}</p>
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
                                    / {{ getCourseName($course) }}
                                @endforeach
                            @endif
                            {{$isTeacher? '('.getUserEmail($user).')' : ''}}
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
                        <span class="label label-primary">{{ $firstname }} {{$isTeacher? '('.getUserEmail($user).')' : ''}}</span>
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
                                    $members_emails .=getUserEmail($user).',';
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