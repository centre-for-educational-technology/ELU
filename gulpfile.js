var elixir = require('laravel-elixir');
// var gulp = require('gulp');

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

// gulp.task("copyfiles", function() {
//     gulp.src("resources/assets/bg/1.jpg")
//       .pipe(gulp.dest("public/build/bg"));
// });

elixir(function(mix) {
    mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/moment/min/moment.min.js',
        '../bower/bootstrap/dist/js/bootstrap.js',
        '../bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        '../bower/sweetalert/dist/sweetalert.min.js',
        'bootstrap-tagsinput.js',
        'bootbox.min.js'
    ], 'public/js/vendor.js');



    mix.scripts([
        'app.js']
    )

      .version(['js/all.js']);

    mix.less(['app.less'])
      .version('css/app.css');
});
