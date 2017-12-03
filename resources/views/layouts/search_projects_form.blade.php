<div class="panel mt2em panel-default">
    <div class="panel-body">
        <div class="row">


            <form action="{{ url($url_data) }}" method="GET" class="form-horizontal search-project" id="subform">
                {{ csrf_field() }}

                <div class="col-lg-4 col-md-4">

                    <div class="input-group-btn search-panel">
                        <ul class="nav navbar-nav menu01" role="menu">
                            <li class="active"><a href="#project">{{trans('search.project')}}</a></li>
                            <li><a href="#member">{{trans('search.team_member')}}</a></li>
                            <li><a href="#author">{{trans('search.supervisor')}}</a></li>
                        </ul>
                    </div>

                    
                    <table>
                        
                        <tr class="dropdown-row">
                            <td>
                                <a id="filter" href="#filter">{{trans('search.filter')}}</a>
                            </td>
                            <td>
                                <lable id="filter-select" style="visibility:hidden;">
                                    <lable><input type="checkbox" name="filter_param" value="et">{{trans('search.filter_language_et')}}</lable>
                                    <lable><input type="checkbox" name="filter_param" value="en">{{trans('search.filter_language_en')}}</lable>
                                </lable>
                            </td>
                        </tr>
                        <tr class="dropdown-row">
                            <td>
                                <a id="sort" href="#sort">{{trans('search.sort')}}</a>
                            </td>
                            <td>
                                <lable id="sort-select" style="visibility:hidden;">
                                    <lable><input type="radio" name="sort_param" value="project" style='display: none;'>{{trans('search.sort_project')}}<span class='glyphicon glyphicon-sort sort-button'></span></lable>
                                    <lable><input type="radio" name="sort_param" value="member" style='display: none;'>{{trans('search.sort_team_member')}}<span class='glyphicon glyphicon-sort sort-button'></span></lable>
                                    <lable><input type="radio" name="sort_param" value="author" style='display: none;'>{{trans('search.sort_supervisor')}}<span class='glyphicon glyphicon-sort sort-button'></span></lable>
                                    <lable><input type="radio" name="sort_param" value="language" style='display: none;'>{{trans('search.sort_language')}}<span class='glyphicon glyphicon-sort sort-button'></span></lable>
                                </lable>
                            </td>
                        </tr>

                    </table>

                </div>
<script>
    //console.log("{{ app('request')->input('sort') }}");
    //console.log("{{ 'projects' }}");
    </script>

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
                    <div class="form-group search">
                        </div>
                </div>

            </form>

        </div>
    </div>
</div>