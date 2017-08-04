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


        @if (!empty($project->featured_image))
            <p><img class="img-thumbnail img-responsive featured-image" src="{{url('storage/projects_featured_images/'.$project->featured_image)}}"></p>
        @endif

        @if (!empty($project->embedded))
            <div class="embed-responsive embed-responsive-16by9">
                {!! $project->embedded !!}
            </div>
        @endif


        <p>{!! $project->summary !!}</p>







        <div class="row mt2em">

            <div class="col-md-6">

                <h3><span class="glyphicon ico-mentor"></span>{{trans('project.supervisor')}}</h3>

                <ul class="list-unstyled list01 tags keywords">
                @foreach ($project->users as $user)
                    @if ( $user->pivot->participation_role == 'author' )
                        <li><span class="label label-primary">{{ getUserName($user) }} ({{ getUserEmail($user) }})</span></li>
                    @endif
                @endforeach
                </ul>



                @if(!empty($project->supervisor))

                    <h3><span class="glyphicon ico-mentor"></span>{{trans('project.cosupervisor')}}</h3>
                    <ul class="list-unstyled list01 tags keywords">
                        @foreach (preg_split("/\\r\\n|\\r|\\n/", $project->supervisor) as $single_cosupervisor)
                            <li><span class="label label-primary">{{ $single_cosupervisor }}</span></li>
                        @endforeach
                    </ul>

                @endif


                @if(!empty($project->study_year))
                    <h3><span class="glyphicon ico-duration"></span>{{trans('project.duration')}}</h3>
                    <p>{{$project->study_year}}/{{$project->study_year+1}} ({{getProjectSemester($project)}})</p>
                @endif


            </div>



            <div class="col-md-6">



                @if(count($project->getCourses)>0)
                    <h3><span class="glyphicon ico-topics"></span>{{trans('project.study_area')}}</h3>

                    <ul class="list-unstyled list01 tags keywords">
                        @foreach ($project->getCourses as $course)
                            <li><span class="label label-primary">{{ getCourseName($course) }}</span></li>
                        @endforeach
                    </ul>

                @endif


                @if (!empty($project->group_link))
                    <h3><span class="glyphicon ico-brainstorm"></span> {{trans('project.mendeley_group_link')}}</h3>
                    <a href="{{$project->group_link}}" target="_blank">{{trans('project.group_link_visit')}}</a>
                @endif



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




        <h3>{{trans('project.project_groups')}}</h3>
        @if (count($project->groups) > 0)
            <div class="row">

                <div class="panel with-nav-tabs panel-primary project-groups-panel">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            @foreach ($project->groups as $group_key => $group)

                                @if(!empty($group->name))
                                    <li class="{{ ($group_key == 0 ? 'active' : '') }}"><a href="#{{$group->id}}" aria-controls="home" role="tab" data-toggle="tab">{{$group->name}}</a></li>
                                @else
                                    <li class="{{ ($group_key == 0 ? 'active' : '') }}"></li>
                                @endif

                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            @foreach ($project->groups as $group_key => $group)

                                <div role="tabpanel" class="tab-pane project-groups fade in {{ ($group_key == 0 ? 'active' : '') }}" id="{{$group->id}}">


                                    <div class="col-sm-12">
                                    <h3>{{trans('project.group_members')}}</h3>


                                    <ul class="tags keywords">
                                        @foreach($group->users as $user)
                                            <li><span class="label label-primary">{{getUserFirstName($user)}}</span></li>

                                        @endforeach
                                    </ul>
                                    <ul class="tags keywords">
                                        @if(getGroupUsersCourses($group))
                                            @foreach(getGroupUsersCourses($group) as $key => $course)

                                                <li><span class="label label-orange">{{$key}} ({{$course}})</span></li>

                                            @endforeach
                                        @endif
                                    </ul>

                                    <!-- Group results -->
                                    @if(!empty($group->results))
                                        <h3>{{trans('project.group_results')}}</h3>
                                        {!! $group->results !!}
                                    @endif



                                    <!-- Group activities -->
                                    @if(!empty($group->activities))
                                        <h3>{{trans('project.group_activities')}}</h3>
                                        {!! $group->activities !!}
                                    @endif



                                    <!-- Group reflection -->
                                    @if(!empty($group->reflection))
                                        <h3>{{trans('project.group_reflection')}}</h3>
                                        {!! $group->reflection !!}
                                    @endif



                                    <!-- Group partners -->
                                    @if(!empty($group->partners))
                                        <h3>{{trans('project.group_partners')}}</h3>
                                        <p>{{ $group->partners }}</p>
                                    @endif



                                    <!-- Group students opinion -->
                                    @if(!empty($group->students_opinion))
                                        <h3>{{trans('project.students_opinion')}}</h3>
                                        <p>{{ $group->students_opinion }}</p>
                                    @endif



                                    <!-- Group supervisor opinion -->
                                    @if(!empty($group->supervisor_opinion))
                                        <h3>{{trans('project.supervisor_opinion')}}</h3>
                                        <p>{{ $group->supervisor_opinion }}</p>
                                    @endif


                                    <!-- Group Embedded media -->

                                    @if(!empty($group->embedded))
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    {!! $group->embedded !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif




                                    @php
                                        $images= json_decode($group->images, true);
                                    @endphp

                                    <!--Group images -->
                                    @if(!empty($images))
                                        <div class="row">
                                            @foreach($images as $image)
                                                <div class="col-sm-6">
                                                    <p class="thumbnail"><a data-fancybox="gallery" href="{{url('storage/projects_groups_images/'.$group->id.'/'.$image)}}"><img src="{{url('storage/projects_groups_images/'.$group->id.'/'.$image)}}"></a></p>

                                                </div>

                                            @endforeach
                                        </div>

                                    @endif


                                    <!-- Group materials  -->
                                    @if(count($group->materials)>0)
                                        <h3>{{trans('project.group_materials_heading')}}</h3>
                                        <ul class="group-materials-links">
                                        @foreach ( $group->materials as $key => $material)
                                                <li>
                                                    @if(!empty($material->link))
                                                        <a href="{{$material->link}}" target="_blank">{{$material->name}} <i class="fa phpdebugbar-fa-external-link"></i></a>

                                                    @else
                                                       {{$material->name}} <i class="fa phpdebugbar-fa-external-link"></i>

                                                    @endif

                                                    <ul class="tags keywords">
                                                    @foreach (explode(',', $material->tags) as $tag)
                                                       <li><span class="label label-primary">{{ $tag }}</span></li>
                                                    @endforeach
                                                    </ul>

                                                </li>

                                        @endforeach

                                        </ul>
                                    @endif
                                    </div>

                                </div>


                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        @endif

    </div>

</div>