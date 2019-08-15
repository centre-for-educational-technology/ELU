<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(!empty($project->name))
        @if(!empty($projects) && count($projects) > 0)
            <title>ELU - Tere tulemast</title>
        @else
            <title>{{$project->name}}</title>
        @endif
    @else
        <title>ELU - Tere tulemast</title>
    @endif


    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('favicons/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('favicons/favicon-16x16.png')}}" sizes="16x16">
    <link rel="manifest" href="{{asset('favicons/manifest.json')}}">
    <link rel="mask-icon" href="{{asset('favicons/safari-pinned-tab.svg')}}" color="#ff4385">
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}">
    <meta name="msapplication-config" content="{{asset('favicons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
{{--Language parameter used by TinyMCE--}}
<script>
  window.Laravel = <?php echo json_encode([
            'language' => App::getLocale(),
            'user' => Auth::user(),
			'base_path' => url('/'),
			'search_user_api_url' => url('api/search/user/'),
			'add_user_to_group_api_url' => url('api/group/add-user/'),
			'are_you_sure_notification' => trans('project.are_you_sure_notification'),
			'cannot_restore_notification' => trans('project.cannot_restore_notification'),
			'yes_delete' => trans('project.yes_delete'),
			'no' => trans('project.no'),
			'yes' => trans('project.yes'),
			'finish_project_notification' => trans('project.finish_project_notification'),
			'other_institution' => trans('auth.other'),
			'csfr_token' => csrf_token(),
			'remove_file_button' => trans('project.remove_file'),
			'name_or_email_placeholder' => trans('project.name_or_email_placeholder'),
			'three_or_more_char' => trans('project.three_or_more_char'),
			'get_project_sp_load_api_url' => url('api/supervisors-load/get/'),
			'changes_saved' => trans('project.changes_saved'),
			'error' => trans('project.error'),
			'name' => trans('auth.name'),
	]); ?>
</script>
<script>
  window.trans = <?php
	// copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
	$lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
	$trans = [];
	foreach ($lang_files as $f) {
		$filename = pathinfo($f)['filename'];
		$trans[$filename] = trans($filename);
	}
	echo json_encode($trans);
	?>;
</script>
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

<script src="{{ url(asset('/js/vendor.js')) }}"></script>
<script src="{{ url(asset('js/scripts.js')) }}"></script>



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
                    {{-- <li {{ setActive('calendar') }}><a href="https://docs.google.com/document/d/1tuLxJ3KL27HcS7JmfdxuZD05djkEaoPHkHBlSinwEZg/edit" target="_blank">{{trans('front.academic_calendar')}}</a></li> --}}

                    @if (!Auth::guest())

                    {{-- <li {{ setActive('seminaries') }}><a href="https://docs.google.com/document/d/1h8wX0TjFTFCnZPlXj0gccZUoLk8TGc9iWv_AEZHBkWI/edit" target="_blank">{{trans('front.seminaries')}}</a></li> --}}

                        @if (Auth::user()->is('oppejoud'))
                            
                          {{--  @if (App::getLocale() == 'en')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @elseif(App::getLocale() == 'et')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @endif --}}
                                         

                            {{--<li {{ setActive('project/new') }}><a href="{{ url('/project/new') }}"></a></li>--}}

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
                            {{-- @if (App::getLocale() == 'en')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @elseif(App::getLocale() == 'et')
                                <li><a href="https://drive.google.com/drive/folders/0BxOqwuSVpflsMlBfR2FiZm93ZE0" target="_blank">{{trans('front.materials')}}</a></li>
                            @endif --}}
                            
                            
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
                                @endif

                                @if (Auth::user()->is('oppejoud'))
                                    <li><a href="{{ url('teacher/my-projects') }}"><i class="fa fa-btn fa-pencil"></i>{{trans('nav.my_projects_teacher')}}</a></li>
                                @endif

                                {{--XXX Change to student--}}
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
</div>

@if (!Auth::guest())
    @if((Auth::user()->is('student')))
        @if(isTLUUser(Auth::user()))
            @if(empty(Auth::user()->contact_email))
                <div class="container">
                    <div class="row">
                        <div class="alert alert-danger">
                            {{trans('user.add_contact_email_notification')}} <a href="{{url('profile#contact-email-form')}}"><i class="fa fa-user"></i></a>
                        </div>
                    </div>
                </div>
            @endif

        @endif

    @endif
@endif

@yield('content')

@yield('footer-scripts')
@include('layouts.footer')

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
