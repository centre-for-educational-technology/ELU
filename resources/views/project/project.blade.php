@extends('layouts.app')

    @section('content')

        <div class="container">

            @if (($project->status == 0) && ($project->study_year >= 2017))
                @if (($project->study_term == 1) || ($project->study_term == 2))
                    @include('project.new_finished_project')
                @else
                    @include('project.finished_project')
                @endif
            @elseif(($project->status == 0) && ($project->study_year < 2017))
                @include('project.old_finished_project')
            @else
                @include('project.active_project')
            @endif

        </div>


@endsection
