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
                    <form action="{{ url('project')}}" method="POST" class="form-horizontal new-project">
                        {{ csrf_field() }}

                        <!-- Project Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Nimi</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <!-- Project Embedded media -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Tutvustava video link (YouTube) <p>Nt. https://youtu.be/...</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="embedded" id="embedded" class="form-control" value="{{  old('embedded') }}">
                            </div>
                        </div>

                        <!-- Project Description -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Kirjeldus</label>

                            <div class="col-sm-6">

                                <textarea name="description" id="description" class="form-control">{{  old('description') }}</textarea>
                            </div>
                        </div>


                        <!-- Integrated areas -->
                        <div class="form-group">
                            <label for="integrated_areas" class="col-sm-3 control-label">Lõimitud valdkonnad <p>Üks per rida</p></label>


                            <div class="col-sm-6">
                                <textarea name="integrated_areas" id="integrated_areas" class="form-control">{{  old('integrated_areas') }}</textarea>
                            </div>
                        </div>


                        <!-- Study term -->
                        <div class="form-group">
                            <label for="study_term" class="col-sm-3 control-label">Projekti kestus</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="study_term" name="study_term">
                                    @if ( old('study_term')) == 0)
                                    <option value="0" selected>Sügissemester</option>
                                    @else
                                        <option value="0">Sügissemester</option>
                                    @endif


                                    @if ( old('study_term')) == 1)
                                    <option value="1" selected>Kevadsemester</option>
                                    @else
                                        <option value="1">Kevadsemester</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        {{--<!-- Project Outcomes -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="project_outcomes" class="col-sm-3 control-label">Projekti väljundid <p>Üks per rida</p></label>--}}


                            {{--<div class="col-sm-6">--}}
                                {{--<textarea name="project_outcomes" id="project_outcomes" class="form-control">{{  old('project_outcomes') }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Student Outcomes -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="student_outcomes" class="col-sm-3 control-label">Tudengi õpiväljundid <p>Üks per rida</p></label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<textarea name="student_outcomes" id="student_outcomes" class="form-control">{{  old('student_outcomes') }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <!-- Related Courses -->
                        <div class="form-group">
                            <label for="related_courses" class="col-sm-3 control-label">Seotud kursused <p>Üks per rida</p></label>

                            <div class="col-sm-6">
                                <textarea name="related_courses" id="related_courses" class="form-control">{{  old('related_courses') }}</textarea>
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

                                    @if ( old('institutes')) == 0 )
                                        <option value="0" selected>Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</option>
                                    @else
                                        <option value="0">Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</option>
                                    @endif


                                    @if ( old('institutes')) == 1)
                                        <option value="1" selected>Digitehnoloogiate instituut</option>
                                    @else
                                        <option value="1">Digitehnoloogiate instituut</option>
                                    @endif

                                    @if ( old('institutes')) == 2)
                                        <option value="2" selected>Humanitaarteaduste instituut</option>
                                    @else
                                        <option value="2">Humanitaarteaduste instituut</option>
                                    @endif


                                    @if ( old('institutes')) == 3)
                                        <option value="3" selected>Haridusteaduste instituut</option>
                                    @else
                                        <option value="3">Haridusteaduste instituut</option>
                                    @endif


                                    @if ( old('institutes')) == 4)
                                        <option value="4" selected>Loodus- ja terviseteaduste instituut</option>
                                    @else
                                        <option value="4">Loodus- ja terviseteaduste instituut</option>
                                    @endif


                                    @if ( old('institutes')) == 5)
                                        <option value="5" selected>Rakvere kolledž</option>
                                    @else
                                        <option value="5">Rakvere kolledž</option>
                                    @endif


                                    @if ( old('institutes')) == 6)
                                        <option value="6" selected>Haapsalu kolledž</option>
                                    @else
                                        <option value="6">Haapsalu kolledž</option>
                                    @endif


                                    @if ( old('institutes')) == 7)
                                        <option value="7" selected>Ühiskonnateaduste instituut</option>
                                    @else
                                        <option value="7">Ühiskonnateaduste instituut</option>
                                    @endif


                                </select>
                            </div>
                        </div>



                        <!-- Supervisors -->
                        <div class="form-group">
                            <label for="supervisors" class="col-sm-3 control-label">Juhendaja(d)</label>


                            <div class="col-sm-6">
                                <select class="js-example-basic-multiple form-control" id="supervisors" name="supervisors[]" multiple>
                                    @if ($teachers->count())

                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ $author == $teacher->id ? 'selected="selected"' : '' }}>{{ $teacher->name }}</option>

                                            {{--<option value="{{ $teacher->id }}">{{ $teacher->name }}</option>--}}
                                        @endforeach

                                    @endif
                                </select>
                            </div>
                        </div>

                        <!-- Co-supervisors -->
                        <div class="form-group">
                            <label for="cosupervisors" class="col-sm-3 control-label">Kaasjuhendajad <p>Üks per rida</p></label>

                            <div class="col-sm-6">
                                <textarea name="cosupervisors" id="cosupervisors" class="form-control">{{ old('cosupervisors') }}</textarea>
                            </div>
                        </div>


                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Staatus</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="status" name="status">

                                    @if ( old('status')) == 1)
                                    <option value="1" selected>Aktiivne</option>
                                    @else
                                        <option value="1">Aktiivne</option>
                                    @endif

                                    @if ( old('status')) == 0)
                                        <option value="0" selected>Lõppenud</option>
                                    @else
                                        <option value="0">Lõppenud</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="form-group">
                            <label for="tags" class="col-sm-3 control-label">Märksõnad <p>Eralda komaga</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags') }}" data-role="tagsinput" />
                            </div>
                        </div>


                        <!-- Project deadline for joining -->
                        <div class="form-group">
                            <label for="join_deadline" class="col-sm-3 control-label">Registreerimise tähtaeg</label>
                            <div class='col-sm-6'>
                                <div class='input-group date' id='join_deadline'>

                                    <input type='text' class="form-control" name="join_deadline" id="join_deadline" value="{{ old('join_deadline') }}"/>
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>

                                </div>
                            </div>
                        </div>

                        <!-- Extra info -->
                        <div class="form-group">
                            <label for="extra_info" class="col-sm-3 control-label">Tutvustavad materjalid</label>

                            <div class="col-sm-6">
                                <textarea name="extra_info" id="extra_info" class="form-control">{{ old('extra_info') }}</textarea>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="publishing_status" class="col-sm-3 control-label">Kas on avaldatud?</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="publishing_status" name="publishing_status">

                                    @if ( old('publishing_status')) == 0)
                                    <option value="0" selected>Peidetud</option>
                                    @else
                                        <option value="0">Peidetud</option>
                                    @endif

                                    @if ( old('publishing_status')) == 1)
                                    <option value="1" selected>Avaldatud</option>
                                    @else
                                        <option value="1">Avaldatud</option>
                                    @endif

                                </select>
                            </div>
                        </div>


                        {{--<!-- Link to join project -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="join_link" class="col-sm-3 control-label">Projektiga liitumise link <p>Google Form vms viide</p></label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="join_link" id="join_link" class="form-control" value="{{  old('join_link') }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}



                            <!-- Add Project Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Lisan
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
                        Minu projektid
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped project-table">
                            <thead>
                            <th>Projekt</th>
                            <th>&nbsp;</th>
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

                                            <button type="submit" class="btn btn-warning pull-right">
                                                <i class="fa fa-btn fa-pencil"></i>Muuda
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="delete-project" action="{{ url('project/'.$project->id) }}" method="POST">
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
