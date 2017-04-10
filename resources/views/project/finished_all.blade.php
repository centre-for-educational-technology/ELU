@if (count($projects) > 0)
    <div class="row">
        <div class="col-md-8 col-md-offset-2 margt content">
            <ul class="nav menu02 menu02b nav-stacked">
                @foreach($projects as $index =>$project)

                    <li><a href="{{url('/project/'.$project->id)}}">{{$project->name}}</a></li>


                @endforeach

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
                <h3 class="panel-title">{{trans('project.no_projekt_found')}}</h3>
            </div>
            <div class="panel-body">
                {{trans('project.no_projekt_found_desc')}}
            </div>
        </div>

    </div>
@endif



