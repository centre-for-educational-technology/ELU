<!-- Display Validation Errors -->
@include('common.errors')

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


                    <a href="{{url('project/'.$project->id)}}" target="_blank"><h2>{{ $project->name }} <i class="fa fa-external-link title-link"></i></h2></a>


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

                    @if (!empty($project->aim))
                        <h3>{{trans('project.aim')}}</h3>
                        <p>{!! $project->aim !!}</p>
                    @endif

                    @if (!empty($project->interdisciplinary_desc))
                        <h3>{{trans('project.interdisciplinary_desc')}}</h3>
                        <p>{!! $project->interdisciplinary_desc !!}</p>
                    @endif

                    @if (!empty($project->novelty_desc))
                        <h3>{{trans('project.novelty_desc')}}</h3>
                        <p>{!! $project->novelty_desc !!}</p>
                    @endif

                    @if (!empty($project->project_outcomes))
                        <h3>{{trans('project.outcomes')}}</h3>
                        <p>{!! $project->project_outcomes !!}</p>
                    @endif

                    @if (!empty($project->student_expectations))
                        <h3>{{trans('project.student_expectations')}}</h3>
                        <p>{!! $project->student_expectations !!}</p>
                    @endif

                    <div class="row mt2em">

                        <div class="col-md-6">

                            @if(!empty($project->meeting_info))
                                <h3><span class="glyphicon ico-brainstorm"></span>{{trans('project.meeting_info')}}</h3>
                                <p>{{$project->meeting_info}}</p>
                            @endif

                            <h3><span class="glyphicon ico-target"></span>{{trans('project.language')}}</h3>
                            @if ( $project->language == 'et' )
                                <p>Eesti</p>
                            @elseif ( $project->language == 'en' )
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

                                @if(!empty($project->study_year))
                                    <p>{{$project->study_year}}/{{$project->study_year+1}}</p>
                                @endif

                            </ul>

                            @if (!empty($project->meeting_dates))
                                <h3><span class="glyphicon ico-brainstorm"></span>{{trans('project.meetings_dates')}}</h3>
                                @if($project->meeting_dates == 'NONE')
                                    <p>{{trans('project.to_be_arranged')}}</p>
                                @else
                                    <p>{{$project->meeting_dates}}</p>
                                @endif

                            @endif

                        </div>



                        <div class="col-md-6">


                            @if (!empty($project->extra_info))
                                <h3><span class="glyphicon ico-labyrinth"></span>{{trans('project.extra_info')}}</h3>
                                <p>{!! $project->extra_info !!}</p>
                            @endif


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



                        </div>


                    </div>


                    <h3><span class="glyphicon ico-inspire"></span>{{trans('search.join')}}</h3>
                    @if(empty($isStudentMyProjectsView))
                    {{--Check for join deadline--}}
                        @if (Carbon\Carbon::today()->format('Y-m-d') > Str::limit($project->join_deadline, 10, ''))
                            <p class="red">{{trans('project.deadline_over')}}</p>
                        {{--@if (Carbon\Carbon::today()->format('Y-m-d') > '2018-02-05')--}}
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

                                        <p class="text-warning">{{trans('project.already_in_team_notification', ['name' => Auth::user()->isMemberOfProject()['name']])}} <a href="{{url('project/'.Auth::user()->isMemberOfProject()['id'])}}"> <i class="fa fa-external-link"></i> </a></p>

                                    @else
                                        @if(checkIfThereIsSpaceInProject($project, Auth::user()))

                                            @include('project.join_project_form')

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

                    @else

                        <p class="text-success">{{trans('project.already_joined_this_notification')}}</p>

                    @endif


                    {{-- Midterm section --}}
                    @if ($project->status == 1)
                        <h3><span class="glyphicon ico-calendar"></span>Vahekokkuvõtted</h3>
                    @endif
                    @if (Auth::check() && $project->status == 1 && $project->currentUserIs('member') )

                        <form action="{{ url('midterm/'.$project->id) }}">
                            <button type="submit" class="btn btn-warning ">Esita</button>
                        </form>
                    @endif

                    @if (count($project->groups())>0)
                        @foreach ($project->groups as $group)
                            @php
                                $materials = json_decode($group->midterm_material_gdrive_ids, true);
                            @endphp
                            @if (!empty($materials))
                                <p>Grupp {{$group->name}}:</p>
                                <ul class="group-materials-links">
                                    @foreach ($materials as $drive_id=>$name)
                                        <li>
                                            <a href="https://drive.google.com/file/d/{{$drive_id}}/view" target="_blank">{{$name}}<i class="fa phpdebugbar-fa-external-link"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
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
            @endforeach
                    </div>
        </div>


@else
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">{{trans('project.no_project_found')}}</h3>
        </div>
        <div class="panel-body">
            @if (!Auth::guest())
                {{trans('project.no_project_found_desc_logged')}}
            @else
                {{trans('project.no_project_found_desc_not_logged')}}
            @endif
        </div>
    </div>

    </div>
@endif
