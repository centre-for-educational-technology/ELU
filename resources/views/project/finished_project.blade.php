@if(\Session::has('message'))


    @if(\Session::get('message')['type'] == 'finished')
        <div class="alert alert-info">
            {{\Session::get('message')['text']}}
        </div>

    @endif


@endif

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


                @if(count($project->getCourses)>0)
                    <h3><span class="glyphicon ico-topics"></span>{{trans('project.study_area')}}</h3>
                    <ul class="list-unstyled list01 tags">
                        @foreach ($project->getCourses as $course)
                            <li><span class="label label-primary">{{ $course->name }}</span></li>
                        @endforeach
                    </ul>
                @endif

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


                <h3><span class="glyphicon ico-target"></span>{{trans('project.language')}}</h3>
                <ul class="list-unstyled list01">
                    @if ( $project->language == 'et' )
                        <li>Eesti</li>
                    @elseif ( $project->language == 'en' )
                        <li>English</li>
                    @endif
                </ul>


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



                <h3><span class="glyphicon ico-mentor"></span>{{trans('project.supervisor')}}</h3>
                <ul class="list-unstyled list01 tags">
                    @foreach ($project->users as $user)
                        @if ( $user->pivot->participation_role == 'author' )
                            <li><span class="label label-primary">{{ getUserName($user) }} ({{ $user->email }})</span></li>
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


        <h2>{{trans('project.summary_title')}}</h2>
        <p>{!! $project->summary !!}</p>


        <h3>{{trans('project.project_groups')}}</h3>
        @if (count($project->groups) > 0)
            <div class="row">

                <div class="panel with-nav-tabs panel-primary project-groups-panel">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            @foreach ($project->groups as $group_key => $group)


                                <li class="{{ ($group_key == 0 ? 'active' : '') }}"><a href="#{{$group->id}}" aria-controls="home" role="tab" data-toggle="tab">{{$group->name}}</a></li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            @foreach ($project->groups as $group_key => $group)

                                <div role="tabpanel" class="tab-pane project-groups fade in {{ ($group_key == 0 ? 'active' : '') }}" id="{{$group->id}}">


                                    <div class="col-sm-12">
                                    <h3>{{trans('project.group_members')}}</h3>

                                    <ul class="list-group" group-id="{{$group->id}}">
                                        @foreach($group->users as $user)
                                            <li class="list-group-item" user-id="{{$user->id}}">{{getUserStrippedNameAndCourse($user)}}</li>
                                        @endforeach
                                    </ul>

                                    @php
                                        $summary = json_decode($group->summary, true);
                                    @endphp

                                    <!-- Group summary -->
                                    {!! $summary['summary'] !!}

                                    <!-- Group Embedded media -->

                                    @if(!empty($summary['embedded']))

                                        <div class="embed-responsive embed-responsive-16by9">
                                            {!! $summary['embedded'] !!}
                                        </div>
                                    @endif

                                    </div>


                                    <!--Group images -->
                                    @if(!empty($summary['images']))
                                        @foreach($summary['images'] as $image)
                                            <div class="col-sm-6">
                                                <p class="thumbnail"><a data-fancybox="gallery" href="{{url('storage/projects_groups_images/'.$group->id.'/'.$image)}}"><img src="{{url('storage/projects_groups_images/'.$group->id.'/'.$image)}}"></a></p>

                                            </div>

                                        @endforeach

                                    @endif



                                </div>


                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        @endif

    </div>

</div>