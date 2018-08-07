@extends('layouts.app')

@section('content')
<!-- Pealkiri -->
<div class="col-log-12 col-lg-offset-2">
    <h2 class="h2 class-uppercase"><b>{{trans('project.adding')}}</b></h2>
</div>

<div class="container">

    <!-- Display Validation Errors -->
    @include('common.errors')

    <form action="{{ url('project/new/outside') }}" id="project_form" method="GET" class="form-horizontal new-project" enctype="multipart/form-data">
        {{ csrf_field() }}
    </form>

@endsection