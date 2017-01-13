@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Muuda projekti
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

                        <!-- Project Embedded media -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Embed-sisu url <p>Nt. https://youtu.be/...</p></label>

                            <div class="col-sm-6">
                                <input type="text" name="embedded" id="embedded" class="form-control" value="{{ (empty($current_project) ? old('embedded') : $current_project->embedded) }}">
                            </div>
                        </div>


                        <!-- Project Description -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Kirjeldus</label>

                            <div class="col-sm-6">

                                <textarea name="description" id="description" class="form-control">{{ (empty($current_project) ? old('description') : $current_project->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Integrated areas -->
                        <div class="form-group">
                            <label for="integrated_areas" class="col-sm-3 control-label">Lõimitud valdkonnad <p>Üks per rida</p></label>


                            <div class="col-sm-6">
                                <textarea name="integrated_areas" id="integrated_areas" class="form-control">{{ (empty($current_project) ? old('integrated_areas') : $current_project->integrated_areas) }}</textarea>
                            </div>
                        </div>


                        <!-- Study term -->
                        <div class="form-group">
                            <label for="study_term" class="col-sm-3 control-label">Projekti kestus</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="study_term" name="study_term">

                                    @if ((!empty($current_project) ?  $current_project->study_term : old('study_term')) == 0)
                                        <option value="0" selected>Sügissemester</option>
                                    @else
                                        <option value="0">Sügissemester</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->study_term : old('study_term')) == 1)
                                        <option value="1" selected>Kevadsemester</option>
                                    @else
                                        <option value="1">Kevadsemester</option>
                                    @endif

                                    @if ( (!empty($current_project) ?  $current_project->study_term : old('study_term')) == 2)
                                        <option value="2" selected>Mõlemad semestrid</option>
                                    @else
                                        <option value="2">Mõlemad semestrid</option>
                                    @endif

                                </select>
                            </div>
                        </div>


                        {{--<!-- Project Outcomes -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="project_outcomes" class="col-sm-3 control-label">Projekti väljundid <p>Üks per rida</p></label>--}}


                            {{--<div class="col-sm-6">--}}
                                {{--<textarea name="project_outcomes" id="project_outcomes" class="form-control">{{ (empty($current_project) ? old('project_outcomes') : $current_project->project_outcomes) }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Student Outcomes -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="student_outcomes" class="col-sm-3 control-label">Tudengi õpiväljundid <p>Üks per rida</p></label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<textarea name="student_outcomes" id="student_outcomes" class="form-control">{{ (empty($current_project) ? old('student_outcomes') : $current_project->student_outcomes) }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}


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

                                    <input type='text' class="form-control" name="project_start" id="project_start" value="{{ (empty($current_project) ? old('project_start') : empty($current_project->start) ? old('project_start') :$current_project->start) }}"/>
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
                                    <input type='text' class="form-control" name="project_end" id="project_end" value="{{ (empty($current_project) ? old('project_end') : empty($current_project->end) ? old('project_end') :$current_project->end) }}"/>
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
                            <label for="supervisors" class="col-sm-3 control-label">Juhendaja(d)</label>


                            <div class="col-sm-6">
                                <select class="js-example-basic-multiple form-control" id="supervisors" name="supervisors[]" multiple>
                                    @if ($authors)

                                        @foreach($authors as $author)

                                            @if(!empty($author->full_name))
                                                <option value="{{ $author->id }}" selected="selected">{{ $author->full_name }}</option>
                                            @else
                                                <option value="{{ $author->id }}" selected="selected">{{ $author->name }}</option>
                                            @endif

                                        @endforeach
                                    @endif

                                    @if ($teachers->count())

                                        @foreach($teachers as $teacher)

                                            @if(!empty($teacher->full_name))
                                                <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                            @else
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endif


                                        @endforeach

                                    @endif

                                </select>
                            </div>
                        </div>

                        <!-- Co-supervisors -->
                        <div class="form-group">
                            <label for="cosupervisors" class="col-sm-3 control-label">Kaasjuhendajad <p>Üks per rida</p></label>

                            <div class="col-sm-6">
                                <textarea name="cosupervisors" id="cosupervisors" class="form-control">{{ (empty($current_project) ? old('cosupervisors') : $current_project->supervisor) }}</textarea>
                            </div>
                        </div>





                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Staatus</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="status" name="status">

                                    @if ((!empty($current_project) ?  $current_project->status : old('status')) == 1)
                                        <option value="1" selected>Aktiivne</option>
                                    @else
                                        <option value="1">Aktiivne</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->status : old('status')) == 0)
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
                                <input type="text" name="tags" id="tags" class="form-control" value="{{ (empty($current_project) ? old('tags') : $current_project->tags) }}" data-role="tagsinput" />
                            </div>
                        </div>


                        <!-- Project deadline for joining -->
                        <div class="form-group">
                            <label for="join_deadline" class="col-sm-3 control-label">Registreerimise tähtaeg</label>
                            <div class='col-sm-6'>
                                <div class='input-group date' id='join_deadline'>

                                    <input type='text' class="form-control" name="join_deadline" id="join_deadline" value="{{ (empty($current_project) ? old('join_deadline') : empty($current_project->join_deadline) ? old('join_deadline') :$current_project->join_deadline) }}"/>
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>

                                </div>
                            </div>
                        </div>

                        <!-- Extra info -->
                        <div class="form-group">
                            <label for="extra_info" class="col-sm-3 control-label">Lisainfo</label>

                            <div class="col-sm-6">
                                <textarea name="extra_info" id="extra_info" class="form-control">{{ (empty($current_project) ? old('extra_info') : $current_project->extra_info) }}</textarea>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="publishing_status" class="col-sm-3 control-label">Kas on avaldatud?</label>

                            <div class="col-sm-6">
                                <select class="form-control" id="publishing_status" name="publishing_status">


                                    @if ((!empty($current_project) ?  $current_project->publishing_status : old('publishing_status')) == 1)
                                        <option value="1" selected>Avaldatud</option>
                                    @else
                                        <option value="1">Avaldatud</option>
                                    @endif


                                    @if ((!empty($current_project) ?  $current_project->publishing_status : old('publishing_status')) == 0)
                                        <option value="0" selected>Peidetud</option>
                                    @else
                                        <option value="0">Peidetud</option>
                                    @endif




                                </select>
                            </div>
                        </div>



                        {{--<!-- Link to join project -->--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="join_link" class="col-sm-3 control-label">Projektiga liitumise link <p>Google Form vms viide</p></label>--}}

                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="join_link" id="join_link" class="form-control" value="{{ (empty($current_project) ? old('join_link') : $current_project->join_link) }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}


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
            @if (count($current_project->users) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Projekti meeskond
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped project-table">
                            <thead>
                            <th>Kasutaja</th>
                            <th>Kursus</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>

                            @foreach ($current_project->users as $user)
                                <tr>
                                @if ( $user->pivot->participation_role == 'member' )
                                    @if(!empty($user->full_name))
                                        <td class="table-text"><div>{{ $user->full_name }}</div></td>

                                    @else
                                        <td class="table-text"><div>{{ $user->name }}</div></td>
                                    @endif

                                    <td>
                                        @if(!empty($user->courses))
                                            @foreach($user->courses as $course)
                                                <span class="label label-success">{{ $course->name }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <form class="delete-user" action="{{ url('project/'.$current_project->id).'/unlink/'.$user->id }}" method="POST">
                                            {{ csrf_field() }}


                                        </form>
                                        <button type="submit" id="delete-user-button" class="btn btn-danger pull-right">
                                            <i class="fa fa-btn fa-unlink"></i>Kustuta
                                        </button>

                                    </td>
                                @endif
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
