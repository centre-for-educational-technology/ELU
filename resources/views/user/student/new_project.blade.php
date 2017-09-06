@extends('layouts.app')

@section('content')
    <div class="container">



        <div class="row">
            <div class="col-md-8 margt content">
                <h1>{{trans('front.i_have_idea')}}</h1>

                <!-- Display Validation Errors -->
                @include('common.errors')

                <form action="{{ url('student/project/new')}}" method="POST" class="form-horizontal new-project">
                {{ csrf_field() }}

                    <!-- Project Name -->
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">{{trans('project.name')}} *</label>

                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>

                    <!-- Project Description -->
                    <div class="form-group">

                        <label for="description" class="col-sm-3 control-label">{{trans('project.description')}} *</label>

                        <div class="col-sm-8">
                            <textarea name="description" id="description" class="form-control mceSimple">{{  old('description') }}</textarea>
                        </div>
                    </div>

                    <!-- Project aim -->
                    <div class="form-group">
                        <label for="aim" class="col-sm-3 control-label">{{trans('project.aim')}} *</label>

                        <div class="col-sm-8">

                            <textarea name="aim" id="aim" class="form-control mceSimple">{!! old('aim') !!}</textarea>
                        </div>
                    </div>

                    <!-- Project Interdisciplinary Desc -->
                    <div class="form-group">
                        <label for="interdisciplinary_desc" class="col-sm-3 control-label">{{trans('project.interdisciplinary_desc')}}
                                <i class="fa fa-question-circle" style="cursor: pointer" data-toggle="popover" data-placement="top" data-content="{{trans('project.interdisciplinary_desc_desc')}}"></i>
                       </label>

                        <div class="col-sm-8">


                            <textarea name="interdisciplinary_desc" id="interdisciplinary_desc" class="form-control mceSimple">{{  old('interdisciplinary_desc') }}</textarea>
                        </div>
                    </div>

                    <!-- Project Novelty Desc -->
                    <div class="form-group">
                        <label for="novelty_desc" class="col-sm-3 control-label">{{trans('project.novelty_desc')}} *</label>

                        <div class="col-sm-8">

                            <textarea name="novelty_desc" id="novelty_desc" class="form-control mceSimple">{{  old('novelty_desc') }}</textarea>
                        </div>
                    </div>

                    <!-- Project Outcomes -->
                    <div class="form-group">
                        <label for="project_outcomes" class="col-sm-3 control-label">{{trans('project.outcomes')}} *</label>


                        <div class="col-sm-8">
                            <textarea name="project_outcomes" id="project_outcomes" class="form-control mceSimple">{!! old('project_outcomes') !!}</textarea>
                        </div>
                    </div>

                    <!-- Expectations for students -->
                    <div class="form-group">
                        <label for="student_expectations" class="col-sm-3 control-label">{{trans('project.student_expectations')}}</label>

                        <div class="col-sm-8">
                                <textarea name="student_expectations" id="student_expectations" class="form-control mceSimple">
                                    @if(empty( old('student_expectations')))
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_1')}}</i></p>
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_2')}}</i></p>
                                        <p class="mceNonEditable"><i>{{trans('project.student_expectations_desc_3')}}</i></p>
                                    @else
                                        {!! old('student_expectations') !!}
                                    @endif
                                </textarea>
                        </div>
                    </div>

                    <!-- Author Management Skills -->
                    <div class="form-group">
                        <label for="author_management_skills" class="col-sm-3 control-label">{{trans('project.author_management_skills')}}</label>

                        <div class="col-sm-8">

                            <textarea name="author_management_skills" id="author_management_skills" class="form-control">{{  old('author_management_skills') }}</textarea>
                        </div>
                    </div>


                    <!-- Integrated areas -->
                    {{--<div class="form-group">--}}
                        {{--<label for="integrated_areas" class="col-sm-3 control-label">{{trans('project.integrated_study_areas')}} <p>{{trans('project.one_per_line')}}</p></label>--}}


                        {{--<div class="col-sm-8">--}}
                            {{--<textarea name="integrated_areas" id="integrated_areas" class="form-control">{{  old('integrated_areas') }}</textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    {{--<!-- Study area -->--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="study_areas" class="col-sm-3 control-label">{{trans('project.study_area')}}</label>--}}


                        {{--<div class="col-sm-8">--}}
                            {{--<select class="js-example-basic-multiple form-control" id="study_areas" name="study_areas[]" multiple>--}}
                                {{--@if ($courses->count())--}}

                                    {{--@foreach($courses as $course)--}}
                                        {{--<option value="{{ $course->id }}">{{ getCourseName($course)  }}</option>--}}
                                    {{--@endforeach--}}

                                {{--@endif--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    <!-- Study term -->
                    <div class="form-group">
                        <label for="study_term" class="col-sm-3 control-label">{{trans('project.duration')}} *</label>

                        <div class="col-sm-8">
                            <select class="form-control" id="study_term" name="study_term">
                                @if ( old('study_term')) == 0)
                                <option value="0" selected>{{trans('project.autumn_semester')}}</option>
                                @else
                                    <option value="0">{{trans('project.autumn_semester')}}</option>
                                @endif

                                @if ( old('study_term')) == 1)
                                <option value="1" selected>{{trans('project.spring_semester')}}</option>
                                @else
                                    <option value="1">{{trans('project.spring_semester')}}</option>
                                @endif

                                @if ( old('study_term')) == 2)
                                <option value="2" selected>{{trans('project.autumn_spring')}}</option>
                                @else
                                    <option value="2">{{trans('project.autumn_spring')}}</option>
                                @endif

                                @if ( old('study_term')) == 3)
                                <option value="3" selected>{{trans('project.spring_autumn')}}</option>
                                @else
                                    <option value="3">{{trans('project.spring_autumn')}}</option>
                                @endif

                            </select>
                        </div>
                    </div>


                    <!-- Study year -->
                    <div class="form-group">
                        <label for="study_year" class="col-sm-3 control-label">{{trans('project.study_year')}} *</label>

                        <div class="col-sm-8">
                            <select class="form-control" id="study_year" name="study_year">
                                @if( old('study_year') == Carbon\Carbon::now()->year)
                                    <option value="{{Carbon\Carbon::now()->year}}" selected>{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>
                                    <option value="{{Carbon\Carbon::now()->year-1}}">{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                @elseif(old('study_year') == Carbon\Carbon::now()->year-1)
                                    <option value="{{Carbon\Carbon::now()->year-1}}" selected>{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                    <option value="{{Carbon\Carbon::now()->year}}">{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>
                                @else
                                    @if(Carbon\Carbon::now()->month >= 6)
                                        <option value="{{Carbon\Carbon::now()->year}}" selected>{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>
                                        <option value="{{Carbon\Carbon::now()->year-1}}">{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                    @else
                                        <option value="{{Carbon\Carbon::now()->year-1}}" selected>{{Carbon\Carbon::now()->year-1}}/{{Carbon\Carbon::now()->year}}</option>
                                        <option value="{{Carbon\Carbon::now()->year}}">{{Carbon\Carbon::now()->year}}/{{Carbon\Carbon::now()->year+1}}</option>

                                    @endif
                                @endif

                            </select>
                        </div>
                    </div>


                {{--<!-- Student Outcomes -->--}}
                {{--<div class="form-group">--}}
                {{--<label for="student_outcomes" class="col-sm-3 control-label">Tudengi õpiväljundid <p>Üks per rida</p></label>--}}

                {{--<div class="col-sm-8">--}}
                {{--<textarea name="student_outcomes" id="student_outcomes" class="form-control">{{  old('student_outcomes') }}</textarea>--}}
                {{--</div>--}}
                {{--</div>--}}





                <!-- Institutes -->
                    {{--<div class="form-group">--}}
                        {{--<label for="institutes" class="col-sm-3 control-label">{{trans('project.institute')}}</label>--}}

                        {{--<div class="col-sm-8">--}}
                            {{--<select class="form-control" id="institutes" name="institutes">--}}

                                {{--@if ( old('institutes')) == 0 )--}}
                                {{--<option value="0" selected>Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</option>--}}
                                {{--@else--}}
                                    {{--<option value="0">Balti filmi, meedia, kunstide ja kommunikatsiooni instituut</option>--}}
                                {{--@endif--}}


                                {{--@if ( old('institutes')) == 1)--}}
                                {{--<option value="1" selected>Digitehnoloogiate instituut</option>--}}
                                {{--@else--}}
                                    {{--<option value="1">Digitehnoloogiate instituut</option>--}}
                                {{--@endif--}}

                                {{--@if ( old('institutes')) == 2)--}}
                                {{--<option value="2" selected>Humanitaarteaduste instituut</option>--}}
                                {{--@else--}}
                                    {{--<option value="2">Humanitaarteaduste instituut</option>--}}
                                {{--@endif--}}


                                {{--@if ( old('institutes')) == 3)--}}
                                {{--<option value="3" selected>Haridusteaduste instituut</option>--}}
                                {{--@else--}}
                                    {{--<option value="3">Haridusteaduste instituut</option>--}}
                                {{--@endif--}}


                                {{--@if ( old('institutes')) == 4)--}}
                                {{--<option value="4" selected>Loodus- ja terviseteaduste instituut</option>--}}
                                {{--@else--}}
                                    {{--<option value="4">Loodus- ja terviseteaduste instituut</option>--}}
                                {{--@endif--}}


                                {{--@if ( old('institutes')) == 5)--}}
                                {{--<option value="5" selected>Rakvere kolledž</option>--}}
                                {{--@else--}}
                                    {{--<option value="5">Rakvere kolledž</option>--}}
                                {{--@endif--}}


                                {{--@if ( old('institutes')) == 6)--}}
                                {{--<option value="6" selected>Haapsalu kolledž</option>--}}
                                {{--@else--}}
                                    {{--<option value="6">Haapsalu kolledž</option>--}}
                                {{--@endif--}}


                                {{--@if ( old('institutes')) == 7)--}}
                                {{--<option value="7" selected>Ühiskonnateaduste instituut</option>--}}
                                {{--@else--}}
                                    {{--<option value="7">Ühiskonnateaduste instituut</option>--}}
                                {{--@endif--}}


                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--<!-- Supervisors -->--}}
                {{--<div class="form-group">--}}
                {{--<label for="supervisors" class="col-sm-3 control-label">Juhendaja(d)</label>--}}


                {{--<div class="col-sm-8">--}}
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
                        <label for="cosupervisors" class="col-sm-3 control-label">{{trans('project.cosupervisor')}} <p>{{trans('project.one_per_line')}}</p></label>

                        <div class="col-sm-8">
                            <textarea name="cosupervisors" id="cosupervisors" class="form-control">{{ old('cosupervisors') }}</textarea>
                        </div>
                    </div>


                    <!-- Tags -->
                    <div class="form-group">
                        <label for="tags" class="col-sm-3 control-label">{{trans('project.keywords')}} *<p>{{trans('project.separated_with_commas')}}</p></label>

                        <div class="col-sm-8">
                            <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags') }}" data-role="tagsinput" />
                        </div>
                    </div>


                    <!-- Extra info -->
                    <div class="form-group">
                        <label for="extra_info" class="col-sm-3 control-label">{{trans('project.extra_info')}}</label>

                        <div class="col-sm-8">
                            <textarea name="extra_info" id="extra_info" class="form-control">{{ old('extra_info') }}</textarea>
                        </div>
                    </div>


                    <h3>{{trans('project.idea_info_text_heading')}}</h3>
                    <h4>{{trans('project.idea_info_text_subheading')}}</h4>
                    <ul>
                        <li>{{trans('project.idea_info_text_1')}}</li>
                        <li>{{trans('project.idea_info_text_2')}}</li>
                        <li>{{trans('project.idea_info_text_3')}}</li>
                        <li>{{trans('project.idea_info_text_4')}}</li>
                        <li>{{trans('project.idea_info_text_5')}}</li>
                        <li>{{trans('project.idea_info_text_6')}}</li>
                        <li>{{trans('project.idea_info_text_7')}}</li>
                        <li>{{trans('project.idea_info_text_8')}}</li>

                    </ul>



                    <!-- Add Project Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-btn fa-paper-plane"></i>{{trans('project.send')}}
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
