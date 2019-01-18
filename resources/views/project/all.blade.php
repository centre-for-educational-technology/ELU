@if (count($projects) > 0)
    <div class="row">
        <div class="col-md-4 margt">
            <!--
            <div class="row">

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Dropdown: <span class="selected"></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        vali keel
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">inglise keel</a>
                        <a class="dropdown-item" href="#">eesti keel</a>
                    </div>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Staatus
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Tagasi lükatud</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </div>

            </div>
            -->


            <table class="table">
                <tr>
                    <th class="jrk">#</th>
                    <th class="nimi">Projekti nimi</th>
                    <th class="kohti"><!--Kohti--></th>
                </tr>
                @php
                    $project_index=1;
                @endphp
                @foreach($projects as $index =>$project)
                    <tr>
                        <td>{{ $project_index }}</td>
                        <td>
                            <div class="container">
                                @if ($project->languages == 'et')
                                    <h5><a href="{{ url('/project/'.$project->id) }}">{{$project->name_et}}</a></h5>
                                @elseif ($project->languages == 'en')
                                    <h5><a href="{{ url('/project/'.$project->id) }}">{{$project->name_en}}</a></h5>
                                @else
                                    <h5><a href="{{ url('/project/'.$project->id) }}">{{ $project->name_et }} // {{ $project->name_en }}</a><h5>
                                @endif
                                <!--
                                <span data-toggle="collapse" data-target="#demo">Loe rohkem>></span>
                                <div id="demo" class="collapse">
                                    <div class="btn-group">
                                        <button><a href="#">Otsi sarnaseid projekte</a></button>
                                    </div>
                                    <div class="tag-group">
                                        <div class="tag-search">tag</div>
                                        <div class="tag-search">taaaaaaaaaaaag</div>
                                        <div class="tag-search">taaaaaaaaaaaag</div>
                                        <div class="tag-search">taaaaaaaaaaaag</div>
                                    </div>
                                -->
                                </div>
                            </div>
                        </td>
                        <td><!--3--></td>
                    </tr>
                    @php
                        $project_index += 1;
                    @endphp
                @endforeach
            </table>

        </div>
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
