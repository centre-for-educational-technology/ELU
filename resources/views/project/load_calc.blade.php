@extends('layouts.app')
@section('footer-scripts')
<script>
  window.Laravel.totalPoints = <?php echo json_encode($total_points); ?>;
  window.Laravel.limitPerOne = <?php echo json_encode($limit_per_one); ?>;
  window.Laravel.supervisors = <?php echo json_encode($supervisors); ?>;
  window.Laravel.cosupervisors = <?php echo json_encode($cosupervisors); ?>;
  window.Laravel.project_id = <?php echo json_encode($project_id); ?>;
</script>
<script src="{{ url(elixir('js/calc-load.js')) }}"></script>
@endsection
@section('content')
    <div class="container">


        <div class="col-sm-offset-1 col-sm-10">

           <div id="calc_load">
               <h3><i class="fa fa-calculator"></i> {{trans('project.calc_load')}}</h3>

               <teacher
                      :limit_per_one="limitPerOne"
                      :points="totalPoints"
                      :data_supervisors="gridSupervisors"
                      :data_cosupervisors="gridCosupervisors"
                      :columns="gridColumns"
                      :project_id="projectID">
              </teacher>
           </div>
        </div>
    </div>

@endsection