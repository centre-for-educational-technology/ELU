@if (count($projects) > 0)
    <div class="row">
        <div class="col-md-8 col-md-offset-2 margt content">
            <ul class="nav menu02 menu02b nav-stacked">
                @if (Auth::user() && Auth::user()->is('admin'))

                    @foreach($projects as $index =>$project)

                        <li style="width: 40em;">
                            <a style="display: inline;" href="{{url('/project/'.$project->id)}}">{{$project->name}}</a>
                            <span style="float: right;">({{$project->study_year}}/{{$project->study_year+1}} {{getProjectSemester($project)}})</span>
                        </li>
                        <br>


                    @endforeach
                @else

                    @foreach($projects as $index =>$project)
                        <li><a href="{{url('/project/'.$project->id)}}">{{$project->name}}</a></li>
                    @endforeach

                @endif

            </ul>



            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{ $projects->links() }}
                </ul>
            </nav>
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



