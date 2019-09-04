@extends('layouts.app')

@section('content')

<div class="container">

  <h4>{{trans ('front.calendar_headline')}} <a href="mailto:elu@tlu.ee">elu@tlu.ee</a>.</h4>
  <div style="display:flex;">
    <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=2&amp;bgcolor=%23FCFAF1&amp;ctz=Europe%2FTallinn&amp;src=tlu.ee_jn0dk8pddtej9jrvu2tgtmh6es%40group.calendar.google.com&amp;color=%23039BE5&amp;mode=WEEK&amp;showTz=0&amp;showPrint=0" style="border-width:0" width="1100" height="700" frameborder="0" scrolling="no"></iframe>
  </div>

</div>

@endsection