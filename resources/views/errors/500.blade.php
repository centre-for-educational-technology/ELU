@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h1>
                    Midagi läks valesti.
                </h1>
                <h1>
                    /
                </h1>
                <h1>
                    Something went wrong.
                </h1>

            </div>
        </div>

    </div>
    @unless(empty($sentryID))
        <!-- Sentry JS SDK 2.1.+ required -->
        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

        <script>
          Raven.showReportDialog({
            eventId: '{{ $sentryID }}',

            // use the public DSN (dont include your secret!)
            dsn: 'https://08df05c7041d4e63891a884138e1088d@sentry.io/188986'
          });
        </script>
    @endunless


@endsection
