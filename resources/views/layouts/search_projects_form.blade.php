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
                        </ul>
                    </div>

                    <div class="sort-panel">
                        <a id="sort" href="#sort">Sorteeri</a>
                            
                            <select id="sort-select" style="display:none;">
                                <option value="project">{{trans('search.project')}}</option>
                                <option value="member">{{trans('search.team_member')}}</option>
                                <option value="author">{{trans('search.supervisor')}}</option>
                                <option value="language">{{trans('search.supervisor')}}</option>
                            </select>
                        
                        
                    </div>
                    <div class="sort-panel">
                        <a id="filter" href="#filter">Filtreeri</a>
                            <select id="filter-select" style="display:none;">
                                <option value="et">Eesti keel</option>
                                <option value="en">English</option>
                            </select>
                        
                    </div>

                    
                        
                
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