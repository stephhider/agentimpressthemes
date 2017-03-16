var gulp = require('gulp');
var watch = require('gulp-watch');
var sass = require('gulp-sass');

// var concat = require('gulp-concat');
var concat = require('gulp-concat-multi');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
 
var theme = '000'

// gulp.task('watch', function() {
//     // Endless stream mode
//     watch(theme + '/assets/scripts/**/*.js', {ignoreInitial: false}).pipe(gulp.dest(theme + '/build'));
// });

// var jsFiles = theme + '/assets/scripts/*.js';
// var jsDest = theme + '/js';

gulp.task('scripts', function() {
    // return gulp.src(jquery_js).pipe(concat('jquery.js')).pipe(gulp.dest(jsDest));
    var jquery_js = [
        'bower/jquery/dist/jquery.js',
        'bower/jquery-ui/jquery-ui.js'
    ];
    var vendor_js = [
        'bower/PACE/pace.min.js',
        'bower/wow/dist/wow.min.js',
        'bower/bootstrap-sass/assets/javascripts/bootstrap.min.js'
    ];
    concat({'vendor.js': vendor_js, 'jquery.js': jquery_js}).pipe(uglify()).pipe(gulp.dest(theme + '/build/js'));
});
//
gulp.task('sass', function() {
    return gulp.src(theme + '/assets/sass/default/template.scss').pipe(sass()).pipe(gulp.dest(theme + '/build/css'))
});
gulp.task('watch', function() {
    gulp.watch(theme + '/assets/sass/**/*.scss', ['sass']);
    // Other watchers go here.
    watch(theme + '/assets/scripts/**/*.js', {ignoreInitial: false}).pipe(gulp.dest(theme + '/build/js'));
});
