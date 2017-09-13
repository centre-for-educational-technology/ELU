@extends('layouts.app')

@section('content')
    <div class="container">




        <div class="col-lg-12 col-lg-offset-0 col-sm-10 col-sm-offset-1">
            <h3><i class="fa fa-dashboard"></i> Statistika</h3>

            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="statistics circle-tile ">
                        <div class="circle-tile-heading blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                        <div class="circle-tile-content blue">
                            <div class="circle-tile-description text-faded">Kasutajad</div>
                            <div class="circle-tile-number text-faded ">{{$users_count}}</div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="statistics circle-tile ">
                        <div class="circle-tile-heading orange"><i class="fa fa-lightbulb-o fa-fw fa-3x"></i></div>
                        <div class="circle-tile-content orange">
                            <div class="circle-tile-description text-faded">Avaldatud Projektid</div>
                            <div class="circle-tile-number text-faded ">{{$published_projects_count}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="statistics circle-tile ">
                        <div class="circle-tile-heading purple"><i class="fa fa-bullhorn fa-fw fa-3x"></i></div>
                        <div class="circle-tile-content purple">
                            <div class="circle-tile-description text-faded">{{trans('search.open_projects')}}</div>
                            <div class="circle-tile-number text-faded ">{{$open_projects_count}}</div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="statistics circle-tile ">
                        <div class="circle-tile-heading green"><i class="fa fa-bicycle fa-fw fa-3x"></i></div>
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">{{trans('search.ongoing_projects')}}</div>
                            <div class="circle-tile-number text-faded ">{{$ongoing_projects_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="statistics circle-tile ">
                        <div class="circle-tile-heading red"><i class="fa fa-archive fa-fw fa-3x"></i></div>
                        <div class="circle-tile-content red">
                            <div class="circle-tile-description text-faded">{{trans('search.finished_projects')}}</div>
                            <div class="circle-tile-number text-faded ">{{$finished_projects_count}}</div>
                        </div>
                    </div>
                </div>


            </div>



            <h3><i class="fa fa-download"></i> Laadi alla</h3>


            <h4>{{trans('search.open_projects')}}</h4>
            <div class="btn-group">
                <a class="btn btn-lg btn-success" download href="{{ url('/admin/analytics/download/open') }}"><i class="fa fa-btn fa-download"></i>Laadi alla</a>

            </div>

            <h4>{{trans('search.ongoing_projects')}}</h4>
            <div class="btn-group">
                <a class="btn btn-lg btn-success" download href="{{ url('/admin/analytics/download/ongoing') }}"><i class="fa fa-btn fa-download"></i>Laadi alla</a>

            </div>

            <h4>{{trans('search.finished_projects')}}</h4>
            <div class="btn-group">
                <a class="btn btn-lg btn-success" download href="{{ url('/admin/analytics/download/finished') }}"><i class="fa fa-btn fa-download"></i>Laadi alla</a>

            </div>


            {{--Search form--}}
            {{--@include('admin.search_projects_form', ['url_data' => '/admin/analytics/search'])--}}

            {{--@if(\Session::has('message'))--}}
                {{--<div class="alert alert-info">--}}
                    {{--{{\Session::get('message')}}--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--@if (count($projects) > 0)--}}


                {{--@if (count($projects) > 0)--}}


                    {{--<h3>Kõik projektid</h3>--}}

                            {{--<div class="table-responsive">--}}
                            {{--<table class="table table-striped project-table">--}}
                                {{--<thead>--}}
                                    {{--<th>{{trans('project.project')}}</th>--}}
                                    {{--<th>{{trans('project.supervisor')}}</th>--}}
                                    {{--<th>{{trans('project.cosupervisor')}}</th>--}}
                                    {{--<th>{{trans('search.team')}}</th>--}}
                                    {{--<th>Õpilaste arv</th>--}}
                                    {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@foreach ($projects as $project)--}}

                                    {{--<tr>--}}
                                        {{--<td class="table-text"><div>{{ $project->name }}</div></td>--}}


                                        {{--<td>--}}
                                            {{--<ul class="list-unstyled list01 tags">--}}
                                            {{--@foreach ($project->users as $user)--}}
                                                {{--@if ( $user->pivot->participation_role == 'author' )--}}
                                                    {{--<li><span class="label label-primary">{{ getUserName($user) }} ({{ getUserEmail($user) }})</span></li>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</td>--}}


                                        {{--<td>--}}
                                            {{--<ul class="list-unstyled list01 tags">--}}
                                                {{--@foreach (preg_split("/\\r\\n|\\r|\\n/", $project->supervisor) as $single_cosupervisor)--}}
                                                    {{--<li><span class="label label-primary">{{ $single_cosupervisor }}</span></li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}

                                        {{--</td>--}}


                                        {{--@php--}}
                                            {{--$members_count = 0;--}}
                                        {{--@endphp--}}

                                        {{--<td>--}}
                                            {{--<ul class="list-unstyled list01 tags">--}}
                                                {{--@foreach ($project->users as $user)--}}
                                                    {{--@if ( $user->pivot->participation_role == 'member' )--}}
                                                        {{--<li><span class="label label-primary">{{ getUserName($user) }} ({{ getUserEmail($user) }})</span></li>--}}
                                                        {{--@php--}}
                                                            {{--$members_count++;--}}
                                                        {{--@endphp--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</td>--}}


                                        {{--<td>--}}
                                            {{--<span class="badge badge-primary">{{$members_count}}</span>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                            {{--</div>--}}

                            {{--{{ $projects->links() }}--}}


                {{--@endif--}}

            {{--@else--}}

                {{--<div class="panel panel-warning">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<h3 class="panel-title">{{trans('project.no_project_found')}}</h3>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--@if (!Auth::guest())--}}
                            {{--{{trans('project.no_project_found_desc_logged')}}--}}
                        {{--@else--}}
                            {{--{{trans('project.no_project_found_desc_not_logged')}}--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}


            {{--@endif--}}

        </div>
    </div>
@endsection
