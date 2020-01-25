@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <div class="col-sm-offset-1 col-sm-10">


                    <h3><i class="fa fa-btn fa-users"></i>Kasutajad</h3>


                    <div class="table-responsive">
                        <table class="table table-responsive table-striped">
                            <thead>
                              <th>Nimi</th>
                              <th>E-post</th>
                              <th>Roll</th>
                              <th>Eriala</th>
                            </thead>

                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="table-text"><div>{{ getUserName($user) }}</div></td>

                                    <td class="table-text"><div>{{ getUserEmail($user) }}</div></td>

                                    @if ($user->roles != null)

                                        <td class="table-text">
                                            <ul class="list-unstyled list01 tags">
                                                @foreach ($user->roles as $role)

                                                    <li><span class="label label-info">{{ trans('nav.'.$role->name) }}</span></li>
                                                @endforeach
                                            </ul>

                                        </td>
                                    @endif
                                    
                                    <td class="table-text">
                                        @if($user->courses()->first())
                                            <div class="label label-primary">{{$user->courses()->first()->oppekava_est}}</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->render() !!}

                </div>


        </div>
    </div>
@endsection
