@extends('layouts.app')

    @section('content')

        <div class="container">

            @if (($project->status == 0) && ($project->study_year >= 2017))
                @include('project.finished_project')
            @elseif(($project->status == 0) && ($project->study_year < 2017))
                @include('project.old_finished_project')
            @else
                @include('project.active_project')
            @endif

        </div>


@endsection

