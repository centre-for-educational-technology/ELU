@extends('layouts.app')
@section('footer-scripts')
<script>
  window.Laravel.totalPoints = <?php echo json_encode($total_points); ?>;
  window.Laravel.limitPerOne = <?php echo json_encode($limit_per_one); ?>;
  window.Laravel.supervisors = <?php echo json_encode($supervisors); ?>;
</script>
@endsection
@section('content')

   <div id="demo">

      <teacher
              :limit_per_one="limitPerOne"
              :points="totalPoints"
              :data="gridData"
              :columns="gridColumns">
      </teacher>
   </div>
@endsection