@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-sm-offset-1 col-sm-10">

            <section>
                <div class="grid">
                    <h1><i class="fa fa-user-secret"></i> Activity Log</h1>

                    {!! $logItems->render() !!}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Aeg</th>
                            <th>Kirjeldus</th>
                            <th>Kasutaja</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($logItems as $logItem)
                            <tr>
                                <td>{{ $logItem->created_at }}</td>
                                <td>
                                    {{ trim($logItem->subject_type, "App\\") }}
                                    @if($logItem->subject)
                                        "{{ $logItem->subject->name }}"
                                    @endif
                                    was
                                    {!! $logItem->description !!}

                                </td>
                                <td>
                                    @if($logItem->causer)
                                        {{ $logItem->causer->email }}

                                    @endif
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    {!! $logItems->render() !!}
                </div>
            </section>

        </div>
    </div>


@endsection
