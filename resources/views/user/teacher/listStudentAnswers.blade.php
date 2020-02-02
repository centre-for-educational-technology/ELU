@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="col-sm-12">

            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            @if ($project)

                <h3><i class="fa fa-question-circle"></i> {{$project->name}}</h3>


                <div class="table-responsive">
                <table class="table table-responsive table-striped project-table">
                    <thead>
                      <th>Tudengi nimi</th>
                      <th>{{$project->join_q1}}</th>
                      <th>{{$project->join_q2}}</th>
                      <th>{{$project->join_q3}}</th>
  
                      @if($project->join_extra_q1)
                        <th>{{$project->join_extra_q1}}</th>
                      @endif                      
  
                      @if($project->join_extra_q1)
                        <th>{{$project->join_extra_q2}}</th>
                      @endif
                    </thead>

                    <tbody>
                      @foreach ($members as $user)

                        <tr>
  
                          @if($user->pivot->participation_role == 'member')
                            <td class="table-text"><div>{{ $user->full_name ? $user->full_name : $user->name }}</div></td>
                            <td class="table-text"><div>{{ $user->pivot->join_a1 }}</div></td>
                            <td class="table-text"><div>{{ $user->pivot->join_a2 }}</div></td>
                            <td class="table-text"><div>{{ $user->pivot->join_a3 }}</div></td>
                            <td class="table-text"><div>{{ $user->pivot->join_extra_a1 }}</div></td>
                            <td class="table-text"><div>{{ $user->pivot->join_extra_a2 }}</div></td>
                          @endif

                        </tr>

                      
                      @endforeach
                    </tbody>
                </table>
                </div>
            @else

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('project.no_project_found')}}</h3>
                    </div>
                </div>

            @endif

        </div>
    </div>
@endsection
