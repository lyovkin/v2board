var elixir = require('laravel-elixir');
var gulp = require('gulp');
var concat = require('gulp-concat');

/*
 |----------------------------------------------------------------
 | Have a Drink!
 |----------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic
 | Gulp tasks for your Laravel application. Elixir supports
 | several common CSS, JavaScript and even testing tools!
 |
 */

elixir(function(mix) {
    mix.styles([
        'css/bootstrap.css',
        'css/style.css',
        'css/upload.css',
        'colors/color1.css',
        'plugins/prettyphoto/css/prettyPhoto.css',
        'plugins/owl-carousel/css/owl.carousel.css',
        'plugins/owl-carousel/css/owl.theme.css'
    ], 'public/css/all.css', 'public/');

    mix.scripts([
        'js/handlebars.min.js',
        'js/app.js',

        'js/helper-plugins.js',
        'js/bootstrap.js',
        'js/waypoints.js',
        'js/init.js',
        'upload/js/jquery.knob.js',
        'upload/js/jquery.ui.widget.js',
        'upload/js/jquery.iframe-transport.js',
        'upload/js/jquery.fileupload.js',
        'upload/js/script.js',
        'js/ads.js',
        'js/nottifications.js'
    ], 'public/js/all.js', 'public/');

    mix.scriptsIn('public/zaweb/js/shop', 'public/js/shop.js');
    mix.stylesIn('public/zaweb/css', 'public/css/zaweb.css');

    elixir(function(mix) {
        mix.scripts([
            'bower_components/angular/angular.min.js',
            'bower_components/angular-resource/angular-resource.min.js',

            'bower_components/jquery/dist/jquery.min.js',
            'bower_components/ngcart/dist/ngCart.min.js',
        ], 'public/js/components.js', 'vendor/')
    });

    var bower_path = './vendor/bower_components/';

    gulp.task('mix-flow-js', function() {

        return gulp.src([bower_path + 'flow.js/dist/flow.min.js', bower_path + 'ng-flow/dist/ng-flow.min.js'])
            .pipe(concat('ng-flow-standalone.min.js'))
            .pipe(gulp.dest('public/js/ng-flow/'));

    });


});
