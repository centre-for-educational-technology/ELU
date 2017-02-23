<!-- JavaScripts -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.min.js"></script>--}}

{{--Language parameter used by TinyMCE--}}
<script>
  window.Laravel = <?php echo json_encode([
      'language' => App::getLocale(),
      'base_path' => url('/'),
      'search_user_api_url' => url('api/search/user/'),
      'csrf_token' => csrf_token(),
  ]); ?>
</script>

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
            +372 6409236 / <a href="mailto:elu@tlu.ee">elu@tlu.ee</a> /
            <i class="fa fa-facebook-official fa-lg"></i> <a href="https://www.facebook.com/elu.tlu/" target="_blank">elu.tlu</a>
        </p>

    </footer>
</div>