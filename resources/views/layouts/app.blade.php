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
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}
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
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1836274236660424',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<script>
  window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
      t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);

    t._e = [];
    t.ready = function(f) {
      t._e.push(f);
    };

    return t;
  }(document, "script", "twitter-wjs"));
</script>


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

                    <li>
                        @if (App::getLocale() == 'en')
                            <a href="{{ route('lang.switch', 'et') }}"><i class="fa fa-globe"></i> {{ Config::get('languages')['et'] }}</a>
                        @elseif(App::getLocale() == 'et')
                            <a href="{{ route('lang.switch', 'en') }}"><i class="fa fa-globe"></i> {{ Config::get('languages')['en'] }}</a>
                        @endif

                    </li>

                    {{--Dropdown menu with more natural switch of languages--}}
                    {{--<li class="dropdown" role="presentation">--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" id="dropdownMenu1" aria-haspopup="true" aria-expanded="false">--}}
                            {{--<i class="fa fa-globe"></i> {{ Config::get('languages')[App::getLocale()] }}--}}
                            {{--<span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">--}}
                            {{--@foreach (Config::get('languages') as $lang => $language)--}}
                                {{--@if ($lang != App::getLocale())--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</li>--}}


                    <li {{ (Request::is('projects-all') ? 'class=active' : '') }}><a href="{{ url('/projects-all') }}">{{trans('front.search')}}</a></li>
                    <li {{ (Request::is('faq') ? 'class=active' : '') }}><a href="{{ url('/faq') }}">{{trans('front.faq')}}</a></li>

                    @if (!Auth::guest())

                        @if (Auth::user()->is('oppejoud'))
                            <li {{ (Request::is('project-new') ? 'class=active' : '') }}><a href="{{ url('/project-new') }}"><i class="fa fa-plus"></i> {{trans('front.add')}}</a></li>
                        @endif

                        @if (Auth::user()->is('student'))
                            <li {{ (Request::is('student/project-new') ? 'class=active' : '') }}><a href="{{ url('student/project-new') }}">{{trans('front.i_have_idea')}}</a></li>
                        @endif

                    @endif

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav menu01 navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <li {{ (Request::is('login/choose') ? 'class=active' : '') }} {{ (Request::is('login') ? 'class=active' : '') }}>
                            <p class="navbar-btn">
                                <a href="{{ url('/login/choose') }}" class="btn btn-default">{{trans('nav.login')}}</a>
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
                                @endif

                                @if (Auth::user()->is('superadmin'))
                                    <span class="badge"><i class="fa fa-user-secret"></i> superadmin</span>
                                @endif

                                <span class="caret"></span>

                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->is('superadmin'))
                                    <li><a href="{{ url('news-edit') }}"><i class="fa fa-btn fa-file-text"></i>Esilehe Teated</a></li>
                                    <li><a href="{{ url('admin/log') }}"><i class="fa fa-btn fa-user-secret"></i>Activity log</a></li>
                                @endif

                                @if (Auth::user()->is('admin'))
                                    {{--<li><a href="{{ url('pages') }}"><i class="fa fa-btn fa-file-text"></i>Lehtede Haldus</a></li>--}}
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
</div>



    @yield('content')

    <!-- JavaScripts -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.min.js"></script>--}}

    <script src="{{ url(asset('/js/vendor.js')) }}"></script>
    <script src="{{ url(elixir('js/all.js')) }}"></script>

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
        <p>{{trans('front.tallinn_university')}}<br>
            Narva mnt 25, 10120 Tallinn<br>
            +372 6409236 / <a href="mailto:elu@tlu.ee">elu@tlu.ee</a></p>
    </footer>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='{{trans('nav.tawk_chat_url')}}';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
