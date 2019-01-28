<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ELU - Tere tulemast</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('favicons/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('favicons/favicon-16x16.png')}}" sizes="16x16">
    <link rel="manifest" href="{{asset('favicons/manifest.json')}}">
    <link rel="mask-icon" href="{{asset('favicons/safari-pinned-tab.svg')}}" color="#ff4385">
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}">
    <meta name="msapplication-config" content="{{asset('favicons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">

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

<script src="{{ url(asset('/js/vendor.js')) }}"></script>


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


                    <li {{ setActive('projects') }}><a href="{{ url('/projects/open') }}">{{trans('front.search')}}</a></li>
                    <li {{ setActive('faq') }}><a href="{{ url('/faq') }}">{{trans('front.faq')}}</a></li>
                    <li {{ setActive('calendar') }}><a href="https://docs.google.com/document/d/1tuLxJ3KL27HcS7JmfdxuZD05djkEaoPHkHBlSinwEZg/edit" target="_blank">{{trans('front.academic_calendar')}}</a></li>

                    @if (!Auth::guest())

                    <li {{ setActive('seminaries') }}><a href="https://docs.google.com/document/d/1h8wX0TjFTFCnZPlXj0gccZUoLk8TGc9iWv_AEZHBkWI/edit" target="_blank">{{trans('front.seminaries')}}</a></li>

                        @if (Auth::user()->is('oppejoud'))

                            @if (App::getLocale() == 'en')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @elseif(App::getLocale() == 'et')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @endif

                            {{--<li {{ setActive('project/new') }}><a href="{{ url('/project/new') }}"><i class="fa fa-plus"></i> {{trans('front.add')}}</a></li>--}}

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> {{trans('front.add')}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/project/new?lang=et') }}">Eesti keeles</a></li>
                                    <li><a href="{{ url('/project/new?lang=en') }}">In english</a></li>
                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->is('student') && !Auth::user()->is('oppejoud'))

                            <!-- Same as for the teacher, but putting it here, so when there come different materials for teachers and students, it's ready for a change. -->
                            @if (App::getLocale() == 'en')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @elseif(App::getLocale() == 'et')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @endif

                            <li {{ setActive('student/project/new') }}><a href="{{ url('student/project/new') }}">{{trans('front.i_have_idea')}}</a></li>
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

                        <li {{ setActive('login') }}>
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
                                    <span class="badge">{{trans('nav.oppejoud')}}</span>
                                @endif

                                @if (Auth::user()->is('student'))
                                    <span class="badge">{{trans('nav.student')}}</span>
                                @endif

                                @if (Auth::user()->is('admin'))
                                    <span class="badge">{{trans('nav.admin')}}</span>
                                @endif

                                @if (Auth::user()->is('superadmin'))
                                    <span class="badge"><i class="fa fa-user-secret"></i> {{trans('nav.superadmin')}}</span>
                                @endif

                                @if (Auth::user()->is('project_moderator'))
                                    <span class="badge"><i class="fa fa-star-o"></i> {{trans('nav.project_moderator')}}</span>
                                @endif

                                <span class="caret"></span>

                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->is('superadmin'))
                                    <li><a href="{{ url('admin/log') }}"><i class="fa fa-btn fa-user-secret"></i>Activity log</a></li>
                                    <li><a href="{{ url('admin/courses/update') }}"><i class="fa fa-btn fa-refresh"></i>Kursuste uuendamine</a></li>
                                @endif

                                @if (Auth::user()->is('admin'))
                                    <li><a href="{{ url('admin/analytics') }}"><i class="fa fa-btn fa-dashboard"></i>Statistika</a></li>
                                    <li><a href="{{ url('news/edit') }}"><i class="fa fa-btn fa-file-text"></i>Esilehe Teated</a></li>
                                    <li><a href="{{ url('faq/edit') }}"><i class="fa fa-btn fa-file-text"></i>Muuda KKK</a></li>
                                    <li><a href="{{ url('admin/users') }}"><i class="fa fa-btn fa-users"></i>Kasutajate rollid</a></li>
                                    <li><a href="{{ url('admin/all-projects') }}"><i class="fa fa-btn fa-heartbeat"></i>Projektide haldus</a></li>
                                    <li><a href="{{ url('admin/student-projects') }}"><i class="fa fa-btn fa-paper-plane"></i>Projektiideed tudengite poolt</a></li>
                                    <li><a href="{{ url('admin/evaluation-dates') }}"><i class="fa fa-btn fa-calendar-times-o"></i>Vahenädala kuupäevad</a></li>
                                @endif

                                @if (Auth::user()->is('oppejoud'))
                                    <li><a href="{{ url('teacher/my-projects') }}"><i class="fa fa-btn fa-pencil"></i>{{trans('nav.my_projects_teacher')}}</a></li>
                                @endif

                                @if (Auth::user()->is('student'))
                                    {{--<li><a href="{{ url('student/my-projects') }}"><i class="fa fa-btn fa-lightbulb-o"></i>{{trans('nav.my_projects_student')}}</a></li>--}}

                                    @if(Auth::user()->isMemberOfProject()['id'])
                                        <li><a href="{{ url('project/'.Auth::user()->isMemberOfProject()['id']) }}"><i class="fa fa-btn fa-lightbulb-o"></i>{{trans('nav.my_projects_student')}}</a></li>

                                    @else
                                        <li><a href="{{ url('projects/open') }}"><i class="fa fa-btn fa-lightbulb-o"></i>{{trans('nav.my_projects_student')}}</a></li>

                                    @endif

                                @endif
                                <li><a href="{{ url('profile') }}"><i class="fa fa-btn fa-user"></i>{{trans('nav.profile')}}</a></li>
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
                                <h4>{{trans('front.what')}}</h4>
                            </div>
                            <div>
                                <span class="glyphicon ico-labyrinth ico-color02-full"></span>
                                <h4>{{trans('front.why')}}</h4>
                            </div>
                            <div>
                                <span class="glyphicon ico-calendar ico-color03-full"></span>
                                <h4>{{trans('front.when')}}</h4>
                            </div>
                            <div>
                                <span class="glyphicon ico-brainstorm ico-color02-full"></span>
                                <h4>{{trans('front.with_who')}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <h2>{{trans('front.what_is')}} ELU?</h2>

                @if (App::getLocale() == 'et')
                    {!! getFirstParagraph($info->body_et) !!}
                @elseif(App::getLocale() == 'en')
                    {!! getFirstParagraph($info->body_en) !!}
                @endif

                <p><a class="btn btn-default" href="#about-elu" role="button">{{trans('front.read_more')}} <span class="glyphicon ico-arrow-down" aria-hidden="true"></span></a></p>
            </div>
            <div class="col-md-4">
                <div class="block01">
                    <a href="{{ url('/projects/open') }}">
                        <div class="pad">
                            <span class="glyphicon ico-search"></span>
                            <p><strong>{{trans('front.search')}}</strong> {{trans('front.project_team')}}</p>
                        </div>
                    </a>
                </div>
                <h2>{{trans('front.idea_fair_substitute')}}</h2>
                @if (App::getLocale() == 'et')
                    {!! getFirstParagraph($fair_info->body_et) !!}
                @elseif(App::getLocale() == 'en')
                    {!! getFirstParagraph($fair_info->body_en) !!}
                @endif
                {{--<p>{{trans('front.idea_fair.desc')}}</p>--}}
                <p><a class="btn btn-default" href="{{ url('/projects/open') }}" role="button">{{trans('front.all_projects')}} <span class="glyphicon ico-arrow-right" aria-hidden="true"></span></a></p>
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
                        @if (Auth::user()->is('student') && !Auth::user()->is('oppejoud'))
                            <a href="{{ url('/student/project/new') }}">
                                <div class="pad">
                                    <span class="glyphicon ico-idea"></span>
                                    <p><strong>{{trans('front.i_have_idea')}}</strong> {{trans('front.write_down')}}</p>
                                </div>
                            </a>
                        @elseif(Auth::user()->is('oppejoud'))
                            @if (App::getLocale() == 'et')
                                <a href="{{ url('/project/new?lang=et') }}">
                            @elseif (App::getLocale() == 'en')
                                <a href="{{ url('/project/new?lang=en') }}">
                            @endif
                                <div class="pad">
                                    <span class="glyphicon ico-idea"></span>
                                    <p><strong>{{trans('front.i_have_idea')}}</strong> {{trans('front.write_down')}}</p>
                                </div>
                            </a>
                        @else
                            <a href="{{ url('/project/open') }}">
                                <div class="pad">
                                    <span class="glyphicon ico-idea"></span>
                                    <p><strong>{{trans('front.i_have_idea')}}</strong> {{trans('front.write_down')}}</p>
                                </div>
                            </a>
                        @endif
                    @endif

                </div>
                <h2>{{trans('front.news')}}</h2>
                @if (App::getLocale() == 'et')
                    @if(!empty($news->body_et))
                    {!! $news->body_et !!}
                    @endif
                @elseif(App::getLocale() == 'en')
                    @if(!empty($news->body_en))
                    {!! $news->body_en !!}
                    @endif
                @endif
                {{--<p>{{trans('front.news.desc')}}</p>--}}
            </div>
        </div>
    </div>
</div>



<div class="container" id="about-elu">
    <!-- Example row of columns -->
    <h2 class="h1">{{trans('front.what_is')}} <span class="logo"><span>E</span><span>L</span><span>U</span></span>?</h2>
    <p class="lead">
        @if (App::getLocale() == 'et')
            {!! getFirstParagraph($info->body_et) !!}
        @elseif(App::getLocale() == 'en')
            {!! getFirstParagraph($info->body_en) !!}
        @endif
    </p>
    <div class="row">
        <div class="col-md-4 margt">
            <span class="glyphicon ico-target ico-color01 ico-xl"></span>
            <h3><a href="{{ url('faq#item1') }}">{{trans('front.what')}}</a></h3>
            @if (App::getLocale() == 'et')
                {!! getFirstParagraph($what->body_et) !!}
            @elseif(App::getLocale() == 'en')
                {!! getFirstParagraph($what->body_en) !!}
            @endif
        </div>
        <div class="col-md-4 margt">
            <span class="glyphicon ico-labyrinth ico-color02 ico-xl"></span>
            <h3><a href="{{ url('faq#item2') }}">{{trans('front.why')}}</a></h3>
            @if (App::getLocale() == 'et')
                {!! getFirstParagraph($why->body_et) !!}
            @elseif(App::getLocale() == 'en')
                {!! getFirstParagraph($why->body_en) !!}
            @endif

        </div>
        <div class="col-md-4 margt">
            <span class="glyphicon ico-calendar ico-color03 ico-xl"></span>
            <h3><a href="{{ url('/faq#item3') }}">{{trans('front.when')}}</a></h3>
            @if (App::getLocale() == 'et')
                {!! getFirstParagraph($when->body_et) !!}
            @elseif(App::getLocale() == 'en')
                {!! getFirstParagraph($when->body_en) !!}
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-md-4 margt">
            <span class="glyphicon ico-brainstorm ico-color03 ico-xl"></span>
            <h3><a href="{{ url('/faq#item4') }}">{{trans('front.with_who')}}</a></h3>
            @if (App::getLocale() == 'et')
                {!! getFirstParagraph($with_who->body_et) !!}
            @elseif(App::getLocale() == 'en')
                {!! getFirstParagraph($with_who->body_en) !!}
            @endif
        </div>
        <div class="col-md-4 margt">
            <span class="glyphicon ico-inspire ico-color01 ico-xl"></span>
            <h3><a href="{{ url('/faq#item5') }}">{{trans('front.how')}}</a></h3>
            @if (App::getLocale() == 'et')
                {!! getFirstParagraph($how->body_et) !!}
            @elseif(App::getLocale() == 'en')
                {!! getFirstParagraph($how->body_en) !!}
            @endif

        </div>
        <div class="col-md-4 margt">
            <span class="glyphicon ico-idea ico-color02 ico-xl"></span>
            <h3><a href="{{ url('/faq#item6') }}">{{trans('front.which')}}</a></h3>
            @if (App::getLocale() == 'et')
                {!! getFirstParagraph($which->body_et) !!}
            @elseif(App::getLocale() == 'en')
                {!! getFirstParagraph($which->body_en) !!}
            @endif
        </div>
    </div>

</div>

@include('layouts.footer')
</body>
</html>
