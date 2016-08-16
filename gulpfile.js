var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/moment/min/moment.min.js',
        '../bower/bootstrap/dist/js/bootstrap.js',
        '../bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        'bootstrap-tagsinput.js'
    ], 'public/js/vendor.js');

    mix.scripts([
        'app.js']
    )

      .version(['js/all.js']);

    mix.less(['app.less'])
      .version('css/app.css');
});
