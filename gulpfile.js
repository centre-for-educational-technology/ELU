var elixir = require('laravel-elixir');
var gulp = require('gulp');

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

gulp.task("copyfiles", function() {
    gulp.src("resources/assets/fonts/*")
      .pipe(gulp.dest("public/fonts"));


    gulp.src("resources/assets/css/*")
      .pipe(gulp.dest("public/css"));

    gulp.src("resources/assets/js/scripts.js")
      .pipe(gulp.dest("public/js"));

    gulp.src("resources/assets/js/config-design.js")
      .pipe(gulp.dest("public/js"));
});

elixir(function(mix) {


    mix.scripts([
        '../bower/jquery/dist/jquery.min.js',
        '../bower/moment/min/moment.min.js',
        '../bower/bootstrap/dist/js/bootstrap.min.js',
        '../bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        '../bower/sweetalert/dist/sweetalert.min.js',
        'bootstrap-tagsinput.js',
        'bootbox.min.js',
        '../bower/select2/dist/js/select2.full.min.js',
    ], 'public/js/vendor.js');



    mix.scripts(['app.js']);

    mix.less(['app.less']);


    mix.version(["css/app.css", "js/all.js"]);

    // mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/build/fonts/bootstrap');
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap');

});
