@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Uus projekt
                </div>

                <div class="panel-body">

                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Project Form -->
                    <form action="{{ url('/project/'.$current_project->id) }}" method="POST" class="form-horizontal new-project">
                    {{ csrf_field() }}

                    <!-- Project Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Nimi</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ (empty($current_project) ? old('name') : $current_project->name) }}">
                            </div>
                        </div>


                        <!-- Project Description -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Kirjeldus</label>

                            <div class="col-sm-6">

                                <textarea name="description" id="description" class="form-control">{{ (empty($current_project) ? old('description') : $current_project->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Project Embedded media -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Embed-sisu url</label>

                            <div class="col-sm-6">
                                <input type="text" name="embedded" id="embedded" class="form-control" value="{{ (empty($current_project) ? old('embedded') : $current_project->embedded) }}">
                            </div>
                        </div>


                        <!-- Project Outcomes -->
                        <div class="form-group">
                            <label for="project_outcomes" class="col-sm-3 control-label">Projekti väljundid <p>Üks per rida</p></label>


                            <div class="col-sm-6">
                                <textarea name="project_outcomes" id="project_outcomes" class="form-control">{{ (empty($current_project) ? old('project_outcomes') : $current_project->project_outcomes) }}</textarea>
                            </div>
                        </div>

                        <!-- Student Outcomes -->
                        <div class="form-group">
                            <label for="student_outcomes" class="col-sm-3 control-label">Tudengi õpiväljundid <p>Üks per rida</p></label>

                            <div class="col-sm-6">
                                <textarea name="student_outcomes" id="student_outcomes" class="form-control">{{ (empty($current_project) ? old('student_outcomes') : $current_project->student_outcomes) }}</textarea>
                            </div>
                        </div>


                        <!-- Related Courses -->
                        <div class="form-group">
                            <label for="related_courses" class="col-sm-3 control-label">Seotud kursused <p>Üks per rida</p></label>

                            <div class="col-sm-6">
                                <textarea name="related_courses" id="related_courses" class="form-control">{{ (empty($current_project) ? old('related_courses') : $current_project->courses) }}</textarea>
                            </div>
                        </div>


                        <!-- Project start -->
                        <div class="form-group">
                            <label for="project_start" class="col-sm-3 control-label">Algus</label>
                            <div class='col-sm-6'>
                                <div class='input-group date' id='project_start'>

                                    <input type='text' class="form-control" name="project_start" id="project_start" value="{{ old('project_start') }}"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>

                                </div>
                            </div>
                        </div>


                        <!-- Project end -->
                        <div class="form-group">
                            <label for="project_end" class="col-sm-3 control-label">Lõpp</label>
                            <div class='col-sm-6'>
                                <div class='input-group date' id='project_end'>
                                    <input type='text' class="form-control" name="project_end" id="project_end" value="{{ old('project_end') }}"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>



                        <!-- Institutes -->
                        <div class="form-group">
                            <label for="institutes" class="col-sm-3 control-label">Instituut</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="institutes" name="institutes">

                                    @if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 0 )
                                        <option value="0" selected>Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</option>
                                    @else
                                        <option value="0">Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 1)
                                        <option value="1" selected>Digitehnoloogiate instituut</option>
                                    @else
                                        <option value="1">Digitehnoloogiate instituut</option>
                                    @endif

                                    @if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 2)
                                        <option value="2" selected>Humanitaarteaduste instituut</option>
                                    @else
                                        <option value="2">Humanitaarteaduste instituut</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 3)
                                        <option value="3" selected>Haridusteaduste instituut</option>
                                    @else
                                        <option value="3">Haridusteaduste instituut</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 4)
                                        <option value="4" selected>Loodus- ja terviseteaduste instituut</option>
                                    @else
                                        <option value="4">Loodus- ja terviseteaduste instituut</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 5)
                                        <option value="5" selected>Rakvere kolledž</option>
                                    @else
                                        <option value="5">Rakvere kolledž</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 6)
                                        <option value="6" selected>Haapsalu kolledž</option>
                                    @else
                                        <option value="6">Haapsalu kolledž</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->institute : old('institutes')) == 7)
                                        <option value="7" selected>Ühiskonnateaduste instituut</option>
                                    @else
                                        <option value="7">Ühiskonnateaduste instituut</option>
                                    @endif


                                </select>
                            </div>
                        </div>


                        <!-- Supervisors -->
                        <div class="form-group">
                            <label for="supervisors" class="col-sm-3 control-label">Juhendaja(d) <p>Üks per rida</p></label>

                            <div class="col-sm-6">
                                <textarea name="supervisors" id="supervisors" class="form-control">{{ (empty($current_project) ? old('supervisors') : $current_project->supervisor) }}</textarea>
                            </div>
                        </div>


                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Staatus</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="status" name="status">
                                    @if ((!empty($current_project) ?  $current_project->status : old('status')) == 0)
                                        <option value="0" selected>Lõppenud</option>
                                    @else
                                        <option value="0">Lõppenud</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->status : old('status')) == 1)
                                        <option value="1" selected>Aktiivne</option>
                                    @else
                                        <option value="1">Aktiivne</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="form-group">
                            <label for="tags" class="col-sm-3 control-label">Märksõnad <p>Eralda komaga</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="tags" id="tags" class="form-control" value="{{ (empty($current_project) ? old('tags') : $current_project->tags) }}" data-role="tagsinput" />
                            </div>
                        </div>




                        <!-- Add Project Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-pencil"></i>Muudan
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <!-- Current Projects -->
            @if (count($projects) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Olemasolevad projektid
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped project-table">
                            <thead>
                            <th>Projekt</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="table-text"><div>{{ $project->name }}</div></td>

                                    <!-- Project Delete Button -->
                                    <td>

                                        <form action="{{ url('project/'.$project->id) }}" method="GET">
                                            {{ csrf_field() }}
                                            {{--{{ method_field('PATCH') }}--}}

                                            <button type="submit" class="btn btn-warning pull-left">
                                                <i class="fa fa-btn fa-pencil"></i>Muuda
                                            </button>
                                        </form>
                                        <form id="delete-project" action="{{ url('project/'.$project->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}


                                        </form>
                                        <button type="submit" id="delete" class="btn btn-danger pull-right">
                                            <i class="fa fa-btn fa-trash"></i>Kustuta
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
