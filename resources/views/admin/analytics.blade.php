@extends('layouts.app')

@section('content')
    <div class="container">




        <div class="col-sm-offset-1 col-sm-10">
            <h3><i class="fa fa-dashboard"></i> Statistika</h3>

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="statistics circle-tile ">
                        <div class="circle-tile-heading green"><i class="fa fa-lightbulb-o fa-fw fa-3x"></i></div>
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">Avaldatud Projekte</div>
                            <div class="circle-tile-number text-faded ">{{$projects_count}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="statistics circle-tile ">
                        <div class="circle-tile-heading orange"><i class="fa fa-users fa-fw fa-3x"></i></div>
                        <div class="circle-tile-content orange">
                            <div class="circle-tile-description text-faded">Kasutajaid</div>
                            <div class="circle-tile-number text-faded ">{{$users_count}}</div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="btn-group">
                <a class="btn btn-lg btn-success" download href="{{ url('/admin/analytics/download') }}"><i class="fa fa-btn fa-download"></i>Laadi alla</a>

            </div>


            {{--Search form--}}
            @include('admin.search_projects_form', ['url_data' => '/admin/analytics/search'])

            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            @if (count($projects) > 0)


                @if (count($projects) > 0)


                    <h3>Kõik projektid</h3>

                            <div class="table-responsive">
                            <table class="table table-striped project-table">
                                <thead>
                                    <th>{{trans('project.project')}}</th>
                                    <th>{{trans('project.supervisor')}}</th>
                                    <th>{{trans('project.cosupervisor')}}</th>
                                    <th>{{trans('search.team')}}</th>
                                    <th>Õpilaste arv</th>
                                    </thead>
                                <tbody>
                                @foreach ($projects as $project)

                                    <tr>
                                        <td class="table-text"><div>{{ $project->name }}</div></td>


                                        <td>
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
                                        </td>


                                        <td>
                                            <ul class="list-unstyled list01 tags">
                                                @foreach (preg_split("/\\r\\n|\\r|\\n/", $project->supervisor) as $single_cosupervisor)
                                                    <li><span class="label label-primary">{{ $single_cosupervisor }}</span></li>
                                                @endforeach
                                            </ul>

                                        </td>


                                        @php
                                            $members_count = 0;
                                        @endphp

                                        <td>
                                            <ul class="list-unstyled list01 tags">
                                                @foreach ($project->users as $user)
                                                    @if ( $user->pivot->participation_role == 'member' )
                                                        @if(!empty($user->full_name))
                                                            <li><span class="label label-primary">{{ $user->full_name }} ({{ $user->email }})</span></li>
                                                        @else
                                                            <li><span class="label label-primary">{{ $user->name }} ({{ $user->email }})</span></li>
                                                        @endif
                                                        @php
                                                            $members_count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>


                                        <td>
                                            <span class="badge badge-primary">{{$members_count}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>

                            {{ $projects->links() }}


                @endif

            @else

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('project.no_projekt_found')}}</h3>
                    </div>
                    <div class="panel-body">
                        {{trans('project.no_projekt_found_desc')}}
                    </div>
                </div>


            @endif

        </div>
    </div>
@endsection
