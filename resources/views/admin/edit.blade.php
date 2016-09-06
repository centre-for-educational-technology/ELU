@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')


        <div class="col-sm-offset-2 col-sm-8">
            <h3><i class="fa fa-btn fa-file-text"></i>Lehtede Haldus</h3>
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1info" data-toggle="tab">Esilehe Uudis</a></li>
                        <li><a href="#tab2info" data-toggle="tab">KKK</a></li>
                        <li><a href="#tab3info" data-toggle="tab">Üldinfo</a></li>
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
                    <form action="{{ url('/pages')}}" method="POST" class="form-horizontal new-project">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1info">
                                    <div class="col-sm-12">
                                        <textarea name="news" id="news" class="form-control">{{ (empty($news) ? old('news') : $news) }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2info">
                                    <div class="col-sm-12">
                                        <textarea name="faq" id="faq" class="form-control">{{ (empty($faq) ? old('faq') : $faq) }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3info">
                                    <div class="col-sm-12">
                                        <textarea name="info" id="info" class="form-control">{{ (empty($info) ? old('info') : $info) }}</textarea>
                                    </div>
                                </div>
                                {{--<div class="tab-pane fade" id="tab4info">Info 4</div>--}}
                                {{--<div class="tab-pane fade" id="tab5info">Info 5</div>--}}
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











        <!-- Current Projects -->
        {{--@if (count($projects) > 0)--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">--}}
        {{--Olemasolevad projektid--}}
        {{--</div>--}}

        {{--<div class="panel-body">--}}
        {{--<table class="table table-striped project-table">--}}
        {{--<thead>--}}
        {{--<th>Projekt</th>--}}
        {{--<th>&nbsp;</th>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach ($projects as $project)--}}
        {{--<tr>--}}
        {{--<td class="table-text"><div>{{ $project->name }}</div></td>--}}

        {{--<!-- Project Delete Button -->--}}
        {{--<td>--}}

        {{--<form action="{{ url('project/'.$project->id) }}" method="GET">--}}
        {{--{{ csrf_field() }}--}}
        {{--{{ method_field('PATCH') }}--}}

        {{--<button type="submit" class="btn btn-warning pull-left">--}}
        {{--<i class="fa fa-btn fa-pencil"></i>Muuda--}}
        {{--</button>--}}
        {{--</form>--}}
        {{--<form id="delete-project" action="{{ url('project/'.$project->id) }}" method="POST">--}}
        {{--{{ csrf_field() }}--}}
        {{--{{ method_field('DELETE') }}--}}


        {{--</form>--}}
        {{--<button type="submit" id="delete" class="btn btn-danger pull-right">--}}
        {{--<i class="fa fa-btn fa-trash"></i>Kustuta--}}
        {{--</button>--}}

        {{--</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
        {{--</table>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endif--}}

    </div>
@endsection
