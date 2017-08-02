@extends('layouts.app')

@section('content')
    <div class="container">

        @include('common.errors')


        <div class="col-lg-12 col-lg-offset-0 col-sm-10 col-sm-offset-1">

            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {{\Session::get('message')}}
                </div>
            @endif

            <h3><i class="fa fa-calendar-times-o"></i> Projekti tulemuste esitlemine</h3>


            <div class="row">


                <form action="{{ url('admin/evaluation-dates')}}" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="evaluation_date_1" class="col-sm-3 control-label">Kuupäev 1</label>
                        <div class='col-sm-6'>
                            <div class='input-group date evaluation-dates'>

                                <input type='text' class="form-control" name="evaluation_date_1" id="evaluation_date_1" value="{{ (empty(old('evaluation_date_1')) ?  $date_1 : old('evaluation_date_1')) }}"/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="evaluation_date_2" class="col-sm-3 control-label">Kuupäev 2</label>
                        <div class='col-sm-6'>
                            <div class='input-group date evaluation-dates'>

                                <input type='text' class="form-control" name="evaluation_date_2" id="evaluation_date_2" value="{{ (empty(old('evaluation_date_2')) ?  $date_2 : old('evaluation_date_2')) }}"/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>

                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="evaluation_date_3" class="col-sm-3 control-label">Kuupäev 3</label>
                        <div class='col-sm-6'>
                            <div class='input-group date evaluation-dates'>

                                <input type='text' class="form-control" name="evaluation_date_3" id="evaluation_date_3" value="{{ (empty(old('evaluation_date_3')) ?  $date_3 : old('evaluation_date_3')) }}"/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>

                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-pencil"></i>{{trans('project.save_button')}}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection