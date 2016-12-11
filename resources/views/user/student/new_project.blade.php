@extends('layouts.app')

@section('content')
    <div class="container">



        <div class="row">
            <div class="col-md-8 margt content">
                <h1>Mul on idee</h1>

                <!-- Display Validation Errors -->
                @include('common.errors')

                <form action="{{ url('student/project/new')}}" method="POST" class="form-horizontal new-project">
                {{ csrf_field() }}

                <!-- Project Name -->
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nimi</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
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

                                @if ( old('study_term')) == 2)
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

                {{--<!-- Supervisors -->--}}
                {{--<div class="form-group">--}}
                {{--<label for="supervisors" class="col-sm-3 control-label">Juhendaja(d)</label>--}}


                {{--<div class="col-sm-6">--}}
                {{--<select class="js-example-basic-multiple form-control" id="supervisors" name="supervisors[]" multiple>--}}
                {{--@if ($teachers->count())--}}

                {{--@foreach($teachers as $teacher)--}}
                {{--<option value="{{ $teacher->id }}" {{ $author == $teacher->id ? 'selected="selected"' : '' }}>{{ $teacher->name }}</option>--}}

                {{--<option value="{{ $teacher->id }}">{{ $teacher->name }}</option>--}}
                {{--@endforeach--}}

                {{--@endif--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--</div>--}}

                <!-- Co-supervisors -->
                    <div class="form-group">
                        <label for="cosupervisors" class="col-sm-3 control-label">Kaasjuhendajad <p>Üks per rida</p></label>

                        <div class="col-sm-6">
                            <textarea name="cosupervisors" id="cosupervisors" class="form-control">{{ old('cosupervisors') }}</textarea>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="form-group">
                        <label for="tags" class="col-sm-3 control-label">Märksõnad <p>Eralda komaga</p></label>

                        <div class="col-sm-6">
                            <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags') }}" data-role="tagsinput" />
                        </div>
                    </div>


                    <!-- Extra info -->
                    <div class="form-group">
                        <label for="extra_info" class="col-sm-3 control-label">Lisainfo</label>

                        <div class="col-sm-6">
                            <textarea name="extra_info" id="extra_info" class="form-control">{{ old('extra_info') }}</textarea>
                        </div>
                    </div>



                    <!-- Add Project Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-plus"></i>Saada
                            </button>
                        </div>
                    </div>


                </form>
            </div>



            <div class="col-md-4 margt">
                <img src="{{ url(asset('/css/ico01.png')) }}" class="img-responsive">
            </div>

        </div>




    </div>
@endsection
