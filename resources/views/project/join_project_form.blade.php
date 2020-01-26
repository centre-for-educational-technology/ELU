<p> {{trans('project.join_heading')}}</p>

<form  class="well" action="{{ url('join/'.$project->id) }}" id="join-project" method="POST">
    {{ csrf_field() }}

    {{-- Join Question 1 --}}
    <div class="form-group">
        <label for="join_a1" >{{trans('project.why_join')}} *</label>
        <input name="join_a1" id="join_a1" class="form-control"value="{{old('join_a1')}}">
    </div>

    {{-- Join Question 2 --}}
    <div class="form-group">
        <label for="join_a2">{{trans('project.my_contribution')}} *</label>
        <input  name="join_a2" id="join_a2" class="form-control"value="{{old('join_a2')}}">
    </div>

    {{-- Join Question 3 --}}
    <div class="form-group">
        <label for="join_a3">{{trans('project.my_expectations')}} *</label>
        <input  name="join_a3" id="join_a3" class="form-control"value="{{old('join_a3')}}">
    </div>

    {{-- Extra Question 1 --}}
    @if ($project->join_extra_q1)
      <div class="form-group">
        <label for="join_extra_a1">{{$project->join_extra_q1}} *</label>
        <input  name="join_extra_a1" id="join_extra_a1" class="form-control"value="{{old('join_extra_a1')}}">
      </div>
    @endif

    {{-- Extra Question 2 --}}
    @if ($project->join_extra_q2)
      <div class="form-group">
          <label for="join_extra_a2">{{$project->join_extra_q2}} *</label>
          <input name="join_extra_a2" id="join_extra_a2" class="form-control"value="{{old('join_extra_a2')}}">
      </div>
    @endif

</form>

<button type="submit" id="join-project-button" class="btn btn-primary btn-lg">
    {{trans('search.join_button')}}
</button>

