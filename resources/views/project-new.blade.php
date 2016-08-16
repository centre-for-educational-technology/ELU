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
                    <form action="{{ url('project-new')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Project Name -->
                        <div class="form-group">
                            <label for="project-name" class="col-sm-3 control-label">Nimi</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="project-name" class="form-control" value="{{ old('project') }}">
                            </div>
                        </div>


                        <!-- Project Description -->
                        <div class="form-group">
                            <label for="project-description" class="col-sm-3 control-label">Kirjeldus</label>

                            <div class="col-sm-6">

                                <textarea name="description" id="project-description" class="form-control" value="{{ old('description') }}"></textarea>
                            </div>
                        </div>


                        <!-- Project Outcomes -->
                        <div class="form-group">
                            <label for="project-outcomes" class="col-sm-3 control-label">Projekti väljundid</label>

                            <div class="col-sm-6">
                                <textarea name="outcomes" id="project-outcomes" class="form-control" value="{{ old('project-outcomes') }}"></textarea>
                            </div>
                        </div>

                        <!-- Student Outcomes -->
                        <div class="form-group">
                            <label for="student-outcomes" class="col-sm-3 control-label">Tudengi õpiväljundid</label>

                            <div class="col-sm-6">
                                <textarea name="outcomes" id="student-outcomes" class="form-control" value="{{ old('student-outcomes') }}"></textarea>
                            </div>
                        </div>


                        <!-- Related Courses -->
                        <div class="form-group">
                            <label for="student-outcomes" class="col-sm-3 control-label">Seotud kursused</label>

                            <div class="col-sm-6">
                                <textarea name="outcomes" id="student-outcomes" class="form-control" value="{{ old('student-outcomes') }}"></textarea>
                            </div>
                        </div>


                        <!-- Related Courses -->
                        <div class="form-group">
                            <label for="student-outcomes" class="col-sm-3 control-label">Seotud kursused</label>

                            <div class="col-sm-6">
                                <textarea name="outcomes" id="student-outcomes" class="form-control" value="{{ old('student-outcomes') }}"></textarea>
                            </div>
                        </div>




                            <div class="container">
                                <div class='col-md-5'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker6'>
                                            <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-5'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker7'>
                                            <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>




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
                        Current Projects
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped project-table">
                            <thead>
                                <th>Project</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td class="table-text"><div>{{ $project->name }}</div></td>

                                        <!-- Project Delete Button -->
                                        <td>
                                            <form action="{{ url('project/'.$project->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
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
