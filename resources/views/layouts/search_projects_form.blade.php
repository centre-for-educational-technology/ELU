<div class="panel mt2em panel-default">
    <div class="panel-body">
        <div class="row">


            <form action="{{ url($url_data) }}" method="GET" class="form-horizontal search-project">
                {{ csrf_field() }}

                <div class="col-lg-4 col-md-4">
                    <select class="form-control" id="search_param" name="search_param">
                        <option value="project" {{request()->search_param == 'project' ? 'selected' : ''}}>{{trans('search.project')}}</option>
                        <option value="member" {{request()->search_param == 'member' ? 'selected' : ''}}>{{trans('search.team_member')}}</option>
                        <option value="author" {{request()->search_param == 'author' ? 'selected' : ''}}>{{trans('search.supervisor')}}</option>
                        
                        @if(strstr(Route::current()->uri(), "projects/finished"))
                            <option value="term" {{request()->search_param == 'term' ? 'selected' : ''}}>{{trans('search.term')}}</option>
                        @endif
                    </select>

                </div>


                <div class="col-lg-8 col-md-8">
                    <div class="col-lg-10 col-md-8">
                        <div class="form-group nomargin search-input">

                            {{-- <input type="hidden" name="search_param" value="project" id="search_param"> --}}
                            <input type="text" class="form-control" name="search" placeholder="{{request()->search_param == 'term' ? trans('search.enter_year_and_semester') : trans('search.enter_name')}}">
                        </div>
                    </div>

                    <div class="form-group search">
                        <div class="col-lg-2 col-md-4">
                            <button class="btn btn-primary" type="submit">{{trans('search.search')}}!</button>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>