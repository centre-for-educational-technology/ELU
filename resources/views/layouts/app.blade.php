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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
    <!--
      <link href="{{ url(elixir('css/app.css')) }}" rel="stylesheet">
      <link href="{{ url(asset('/css/styles.css')) }}" rel="stylesheet">
    -->
    <link href="{{ url(asset('/css/uni_style.css?a')) }}" rel="stylesheet">

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

<div class="header-container">
    <!-- HEADER -->
    <div class="header-navbar">
      <nav class="navbar navbar-expand-sm navbar-right bg-light navbar-light navbar-header">
        <div class="sm-link"><a href="#"><img src="{{ url(asset('/css/youtube.svg')) }}" alt="youtube"></a></div>
        <div class="sm-link"><a href="#"><img src="{{ url(asset('/css/facebook.svg')) }}" alt="facebook"></a></div>
        @if (Auth::guest())
            <div><a href="{{ url('/login/choose') }}"><button class="btn-login">{{trans('nav.login')}}</button></a></div>
        @else
            <div><a href="{{ url('/logout') }}"><button class="btn-login">{{trans('nav.logout')}}</button></a></div>
            <div><a href="{{ url('profile') }}"><button class="btn-login">{{trans('nav.profile')}}</button></a></div>
        @endif
        <!--
        <span class="navbar-text">
          <a href="#" label="choose language EN">english</a>
        </span>
            <a href="{{ route('lang.switch', 'et') }}"><i class="fa fa-globe"></i> {{ Config::get('languages')['et'] }}</a>
            <a href="{{ route('lang.switch', 'en') }}"><i class="fa fa-globe"></i> {{ Config::get('languages')['en'] }}</a>
        -->
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
        <div class="collapse navbar-collapse navbar-right" id="collapsibleNavbar">
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
    
    <!-------- SUBMENU -------->
    <div class="menu-positioning">
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark" >
        
        <!-- Links -->
        <ul class="navbar-nav sub-navbar">
          <li class="nav-item">
            <a class="nav-link sub-nav-link" href="#">esita idee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link sub-nav-link" href="#">Minu projektid</a>
          </li>
          <li class="nav-item">
            <a class="nav-link sub-nav-link" href="#">vormista lõpparuanne</a>
          </li>
        </ul>
        
      </nav>
    </div>
    
  </div>

<div class="life-pink-background">
    <div class="offset-to-show-pink">
        @yield('content')

        @yield('footer-scripts')
        @include('layouts.footer')
    </div>
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
