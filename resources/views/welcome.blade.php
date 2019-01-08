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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!--
    <link href="{{ url(elixir('css/app.css')) }}" rel="stylesheet">
    <link href="{{ url(asset('/css/styles.css')) }}" rel="stylesheet">
    -->
    <link href="{{ url(asset('/css/uni_style_welcome.css')) }}" rel="stylesheet">

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
<script src="{{ url(asset('/js/vendor.js')) }}"></script>
  <div class="header-container">
    <!-- HEADER -->
    <div class="header-navbar">
      <nav class="navbar navbar-expand-sm right bg-light navbar-light navbar-header">
        <div class="sm-link"><a href="#"><img src="{{ url(asset('/css/youtube.svg')) }}" alt="youtube"></a></div>
        <div class="sm-link"><a href="#"><img src="{{ url(asset('/css/facebook.svg')) }}" alt="facebook"></a></div>
        @if (Auth::guest())
            <div><a href="{{ url('/login/choose') }}"><button class="btn-login">{{trans('nav.login')}}</button></a></div>
        @else
            <div><a href="{{ url('/logout') }}"><button class="btn-login">{{trans('nav.logout')}}</button></a></div>
            <div><a href="{{ url('profile') }}"><button class="btn-login">{{trans('nav.profile')}}</button></a></div>
        @endif
        @if (App::getLocale() == 'en')
            <span class="navbar-text">
                <a href="{{ route('lang.switch', 'et') }}" label="choose language ET">eesti</a>
            </span>
        @elseif(App::getLocale() == 'et')
            <span class="navbar-text">
                <a href="{{ route('lang.switch', 'en') }}" label="choose language EN">english</a>
            </span>
        @endif
        
      </nav> 
    </div>
    
    <!-- MAIN MENU -->
    <div class="menu-positioning">
      <nav class="navbar navbar-expand-lg bg-light navbar-light">
        
        <!-- Logo -->
        <a class="navbar-brand" href="http://elu.dev">
            <img src="{{ url(asset('/css/TLY_ELU.svg')) }}" alt="TLÜ ELU">
        </a>
        
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Links -->
        <div class="collapse navbar-collapse right" id="collapsibleNavbar">
          <ul class="navbar-nav">
            @if (Auth::guest())
                <li {{ setActive('projects') }} class="nav-item">
                    <a class="nav-link" href="{{ url('/projects/open') }}">{{trans('front.search')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://docs.google.com/document/d/1tuLxJ3KL27HcS7JmfdxuZD05djkEaoPHkHBlSinwEZg/edit" target="_blank">{{trans('front.academic_calendar')}}</a>
                </li>
                <li {{ setActive('faq') }} class="nav-item">
                    <a class="nav-link" href="{{ url('/faq') }}">{{trans('front.faq')}}</a>
                </li>
            @else
                <li {{ setActive('projects') }} class="nav-item">
                    <a class="nav-link" href="{{ url('/projects/open') }}">{{trans('front.search')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://docs.google.com/document/d/1h8wX0TjFTFCnZPlXj0gccZUoLk8TGc9iWv_AEZHBkWI/edit" target="_blank">{{trans('front.seminaries')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://docs.google.com/document/d/1tuLxJ3KL27HcS7JmfdxuZD05djkEaoPHkHBlSinwEZg/edit" target="_blank">{{trans('front.academic_calendar')}}</a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="#">ETTEVÕTTELE</a>
                </li>
                -->
                <li {{ setActive('faq') }} class="nav-item">
                    <a class="nav-link" href="{{ url('/faq') }}">{{trans('front.faq')}}</a>
                </li>
            @endif
          </ul>
        </div>
        
      </nav>
    </div>
    
  </div>
  
  <!-- CTA BUTTONS -->
  
  <div class="container">
    <!-- <div class="container-cta"> -->
      <div class="row cta-row">     
        <div class=" col-lg-4">
          <div class="main-cta-block">
            <a href="https://elu2.tlu.ee/projects/open">
              <div class="pad">
                <p class="cta-1">ELU</p>
              </div>
            </a>
          </div>
        </div>
        <div class=" col-lg-4">
          <div class="main-cta-block">
            <a href="https://elu2.tlu.ee/projects/open">
              <div class="pad">
                <img src="../../projects.svg" height="110vw">
                <p class="cta-2">Projektid</p>
              </div>
            </a>
          </div>
        </div>
        <div class=" col-lg-4">
          <div class="main-cta-block">
            <a href="https://elu2.tlu.ee/projects/open">
              <div class="pad">
                <img src="../../idea.svg" height="120vw">
                <p class="cta-2">Esita idee</p>
              </div>
            </a>
          </div>
        </div>
      </div>
      
      <!-- NEWS -->
      <div class="row">     
        <div class=" col-lg-4">
          <div class="news-block">
            <div class="news">
                @if (App::getLocale() == 'et')
                    @if(!empty($news->body_et))
                    {!! $news->body_et !!}
                    @endif
                @elseif(App::getLocale() == 'en')
                    @if(!empty($news->body_en))
                    {!! $news->body_en !!}
                    @endif
                @endif
              <div class="news-link"><a href="#">{{trans('front.news')}}</a></div>
          </div>
        </div>
        </div>
      </div>
    </div>
    
  </body>


                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav menu01">

                    @if (!Auth::guest())
                        @if (Auth::user()->is('oppejoud'))

                            @if (App::getLocale() == 'en')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @elseif(App::getLocale() == 'et')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @endif

                            <li {{ setActive('project/new') }}><a href="{{ url('/project/new') }}"><i class="fa fa-plus"></i> {{trans('front.add')}}</a></li>

                            {{--
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> {{trans('front.add')}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/project/new?lang=et') }}">Eesti keeles</a></li>
                                    <li><a href="{{ url('/project/new?lang=en') }}">In english</a></li>
                                </ul>
                            </li>
                            --}}
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
                                    <li><a href="{{ url('admin/open-projects') }}"><i class="fa fa-btn fa-calendar-times-o"></i>Ava projektid liitumiseks</a></li>
                                    <li><a href="{{ url('admin/close-projects') }}"><i class="fa fa-btn fa-calendar-times-o"></i>Sulge liitumine projektidess</a></li>
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

</html>
