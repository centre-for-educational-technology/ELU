<!-- JavaScripts -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.min.js"></script>--}}


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87770098-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="{{ url(elixir('js/app.js')) }}"></script>
<div class="container">
    <footer class="main">
        <div class="row">
            <div class="col-sm-6">
                <p>{{trans('front.tallinn_university')}}<br>
                    Narva mnt 25, 10120 Tallinn<br>
                    +372 6409236 / <a href="mailto:elu@tlu.ee">elu@tlu.ee</a> /
                    <i class="fa fa-facebook-official fa-lg"></i> <a href="https://www.facebook.com/elu.tlu/" target="_blank">elu.tlu</a>
                </p>
            </div>
            <div class="col-sm-2" id="eu_fund_logo_container">
                    <img src="{{ url(asset('/css/eu_fund_logo.jpg')) }}" alt="EU Fund" class="img-responsive" id="eu_fund_logo">
            </div>
        </div>

    </footer>
</div>