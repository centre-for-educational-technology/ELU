@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{trans('faq.faq')}}</h1>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active show" id="item1-tab" role="tab" data-toggle="pill" href="#item1" aria-controls="item1" aria-selected="true">{{trans('faq.what')}}</a>
                    <a class="nav-link" id="item2-tab" role="tab" data-toggle="pill" href="#item2" aria-controls="item2" aria-selected="false">{{trans('faq.why')}}</a>
                    <a class="nav-link" id="item3-tab" role="tab" data-toggle="pill" href="#item3" aria-controls="item3" aria-selected="false">{{trans('faq.when')}}</a>
                    <a class="nav-link" id="item4-tab" role="tab" data-toggle="pill" href="#item4" aria-controls="item4" aria-selected="false">{{trans('faq.with_who')}}</a>
                    <a class="nav-link" id="item5-tab" role="tab" data-toggle="pill" href="#item5" aria-controls="item5" aria-selected="false">{{trans('faq.how')}}</a>
                    <a class="nav-link" id="item6-tab" role="tab" data-toggle="pill" href="#item6" aria-controls="item6" aria-selected="false">{{trans('faq.which')}}</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">

                    <div id="item1" role="tabpanel" aria-labelledby="item1-tab" class="tab-pane show active">
                        <h3>{{trans('faq.what')}}</h3>
                        @if (App::getLocale() == 'et')
                            {!! $what->body_et !!}
                        @elseif(App::getLocale() == 'en')
                            {!! $what->body_en !!}
                        @endif
                    </div>

                    <div id="item2" role="tabpanel" aria-labelledby="item2-tab" class="tab-pane">
                        <h3>{{trans('faq.why')}}</h3>
                        @if (App::getLocale() == 'et')
                            {!! $why->body_et !!}
                        @elseif(App::getLocale() == 'en')
                            {!! $why->body_en !!}
                        @endif
                    </div>

                    <div id="item3" role="tabpanel" aria-labelledby="item3-tab" class="tab-pane">
                        <h3>{{trans('faq.when')}}</h3>
                        @if (App::getLocale() == 'et')
                            {!! $when->body_et !!}
                        @elseif(App::getLocale() == 'en')
                            {!! $when->body_en !!}
                        @endif
                    </div>

                    <div id="item4" role="tabpanel" aria-labelledby="item4-tab" class="tab-pane">
                        <h3>{{trans('faq.with_who')}}</h3>
                        @if (App::getLocale() == 'et')
                            {!! $with_who->body_et !!}
                        @elseif(App::getLocale() == 'en')
                            {!! $with_who->body_en !!}
                        @endif
                    </div>

                    <div id="item5" role="tabpanel" aria-labelledby="item5-tab" class="tab-pane">
                        <h3>{{trans('faq.how')}}</h3>
                        @if (App::getLocale() == 'et')
                            {!! $how->body_et !!}
                        @elseif(App::getLocale() == 'en')
                            {!! $how->body_en !!}
                        @endif
                    </div>

                    <div id="item6" role="tabpanel" aria-labelledby="item6-tab" class="tab-pane">
                        <h3>{{trans('faq.which')}}</h3>
                        @if (App::getLocale() == 'et')
                            {!! $which->body_et !!}
                        @elseif(App::getLocale() == 'en')
                            {!! $which->body_en !!}
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection