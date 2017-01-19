<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ELU - Tere tulemast</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.css" rel="stylesheet">
    <link href="{{ url(elixir('css/app.css')) }}" rel="stylesheet">
    <link href="{{ url(asset('/css/styles.css')) }}" rel="stylesheet">

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout" class="frontpage">


<div class="jumbotron main">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{ url(asset('/css/logo.svg')) }}" alt="Tallinna Ülikool"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse pull-right">




                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav menu01">

                    <div class="dropdown pull-left">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            {{ Config::get('languages')[App::getLocale()] }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>


                    <li {{ (Request::is('projects-all') ? 'class=active' : '') }}><a href="{{ url('/projects-all') }}">{{trans('front.search')}}</a></li>
                    <li {{ (Request::is('faq') ? 'class=active' : '') }}><a href="{{ url('/faq') }}">{{trans('front.faq')}}</a></li>

                    @if (!Auth::guest())

                        @if (Auth::user()->is('oppejoud'))
                            <li {{ (Request::is('project/new') ? 'class=active' : '') }}><a href="{{ url('/project/new') }}"><i class="fa fa-plus"></i> {{trans('front.add')}}</a></li>
                        @endif

                        @if (Auth::user()->is('student'))
                            <li {{ (Request::is('student/project/new') ? 'class=active' : '') }}><a href="{{ url('student/project/new') }}"></i>{{trans('front.i_have_idea')}}</a></li>
                        @endif

                    @endif


                    {{--@if (Auth::user())--}}
                    {{--<li><a href="{{ url('/project') }}"><i class="fa fa-plus"></i> Lisa</a></li>--}}
                    {{--@endif--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav menu01 navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <li {{ (Request::is('login/choose') ? 'class=active' : '') }}>
                            <p class="navbar-btn">
                                <a href="{{ url('/login/choose') }}" class="btn btn-default">{{trans('login.login')}}</a>
                            </p>
                        </li>
                        {{--<li><a href="{{ url('/register') }}">Lisa Konto</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}

                                @if (Auth::user()->is('oppejoud'))
                                    <span class="badge">{{trans('nav.teacher')}}</span>
                                @endif

                                @if (Auth::user()->is('student'))
                                    <span class="badge">{{trans('nav.student')}}</span>
                                @endif

                                @if (Auth::user()->is('admin'))
                                    <span class="badge">{{trans('nav.admin')}}</span>
                                    <span class="caret"></span>
                                @endif

                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->is('admin'))
                                    <li><a href="{{ url('pages') }}"><i class="fa fa-btn fa-file-text"></i>Lehtede Haldus</a></li>
                                    <li><a href="{{ url('admin/users') }}"><i class="fa fa-btn fa-users"></i>Kasutajate rollid</a></li>
                                    <li><a href="{{ url('admin/all-projects') }}"><i class="fa fa-btn fa-heartbeat"></i>Projektide haldus</a></li>
                                    <li><a href="{{ url('admin/student-projects') }}"><i class="fa fa-btn fa-paper-plane"></i>Projektiideed tudengite poolt</a></li>
                                @endif

                                @if (Auth::user()->is('oppejoud'))
                                    <li><a href="{{ url('teacher/my-projects') }}"><i class="fa fa-btn fa-pencil"></i>{{trans('nav.my_projects_teacher')}}</a></li>
                                @endif

                                {{--XXX Change to student--}}
                                @if (Auth::user()->is('student'))
                                    <li><a href="{{ url('student/my-projects') }}"><i class="fa fa-btn fa-lightbulb-o"></i>{{trans('nav.my_projects_student')}}</a></li>

                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{trans('nav.logout')}}</a></li>
                            </ul>
                        </li>
                    @endif

                </ul>

            </div><!--/.navbar-collapse -->
        </div>
    </nav>


    <div class="container">
        <h1 class="sr-only">Erialasid lõimiv uuendus - ELU</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="block01 block01b">
                    <div class="pad"></div>
                    <a href="{{ url('/faq') }}">
                        <div class="circular">
                            <div>
                                <span class="glyphicon ico-target ico-color01-full"></span>
                                <h4>Mis?</h4>
                            </div>
                            <div>
                                <span class="glyphicon ico-labyrinth ico-color02-full"></span>
                                <h4>Milleks?</h4>
                            </div>
                            <div>
                                <span class="glyphicon ico-calendar ico-color03-full"></span>
                                <h4>Millal?</h4>
                            </div>
                            <div>
                                <span class="glyphicon ico-brainstorm ico-color02-full"></span>
                                <h4>Kellega?</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <h2>{{trans('front.what_is')}} ELU?</h2>

                <p>{{trans('front.what_is.desc')}}</p>

                <p><a class="btn btn-default" href="#about-elu" role="button">{{trans('front.read_more')}} <span class="glyphicon ico-arrow-down" aria-hidden="true"></span></a></p>
            </div>
            <div class="col-md-4">
                <div class="block01">
                    <a href="{{ url('/projects-all') }}">
                        <div class="pad">
                            <span class="glyphicon ico-search"></span>
                            <p><strong>{{trans('front.search')}}</strong> {{trans('front.project_team')}}</p>
                        </div>
                    </a>
                </div>
                <h2>{{trans('front.idea_fair')}}</h2>
                {{--<p>{!! nl2br($info->body) !!}</p>--}}
                <p>{{trans('front.idea_fair.desc')}}</p>
                <p><a class="btn btn-default" href="{{ url('/projects-all') }}" role="button">{{trans('front.all_projects')}} <span class="glyphicon ico-arrow-right" aria-hidden="true"></span></a></p>
            </div>
            <div class="col-md-4">
                <div class="block01 block01c">
                    @if (Auth::guest())
                        <a href="{{ url('/student/project/new') }}">
                            <div class="pad">
                                <span class="glyphicon ico-idea"></span>
                                <p><strong>{{trans('front.i_have_idea')}}</strong> {{trans('front.write_down')}}</p>
                            </div>
                        </a>
                    @else
                        @if (Auth::user()->is('student'))
                            <a href="{{ url('/student/project/new') }}">
                                <div class="pad">
                                    <span class="glyphicon ico-idea"></span>
                                    <p><strong>{{trans('front.i_have_idea')}}</strong> {{trans('front.write_down')}}</p>
                                </div>
                            </a>
                        @elseif(Auth::user()->is('oppejoud'))
                            <a href="{{ url('/project/new') }}">
                                <div class="pad">
                                    <span class="glyphicon ico-idea"></span>
                                    <p><strong>{{trans('front.i_have_idea')}}</strong> {{trans('front.write_down')}}</p>
                                </div>
                            </a>
                        @else
                            <a href="{{ url('/projects-all') }}">
                                <div class="pad">
                                    <span class="glyphicon ico-idea"></span>
                                    <p><strong>{{trans('front.i_have_idea')}}</strong> {{trans('front.write_down')}}</p>
                                </div>
                            </a>
                        @endif
                    @endif

                </div>
                <h2>{{trans('front.news')}}</h2>
                {{--<p>{!! nl2br($news->body) !!}</p>--}}
                <p>{{trans('front.news.desc')}}</p>
            </div>
        </div>
    </div>
</div>



<div class="container" id="about-elu">
    <!-- Example row of columns -->
    <h2 class="h1">{{trans('front.what_is')}} <span class="logo"><span>E</span><span>L</span><span>U</span></span>?</h2>
    <p class="lead">
        {{trans('front.what_is.desc')}}
    </p>
    <div class="row">
        <div class="col-md-4 margt">
            <span class="glyphicon ico-target ico-color01 ico-xl"></span>
            <h3><a href="{{ url('faq#item1') }}">{{trans('front.what')}}</a></h3>
            <p>
                {{trans('front.what.desc')}}
            </p>
        </div>
        <div class="col-md-4 margt">
            <span class="glyphicon ico-labyrinth ico-color02 ico-xl"></span>
            <h3><a href="{{ url('faq#item2') }}">{{trans('front.why')}}</a></h3>
            <p>
                {{trans('front.why.desc')}}
            </p>

        </div>
        <div class="col-md-4 margt">
            <span class="glyphicon ico-calendar ico-color03 ico-xl"></span>
            <h3><a href="{{ url('/faq#item3') }}">{{trans('front.when')}}</a></h3>
            <p>
                {{trans('front.when.desc')}}
            </p>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4 margt">
            <span class="glyphicon ico-brainstorm ico-color03 ico-xl"></span>
            <h3><a href="{{ url('/faq#item4') }}">{{trans('front.with_who')}}</a></h3>
            <p>
                {{trans('front.with_who.desc')}}
            </p>
        </div>
        <div class="col-md-4 margt">
            <span class="glyphicon ico-inspire ico-color01 ico-xl"></span>
            <h3><a href="{{ url('/faq#item5') }}">{{trans('front.how')}}</a></h3>
            <p>
                {{trans('front.how.desc')}}
            </p>

        </div>
        <div class="col-md-4 margt">
            <span class="glyphicon ico-idea ico-color02 ico-xl"></span>
            <h3><a href="{{ url('/faq#item6') }}">{{trans('front.which')}}</a></h3>
            <p>
                {{trans('front.which.desc')}}
            </p>
        </div>
    </div>

</div>




<script src="{{ url(asset('/js/vendor.js')) }}"></script>
<script src="{{ url(asset('js/all.js')) }}"></script>

<script src="{{ url(asset('js/scripts.js')) }}"></script>


<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-87770098-1', 'auto');
    ga('send', 'pageview');

</script>
<div class="container">
    <footer class="main">
        <p>Tallinna Ülikool<br>
            Narva mnt 25, 10120 Tallinn<br>
            +372 6409236 / <a href="mailto:elu@tlu.ee">elu@tlu.ee</a></p>
    </footer>
</div>
</body>
</html>



{{--First edition--}}
{{--extends('layouts.app')--}}

{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--Search form--}}

        {{--<div class="col-md-12 search">--}}

            {{--<div class="col-md-12">--}}
            {{--<form action="{{ url('/project/search') }}" method="GET" class="form-horizontal search-project pull-left">--}}
                {{--{{ csrf_field() }}--}}

                {{--<div class="input-group pull-left col-sm-4">--}}
                    {{--<input type="text" class="form-control" name="search" placeholder="Projekti nimi...">--}}
                  {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span> Otsi!</button>--}}
                  {{--</span>--}}
                {{--</div><!-- /input-group -->--}}

            {{--</form>--}}
            {{--</div>--}}

        {{--</div>--}}

        {{--<div class="col-md-12">--}}
            {{--<div class="bs-callout bs-callout-info" id="callout-navs-tabs-plugin"> <h3>Üldinfo</h3> <p>{!! nl2br($info->body) !!}</p> </div>--}}

        {{--</div>--}}

        {{--<div class="col-md-12">--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-6">--}}


                {{--@if (count($projects) > 0)--}}

                    {{--<div class="panel panel-default">--}}
                        {{--<!-- Default panel contents -->--}}
                        {{--<div class="panel-heading"><h3>Uuemad Projektid</h3></div>--}}
                        {{--<div class="panel-body">--}}
                            {{--<h4>Siin on viimaste projektide nimekiri</h4>--}}
                        {{--</div>--}}

                        {{--<table class="table table-striped">--}}
                            {{--<tbody>--}}
                            {{--@foreach ($projects as $index => $project)--}}
                                {{--<tr>--}}

                                    {{--<td>--}}

                                        {{--<h4 class="list-group-item-heading">{{ $project->name }}</h4>--}}

                                        {{--@if ( $project->status == 0 )--}}
                                            {{--<p class="list-group-item-text">Lõppenud</p>--}}
                                        {{--@elseif ( $project->status == 1 )--}}
                                            {{--<p class="list-group-item-text">Aktiivne</p>--}}
                                        {{--@endif--}}

                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}

                            {{--<tr>--}}
                                {{--<td>--}}
                                    {{--<a href="projects-all" class="btn btn-success pull-right" role="button"><i class="fa fa-btn fa-eye"></i>Näita Rohkem</a>--}}

                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--@else--}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h3 class="panel-title">Projekte ei leidnud</h3>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                            {{--Logi sisse ja lisa projekti!--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--@endif--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="bs-callout bs-callout-info" id="callout-navs-tabs-plugin"> <h3>Viimane Uudis</h3> <p>{!! nl2br($news->body) !!}</p> </div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"><h3>KKK</h3></div>--}}

                    {{--<div class="panel-body">--}}
                        {{--{!! str_limit(nl2br($faq->body), $limit = 500, $end = '... <a href="faq">Loe edasi</a>')  !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}