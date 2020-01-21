@include('common.errors')

@if (count($projects) > 0)
    <div class="row">

        {{-- Project names column--}}
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

            {{-- Pagination --}}
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{ $projects->links() }}
                </ul>
            </nav>
        </div>
    
        {{-- Finished project form --}}
        <div class="col-md-8 margt content tab-content">
            @foreach($projects as $index =>$project)

                @if($index == 0)
                    <div id="project{{$index}}" class="tab-pane fade in active">
                @else
                    <div id="project{{$index}}" class="tab-pane fade">
                @endif

                        @if (($project->status == 0) && ($project->study_year >= 2017))
                            @if (($project->study_term == 1) || ($project->study_term == 2))
                                @include('project.new_finished_project')
                            @else
                                @include('project.finished_project')
                            @endif
                        @elseif(($project->status == 0) && ($project->study_year < 2017))
                            @include('project.old_finished_project')
                        @else
                            @include('project.active_project')
                        @endif
                
                    </div>
            @endforeach
        </div>

@else
        {{-- No projects found --}}
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
