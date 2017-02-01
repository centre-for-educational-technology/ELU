@extends('layouts.app')

@section('content')
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"><h3>KKK</h3></div>--}}
                    {{--<div class="panel-body faq">--}}
                        {{--{!! nl2br($faq->body) !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


{{--XXX Static content--}}
    <div class="container">
        <h1>{{trans('faq.faq')}}</h1>
        <div class="row">
            <div class="col-md-4 margt">
                <ul class="nav menu02 nav-stacked">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#item1">{{trans('faq.what')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item2">{{trans('faq.why')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item3">{{trans('faq.when')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item4">{{trans('faq.with_who')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item5">{{trans('faq.how')}}</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#item6">{{trans('faq.which')}}</a></li>
                </ul>
            </div>
            <div class="col-md-8 margt content tab-content">
                <div id="item1" class="tab-pane fade in active">
                    <h2 class="h3 text-uppercase">{{trans('faq.what')}}
                    </h2>
                    <p>
                        {{trans('faq.what.desc')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc2')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc3')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc4')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc5')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc6')}}
                    </p>
                    <p>
                        {{trans('faq.what.desc7')}}
                    </p>
                    <p><a href="{{trans('faq.what.link')}}" target="_blank">{{trans('faq.what.desc8')}}</a></p>
                    <p><a href="{{trans('faq.what.link2')}}" target="_blank">{{trans('faq.what.desc9')}}</a></p>

                    {{--<h3>{{trans('faq.what_table_header')}}</h3>--}}

                    {{--<table class="table table-bordered table-striped table-responsive what-table">--}}
                        {{--<thead>--}}
                        {{--<tr class="what-table-accent">--}}
                            {{--<th colspan="2">--}}
                                {{--{{trans('faq.what_table_before')}}--}}
                            {{--</th>--}}
                            {{--<th colspan="2">--}}
                                {{--{{trans('faq.what_table_during')}}--}}
                            {{--</th>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<th>--}}
                                {{--{{trans('faq.what_table_until_fair')}}--}}
                            {{--</th>--}}
                            {{--<th>--}}
                                {{--{{trans('faq.what_table_fair')}}--}}
                            {{--</th>--}}
                            {{--<th>--}}
                                {{--{{trans('faq.what_table_sem')}}--}}
                            {{--</th>--}}
                            {{--<th>--}}
                                {{--{{trans('faq.what_table_until_sem')}}--}}
                            {{--</th>--}}
                        {{--</tr>--}}

                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--<tr class="what-table-content">--}}
                            {{--<td>--}}
                                {{--<h4 class="what-table-sub-accent">{{trans('faq.what_table_preparation')}}</h4>--}}
                                {{--<ul>--}}
                                    {{--<li>{{trans('faq.what_table_preparation.desc')}}</li>--}}
                                    {{--<li>{{trans('faq.what_table_preparation.desc2')}}</li>--}}
                                    {{--<li>{{trans('faq.what_table_preparation.desc3')}}</li>--}}
                                {{--</ul>--}}
                            {{--</td>--}}

                            {{--<td>--}}
                                {{--<h4 class="what-table-sub-accent">{{trans('faq.what_table_finding')}}</h4>--}}
                                {{--<ul>--}}
                                    {{--<li>{{trans('faq.what_table_finding.desc')}}</li>--}}
                                    {{--<li>{{trans('faq.what_table_finding.desc2')}}</li>--}}
                                    {{--<li>{{trans('faq.what_table_finding.desc3')}}</li>--}}
                                    {{--<b><li>{{trans('faq.what_table_finding.desc4')}}</li></b>--}}
                                {{--</ul>--}}
                            {{--</td>--}}

                            {{--<td>--}}
                                {{--<h4 class="what-table-sub-accent">{{trans('faq.what_table_carrying')}}</h4>--}}
                                {{--<ul>--}}
                                    {{--<b><li>{{trans('faq.what_table_carrying.desc')}}</li></b>--}}
                                    {{--<li>{{trans('faq.what_table_carrying.desc2')}}</li>--}}
                                    {{--<li>{{trans('faq.what_table_carrying.desc3')}}</li>--}}
                                    {{--<li>{{trans('faq.what_table_carrying.desc4')}}</li>--}}
                                    {{--<b><li>{{trans('faq.what_table_carrying.desc5')}}</li></b>--}}
                                {{--</ul>--}}
                            {{--</td>--}}

                            {{--<td>--}}
                                {{--<h4 class="what-table-sub-accent">{{trans('faq.what_table_defining')}}</h4>--}}
                                {{--<ul>--}}
                                    {{--<li>{{trans('faq.what_table_defining.desc')}}</li>--}}
                                    {{--<b><li>{{trans('faq.what_table_defining.desc2')}}</li></b>--}}
                                    {{--<li>{{trans('faq.what_table_defining.desc3')}}</li>--}}
                                {{--</ul>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}
                    {{--</table>--}}


                </div>
                <div id="item2" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.why')}}</h2>
                    <p>
                        {{trans('faq.why.desc')}}
                    </p>
                    <p>
                        {{trans('faq.why.desc2')}}
                    </p>
                </div>
                <div id="item3" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.when')}}</h2>
                    <p>
                        {{trans('faq.when.desc')}}
                    </p>
                    <p>
                        {{trans('faq.when.desc2')}}
                    </p>
                </div>
                <div id="item4" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.with_who')}}</h2>
                    <p>
                        {{trans('faq.with_who.desc')}}
                    </p>
                    <p>
                        {{trans('faq.with_who.desc2')}}
                    </p>
                    <p>
                        {{trans('faq.with_who.desc3')}}
                    </p>
                    <p>
                        {{trans('faq.with_who.desc4')}}
                    </p>
                    <p>
                        {{trans('faq.with_who.desc5')}}
                    </p>
                </div>
                <div id="item5" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.how')}}</h2>
                    <p>
                        {{trans('faq.how.desc')}}
                    </p>
                    <p>
                        {{trans('faq.how.desc2')}}
                    </p>
                    <p>
                        {{trans('faq.how.desc3')}}
                    </p>
                    <p>
                        {{trans('faq.how.desc4')}}
                    </p>
                    <p>
                        {{trans('faq.how.desc5')}}
                    </p>
                </div>
                <div id="item6" class="tab-pane fade">
                    <h2 class="h3 text-uppercase">{{trans('faq.which')}}</h2>
                    <p>
                        {{trans('faq.which.desc')}}
                    </p>
                    <p>
                        {{trans('faq.which.desc2')}}
                    </p>
                    <p>
                        {{trans('faq.which.desc3')}}
                    </p>
                </div>

            </div>

        </div>

    </div>
@endsection