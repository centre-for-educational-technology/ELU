var elixir = require('laravel-elixir');
var gulp = require('gulp');
var rename = require("gulp-rename");
require('laravel-elixir-browserify-official');
require('laravel-elixir-vueify');
require('laravel-elixir-vue-2');

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
/*
    gulp.src("resources/assets/bower/pickadate/lib/compressed/themes/default.*")
      .pipe(gulp.dest("public/css"));
*/
    gulp.src("resources/assets/js/scripts.js")
      .pipe(gulp.dest("public/js"));

    gulp.src("resources/assets/js/config-design.js")
      .pipe(gulp.dest("public/js"));

    gulp.src("resources/assets/js/preventdelete.js")
      .pipe(rename('plugin.js'))
      .pipe(gulp.dest("public/js/tinymce/plugins/preventdelete"));


    gulp.src("resources/assets/bower/tinymce/**/*")
      .pipe(gulp.dest("public/js/tinymce"));


    //TinyMCE Estonian localisation
    gulp.src("resources/assets/js/tinymce_lang/langs/**/*")
      .pipe(gulp.dest("public/js/tinymce/langs"));

    //Favicons
    gulp.src("resources/assets/favicons/*")
      .pipe(gulp.dest("public/favicons"));

});

elixir(function(mix) {


    mix.scripts([
        '../bower/jquery/dist/jquery.min.js',
        //'../bower/pickadate/lib/compressed/picker.js',
        //'../bower/pickadate/lib/compressed/picker.date.js',
        '../bower/moment/min/moment.min.js',
        '../bower/bootstrap/dist/js/bootstrap.min.js',
        '../bower/sweetalert/dist/sweetalert.min.js',
        'bootstrap-tagsinput.js',
        'bootbox.min.js',
        'bootstrap-editable.min.js',
        '../bower/select2/dist/js/select2.full.min.js',
        '../bower/tinymce/tinymce.js',
        '../bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        '../bower/Sortable/Sortable.js',
        '../bower/fancybox/dist/jquery.fancybox.js',
        '../bower/dropzone/dist/dropzone.js',
        '../bower/typeahead.js/dist/typeahead.bundle.min.js',
        '../bower/typeahead.js/dist/bloodhound.min.js',
    ], 'public/js/vendor.js');

  //mix.scripts('app.js');


    mix.webpack('app.js')
       .webpack('calc-load.js');


    //mix.less(['app.less']);


    
    //mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap');
    mix.copy('node_modules/bootstrap/assets/fonts/bootstrap/','public/fonts/bootstrap');
    mix.copy('resources/assets/css/uni_style.css','public/css/uni_style.css');
    mix.copy('resources/assets/css/uni_style_welcome.css','public/css/uni_style_welcome.css');
    mix.copy('resources/assets/css/uni_style_common.css','public/css/uni_style_common.css');
    
    
    mix.version(["css/app.css", "js/app.js", "js/calc-load.js", "css/uni_style.css", "css/uni_style_welcome.css", "css/uni_style_common.css"]);

});
