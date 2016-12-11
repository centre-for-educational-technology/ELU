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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.css" rel="stylesheet">
    <link href="{{ url(elixir('css/app.css')) }}" rel="stylesheet">
    <link href="{{ url(asset('/css/styles.css')) }}" rel="stylesheet">

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout" class="subpage">


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
                <a class="navbar-brand" href="#"><img src="{{ url(asset('/css/logo.svg')) }}" alt="Tallinna Ülikool"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse pull-right">

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav menu01">
                    <li {{ (Request::is('projects-all') ? 'class=active' : '') }}><a href="{{ url('/projects-all') }}">Otsin</a></li>
                    <li {{ (Request::is('faq') ? 'class=active' : '') }}><a href="{{ url('/faq') }}">KKK</a></li>

                    @if (!Auth::guest())

                        @if (Auth::user()->is('oppejoud'))
                            <li {{ (Request::is('project/new') ? 'class=active' : '') }}><a href="{{ url('/project/new') }}"><i class="fa fa-plus"></i> Lisa</a></li>
                        @endif

                    @endif

                    <li {{ (Request::is('student/project/new') ? 'class=active' : '') }}><a href="{{ url('student/project/new') }}"></i>Mul on idee</a></li>



                    {{--@if (Auth::user())--}}
                    {{--<li><a href="{{ url('/project') }}"><i class="fa fa-plus"></i> Lisa</a></li>--}}
                    {{--@endif--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav menu01 navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <li {{ (Request::is('login') ? 'class=active' : '') }}>
                            <p class="navbar-btn">
                                <a href="{{ url('/login') }}" class="btn btn-default">Sisene</a>
                            </p>
                        </li>
                        {{--<li><a href="{{ url('/register') }}">Lisa Konto</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}

                                @if (Auth::user()->is('oppejoud'))
                                    <span class="badge">õppejõud</span>
                                @endif

                                @if (Auth::user()->is('student'))
                                    <span class="badge">tudeng</span>
                                @endif

                                @if (Auth::user()->is('admin'))
                                    <span class="badge">admin</span>
                                    <span class="caret"></span>
                                @endif

                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->is('admin'))
                                    <li><a href="{{ url('pages') }}"><i class="fa fa-btn fa-file-text"></i>Lehtede Haldus</a></li>
                                    <li><a href="{{ url('admin/edit') }}"><i class="fa fa-btn fa-users"></i>Kasutajate rollid</a></li>
                                    <li><a href="{{ url('admin/all-projects') }}"><i class="fa fa-btn fa-heartbeat"></i>Projektide haldus</a></li>
                                    <li><a href="{{ url('admin/student-projects') }}"><i class="fa fa-btn fa-paper-plane"></i>Projektiideed tudengite poolt</a></li>
                                @endif

                                @if (Auth::user()->is('oppejoud'))
                                    <li><a href="{{ url('teacher/my-projects') }}"><i class="fa fa-btn fa-pencil"></i>Minu Projektid (õppejõud)</a></li>
                                @endif

                                {{--XXX Change to student--}}
                                @if (Auth::user()->is('student'))
                                    <li><a href="{{ url('student/my-projects') }}"><i class="fa fa-btn fa-lightbulb-o"></i>Minu Projektid</a></li>

                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logi Välja</a></li>
                            </ul>
                        </li>
                    @endif

                </ul>

            </div><!--/.navbar-collapse -->
        </div>
    </nav>
</div>











    {{--<nav class="navbar navbar-default">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header">--}}

                {{--<!-- Collapsed Hamburger -->--}}
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                    {{--<span class="sr-only">Toggle Navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}

                {{--<!-- Branding Image -->--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--<i class="fa fa-lightbulb-o"></i> ELU Projektid--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                {{--<!-- Left Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav menu">--}}
                    {{--<li><a href="{{ url('/projects-all') }}">Projektide nimekiri</a></li>--}}
                    {{--<li><a href="{{ url('/faq') }}">KKK</a></li>--}}

                    {{--@if (!Auth::guest())--}}

                        {{--@if (Auth::user()->is('oppejoud'))--}}
                            {{--<li><a href="{{ url('/project/new') }}"><i class="fa fa-plus"></i> Lisa</a></li>--}}
                        {{--@endif--}}
                    {{--@endif--}}


                    {{--@if (Auth::user())--}}
                        {{--<li><a href="{{ url('/project') }}"><i class="fa fa-plus"></i> Lisa</a></li>--}}
                    {{--@endif--}}
                {{--</ul>--}}

                {{--<!-- Right Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<!-- Authentication Links -->--}}
                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="{{ url('/login') }}">Logi Sisse</a></li>--}}
                        {{--<li><a href="{{ url('/register') }}">Lisa Konto</a></li>--}}
                    {{--@else--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                {{--{{ Auth::user()->name }}--}}

                                {{--@if (Auth::user()->is('oppejoud'))--}}
                                    {{--<span class="badge">õppejõud</span>--}}
                                {{--@endif--}}

                                {{--@if (Auth::user()->is('student'))--}}
                                    {{--<span class="badge">tudeng</span>--}}
                                {{--@endif--}}

                                {{--@if (Auth::user()->is('admin'))--}}
                                    {{--<span class="badge">admin</span>--}}
                                    {{--<span class="caret"></span>--}}
                                {{--@endif--}}

                            {{--</a>--}}

                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--@if (Auth::user()->is('admin'))--}}
                                    {{--<li><a href="{{ url('pages') }}"><i class="fa fa-btn fa-file-text"></i>Lehtede Haldus</a></li>--}}
                                    {{--<li><a href="{{ url('admin/edit') }}"><i class="fa fa-btn fa-users"></i>Kasutajate rollid</a></li>--}}
                                    {{--<li><a href="{{ url('admin/all-projects') }}"><i class="fa fa-btn fa-heartbeat"></i>Projektide haldus</a></li>--}}
                                    {{--<li><a href="{{ url('admin/student-projects') }}"><i class="fa fa-btn fa-paper-plane"></i>Projektiideed tudengite poolt</a></li>--}}
                                {{--@endif--}}

                                {{--@if (Auth::user()->is('oppejoud'))--}}
                                    {{--<li><a href="{{ url('teacher/my-projects') }}"><i class="fa fa-btn fa-pencil"></i>Minu Projektid (õppejõud)</a></li>--}}
                                {{--@endif--}}

                                {{--XXX Change to student--}}
                                {{--@if (Auth::user()->is('student'))--}}
                                    {{--<li><a href="{{ url('student/my-projects') }}"><i class="fa fa-btn fa-lightbulb-o"></i>Minu Projektid</a></li>--}}
                                    {{--<li><a href="{{ url('student/project/new') }}"><i class="fa fa-btn fa-space-shuttle"></i>Lisa projektiidee</a></li>--}}

                                    {{--@endif--}}
                                {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logi Välja</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}

    {{--<form id="custom-search-form" class="form-search form-horizontal pull-right" method="get">--}}
        {{--<div class="input-append spancustom">--}}
            {{--<input type="text" class="search-query" name="character" >--}}
            {{--<button type="submit" class="btn"><i class="icon-search"></i></button>--}}
        {{--</div>--}}
    {{--</form>--}}


    @yield('content')

    <!-- JavaScripts -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.min.js"></script>--}}

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
            +372 6409101 / <a href="mailto:tlu@tlu.ee">tlu@tlu.ee</a></p>
    </footer>
</div>
</body>
</html>
