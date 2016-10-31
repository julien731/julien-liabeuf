var gulp = require('gulp'),
    cleanCSS = require('gulp-clean-css'),
    concatCss = require('gulp-concat-css'),
    concat = require('gulp-concat-util'),
    uglify = require('gulp-uglify');

gulp.task('css', function () {
    return gulp.src([
        'assets/css/bootstrap.min.css',
        'assets/css/flaticon.css',
        'assets/css/nprogress.css',
        'assets/css/mediaelementplayer.css',
        'assets/css/style.css',
        'assets/css/colors/lime.css',
        'assets/css/responsive.css',
        'assets/vendors/prism/prism.css'
    ])
        .pipe(concatCss("dist.css"))
        .pipe(gulp.dest('dist'))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('assets/css/'));
});

gulp.task('js', function () {
    gulp.src([
        'assets/js/bootstrap.min.js',
        'assets/js/mediaelement-and-player.min.js',
        'assets/js/jquery.fitvids.js',
        'assets/js/custom.js',
        'assets/vendors/prism/prism.js'
    ])
        .pipe(concat('dist.js'))
        .pipe(concat.header('// file: <%= file.path %>\n'))
        .pipe(concat.footer('\n// end\n'))
        .pipe(gulp.dest('dist'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/'));
});