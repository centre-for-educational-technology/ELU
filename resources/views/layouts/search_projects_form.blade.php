<div class="panel mt2em panel-default">
    <div class="panel-body">
        <div class="row">


            <form action="{{ url($url_data) }}" method="GET" class="form-horizontal search-project">
                {{ csrf_field() }}

                <div class="col-lg-4 col-md-4">

                    <div class="input-group-btn search-panel">
                        <ul class="nav navbar-nav menu01" role="menu">
                            <li class="active"><a href="#project">{{trans('search.project')}}</a></li>
                            <li><a href="#member">{{trans('search.team_member')}}</a></li>
                            <li><a href="#author">{{trans('search.supervisor')}}</a></li>
                            
                            @if(strstr(Route::current()->uri(), "projects/finished"))
                                <li><a href="#term">Projekti Kestus</a></li>
                            @endif
                        </ul>
                    </div>
                    
                    {{-- @if (Route::current()->uri() == "projects/finished")
                        <a href="/projects/finished/search?sort_param=semester">Sorteeri semestrite kaupa</a>
                    @endif --}}
                </div>


                <div class="col-lg-8 col-md-8">
                    <div class="col-lg-10 col-md-8">
                        <div class="form-group nomargin search-input">

                            <input type="hidden" name="search_param" value="project" id="search_param">
                            <input type="text" class="form-control" name="search" placeholder="{{trans('search.enter_name')}}">
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