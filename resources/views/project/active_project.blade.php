@if(\Session::has('message'))

    @if(\Session::get('message')['type'] == 'joined')

        <div class="row">
            <div class="alert alert-info">
                {{\Session::get('message')['text']}}

                <a href="{{url('project/'.\Session::get('project')['id'])}}" class="btnShare btn btn-social btn-social-icon btn-facebook">
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

    @elseif(\Session::get('message')['type'] == 'declined')
        
        <div class="row">
            <div class="alert alert-warning">
                {{\Session::get('message')['text']}}. <a href="{{url('projects/open')}}"> {{trans('project.find_something_else_notification')}}</a>
            </div>
        </div>
    
    @elseif(\Session::get('message')['type'] == 'already_in_project')
    
        <div class="row">
            <div class="alert alert-warning">
                {{\Session::get('message')['text']}} <a href="{{url('project/'.Auth::user()->isMemberOfProject()['id'])}}"> <i class="fa fa-external-link"></i> </a>
            </div>
        </div>
    
    @endif

@endif


<div class="row">


    <div class="col-md-10 margt content col-md-offset-1">
        @if ($project->languages == 'et')
            <h1>{{ $project->name_et }}</h1>
        @elseif ($project->languages == 'en')
            <h1>{{ $project->name_en }}</h1>
        @else
            <h1>{{ $project->name_et }} // {{ $project->name_en }}</h1>
        @endif

        @if(!(Auth::guest()))
            @if(canChangeTheProject(Auth::user(), $project))
                <p>
                    <form action="{{ url('project/'.$project->id.'/edit') }}" method="GET">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-btn fa-pencil"></i>{{trans('project.edit')}}
                        </button>
                    </form>
                </p>
            @endif
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


        <h3>{{trans('project.description')}}</h3>
        @if ($project->languages == 'et')
            <p>{!! $project->description_et !!}</p>
        @elseif ($project->languages == 'en')
            <p>{!! $project->description_en !!}</p>
        @else
            <p>{!! $project->description_et !!}</p>
            <p>//</p>
            <p>{!! $project->description_en !!}</p>
        @endif


        <h3>{{trans('project.interdisciplinary_desc')}}</h3>
        @if ($project->languages == 'et')
            <p>{!! $project->interdisciplinary_approach_et !!}</p>
        @elseif ($project->languages == 'en')
            <p>{!! $project->interdisciplinary_approach_en !!}</p>
        @else
            <p>{!! $project->interdisciplinary_approach_et !!}</p>
            <p>//</p>
            <p>{!! $project->interdisciplinary_approach_en !!}</p>
        @endif


        <h3>{{trans('project.outcomes')}}</h3>
        @if ($project->languages == 'et')
            <p>{!! $project->project_outcomes_et !!}</p>
        @elseif ($project->languages == 'en')
            <p>{!! $project->project_outcomes_en !!}</p>
        @else
            <p>{!! $project->project_outcomes_et !!}</p>
            <p>//</p>
            <p>{!! $project->project_outcomes_en !!}</p>
        @endif


        <div class="row mt2em">

            <div class="col-md-6">

                @if(!empty($project->meeting_info))
                    <h3><span class="glyphicon ico-brainstorm"></span>{{trans('project.meeting_info')}}</h3>
                    <p>{{$project->meeting_info}}</p>
                @endif

                <h3><span class="glyphicon ico-target"></span>{{trans('project.language')}}</h3>
                @if ( $project->languages == 'et' )
                    <p>Eesti</p>
                @elseif ( $project->languages == 'en' )
                    <p>English</p>
                @else
                    <p>Eesti</p>
                    <p>English</p>
                @endif

                <h3><span class="glyphicon ico-duration"></span>{{trans('project.duration')}}</h3>
                <ul class="list-unstyled list01">
                    @if ( $project->study_term == 0 )
                        <li>{{trans('project.autumn_semester')}}</li>
                    @elseif ( $project->study_term == 1 )
                        <li>{{trans('project.spring_semester')}}</li>
                    @elseif ( $project->study_term == 2 )
                        <li>{{trans('project.autumn_spring')}}</li>
                    @elseif ( $project->study_term == 3 )
                        <li>{{trans('project.spring_autumn')}}</li>
                    @endif

                    <p>{{$project->project_year}}</p>
                </ul>

                @if ( $project->languages == 'et' )
                    <h3><span class="glyphicon ico-brainstorm"></span>{{trans('project.meeting_dates')}}</h3>
                    @foreach (json_decode($project->meetings_et) as $meeting)
                        <p>{{$meeting[0]}} - {{$meeting[1]}}</p>
                    @endforeach
                @elseif ( $project->languages == 'en' )
                    <h3><span class="glyphicon ico-brainstorm"></span>{{trans('project.meeting_dates')}}</h3>
                    @foreach (json_decode($project->meetings_en) as $meeting)
                        <p>{{$meeting[0]}} - {{$meeting[1]}}</p>
                    @endforeach
                @else
                    <h3><span class="glyphicon ico-brainstorm"></span>{{trans('project.meeting_dates_et')}}</h3>
                    @foreach (json_decode($project->meetings_et) as $meeting)
                        <p>{{$meeting[0]}} - {{$meeting[1]}}</p>
                    @endforeach
                    <h3><span class="glyphicon ico-brainstorm"></span>{{trans('project.meeting_dates_en')}}</h3>
                    @foreach (json_decode($project->meetings_en) as $meeting)
                        <p>{{$meeting[0]}} - {{$meeting[1]}}</p>
                    @endforeach
                @endif

                @if (!empty($project->presentation_results))
                    <h3><span class="glyphicon ico-duration"></span>{{trans('project.presentation_of_results')}}</h3>
                    @if($project->presentation_results == 0)
                        <p>{{trans('project.presentation_of_results_december')}}</p>
                    @else
                        <p>{{trans('project.presentation_of_results_may')}}</p>
                    @endif
                @endif

                @if (!empty($project->evaluation_date_id))
                    <h3><span class="glyphicon ico-calendar"></span>{{trans('project.evaluation_date')}}</h3>
                    <p>{{date("m/d/Y", strtotime(\App\EvaluationDate::find($project->evaluation_date_id)->evaluation_date))}}</p>
                @endif

                <div class="row share">
                    <div class="col-sm-6">

                        <a href="{{url('project/'.$project->id)}}" class="btnShare btn btn-block btn-social btn-facebook">
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


            <div class="col-md-6">

                @if ( $project->languages == 'et' && !empty($project->additional_info_et))
                    <h3><span class="glyphicon ico-labyrinth"></span>{{trans('project.extra_info_et')}}</h3>
                    <p>{{$project->additional_info_et}}</p>
                @elseif ( $project->languages == 'en' && !empty($project->additional_info_en))
                    <h3><span class="glyphicon ico-labyrinth"></span>{{trans('project.extra_info_en')}}</h3>
                    <p>{{$project->additional_info_en}}</p>
                @else
                    @if (!empty($project->additional_info_et))
                    <h3><span class="glyphicon ico-labyrinth"></span>{{trans('project.extra_info_et')}}</h3>
                    <p>{{$project->additional_info_et}}</p>
                    @endif
                    @if (!empty($project->additional_info_en))
                    <h3><span class="glyphicon ico-labyrinth"></span>{{trans('project.extra_info_en')}}</h3>
                    <p>{{$project->additional_info_en}}</p>
                    @endif
                @endif

                <h3><span class="glyphicon ico-mentor"></span>{{trans('project.supervisor')}}</h3>
                <ul class="list-unstyled list01 tags">
                    <li><span class="label label-primary">{{ getUserName(getUserById($project->supervisor)) }} ({{ getUserEmail(getUserById($project->supervisor)) }})</span></li>
                </ul>

                @if(!empty($project->co_supervisors))

                    <h3><span class="glyphicon ico-mentor"></span>{{trans('project.cosupervisor')}}</h3>
                    <ul class="list-unstyled list01 tags">
                    @foreach (json_decode($project->co_supervisors) as $co_supervisor)
                        <li><span class="label label-primary">{{ getUserName(getUserById($co_supervisor)) }} ({{ getUserEmail(getUserById($co_supervisor)) }})</span></li>
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
        @if ($project->available_to_join == 0)
            <p class="red">{{trans('project.deadline_over')}}</p>
            @if (!Auth::guest() && $project->currentUserIs('member'))
            <form action="{{ url('finish/'.$project->id) }}">
                <button type="submit" class="btn btn-danger btn-lg">{{trans('project.add_materials')}}</button>
            </form>
            @endif
        @else
            @if(Auth::check())
                @if(Auth::user()->is('student'))
                    @if ($project->currentUserIs('member'))
                        <form action="{{ url('leave/'.$project->id) }}" method="POST">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-danger btn-lg">
                        {{trans('project.leave_project_button')}}
                        </button>
                        </form>
                        <p class="text-success">{{trans('project.already_joined_this_notification')}}</p>

                    @elseif(Auth::user()->isMemberOfProject())

                        <p class="text-warning">{{trans('project.already_in_team_notification')}} <a href="{{url('project/'.Auth::user()->isMemberOfProject()['id'])}}"> <i class="fa fa-external-link"></i> </a></p>

                    @else
                        @if(checkIfThereIsSpaceInProject($project))
                            <form action="{{ url('join/'.$project->id) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{trans('search.join_button')}}
                                </button>
                            </form>

                        @else
                            <button type="submit" class="btn btn-primary btn-lg disabled" rel="tooltip" data-title="{{trans('project.declined_project_join_notification_max_members_limit')}}">
                                {{trans('search.join_button')}}
                            </button>

                        @endif
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