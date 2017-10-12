@extends('layouts.app')

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