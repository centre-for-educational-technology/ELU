@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')

        @if(\Session::has('message'))
            <div class="alert alert-info">
                {{\Session::get('message')}}
            </div>
        @endif

        <div class="col-sm-offset-2 col-sm-8">
            <h3><i class="fa fa-btn fa-file-text"></i>KKK</h3>
            <h4>Esimene paragrahv läheb esilehele</h4>
            <p>Vajutades "Muudan", salvestatakse andmed kõikidel tabidel</p>
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1info" data-toggle="tab">{{trans('faq.what')}}</a></li>
                        <li><a href="#tab2info" data-toggle="tab">{{trans('faq.why')}}</a></li>
                        <li><a href="#tab3info" data-toggle="tab">{{trans('faq.when')}}</a></li>
                        <li><a href="#tab4info" data-toggle="tab">{{trans('faq.with_who')}}</a></li>
                        <li><a href="#tab5info" data-toggle="tab">{{trans('faq.how')}}</a></li>
                        <li><a href="#tab6info" data-toggle="tab">{{trans('faq.which')}}</a></li>
                        {{--<li class="dropdown">--}}
                        {{--<a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--<li><a href="#tab4info" data-toggle="tab">Info 4</a></li>--}}
                        {{--<li><a href="#tab5info" data-toggle="tab">Info 5</a></li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                    </ul>
                </div>
                <div class="panel-body pages-edit">
                    <form action="{{ url('/faq/edit')}}" method="POST" class="form-horizontal new-project">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1info">
                                    <div class="col-sm-12">
                                        <h4>Eesti keeles</h4>
                                        <textarea name="what_et" id="what_et" class="form-control mceSimple">{{ (empty($what) ? old('what_et') : $what->body_et) }}</textarea>
                                        <h4>Inglise keeles</h4>
                                        <textarea name="what_en" id="what_en" class="form-control mceSimple">{{ (empty($what) ? old('what_en') : $what->body_en) }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2info">
                                    <div class="col-sm-12">
                                        <h4>Eesti keeles</h4>
                                        <textarea name="why_et" id="why_et" class="form-control mceSimple">{{ (empty($why) ? old('why_et') : $why->body_et) }}</textarea>
                                        <h4>Inglise keeles</h4>
                                        <textarea name="why_en" id="why_en" class="form-control mceSimple">{{ (empty($why) ? old('why_en') : $why->body_en) }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3info">
                                    <div class="col-sm-12">
                                        <h4>Eesti keeles</h4>
                                        <textarea name="when_et" id="when_et" class="form-control mceSimple">{{ (empty($when) ? old('when_et') : $when->body_et) }}</textarea>
                                        <h4>Inglise keeles</h4>
                                        <textarea name="when_en" id="when_en" class="form-control mceSimple">{{ (empty($when) ? old('when_en') : $when->body_en) }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab4info">
                                    <div class="col-sm-12">
                                        <h4>Eesti keeles</h4>
                                        <textarea name="with_who_et" id="with_who_et" class="form-control mceSimple">{{ (empty($with_who) ? old('with_who_et') : $with_who->body_et) }}</textarea>
                                        <h4>Inglise keeles</h4>
                                        <textarea name="with_who_en" id="with_who_en" class="form-control mceSimple">{{ (empty($with_who) ? old('with_who_en') : $with_who->body_en) }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab5info">
                                    <div class="col-sm-12">
                                        <h4>Eesti keeles</h4>
                                        <textarea name="how_et" id="how_et" class="form-control mceSimple">{{ (empty($how) ? old('how_et') : $how->body_et) }}</textarea>
                                        <h4>Inglise keeles</h4>
                                        <textarea name="how_en" id="how_en" class="form-control mceSimple">{{ (empty($how) ? old('how_en') : $how->body_en) }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab6info">
                                    <div class="col-sm-12">
                                        <h4>Eesti keeles</h4>
                                        <textarea name="which_et" id="which_et" class="form-control mceSimple">{{ (empty($which) ? old('which_et') : $which->body_et) }}</textarea>
                                        <h4>Inglise keeles</h4>
                                        <textarea name="which_en" id="which_en" class="form-control mceSimple">{{ (empty($which) ? old('which_en') : $which->body_en) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Add Project Button -->

                        <div class="form-group">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-default pull-left">
                                    <i class="fa fa-btn fa-pencil"></i>Muudan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
