@extends('layouts.app')

@section('content')
    <div class="container">

        @include('common.errors')


        <div class="col-lg-12 col-lg-offset-0 col-sm-10 col-sm-offset-1">
            <h3><i class="fa fa-refresh"></i> Kursuste uuendamine</h3>
            <div class="row">
                <div class="alert alert-info">

                    <h3>Tabel peab olema .csv komaga eraldatud. Esimene rida on headingud. Nt:</h3>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>kood_tlu</th>
                            <th>kood_htm</th>
                            <th>oppekava_est</th>
                            <th>oppekava_eng</th>
                            <th>tase</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>IFITD.DT</td>
                                <td>100219</td>
                                <td>Infoühiskonna tehnoloogiad</td>
                                <td>Information Society Technologies</td>
                                <td>OPPETASEHM_734</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">



                @if(!empty($results))
                    <div class="alert alert-info">

                        <i class="fa fa-smile-o"></i> Tehtud!
                    </div>

                        <h2>Uued kursused: {{$new_courses_count}}</h2>
                        <h2>Uuendatud kursused: {{$updated_courses_count}}</h2>


                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>kood_tlu</th>
                                <th>kood_htm</th>
                                <th>oppekava_est</th>
                                <th>oppekava_eng</th>
                                <th>tase</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $key => $result)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$result['kood_tlu']}}</td>
                                    <td>{{$result['kood_htm']}}</td>
                                    <td>{{$result['oppekava_est']}}</td>
                                    <td>{{$result['oppekava_eng']}}</td>
                                    <td>{{$result['tase']}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>




                @endif

                <form action="{{ url('admin/courses/update')}}" method="POST" class="form-horizontal new-project" enctype="multipart/form-data">
                {{ csrf_field() }}


                    <div class="form-group">

                        <div class="col-sm-6">

                            <input type="file" name="courses_csv" id="courses_csv" class="form-control" value="{{ old('courses_csv') }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-upload"></i>{{trans('project.add_button')}}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection