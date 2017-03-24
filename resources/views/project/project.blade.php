@extends('layouts.app')

    @section('content')

        <div class="container">

            @if($project->status == 0)
                @include('project.finished_project')
            @else
                @include('project.active_project')
            @endif

        </div>


@endsection

