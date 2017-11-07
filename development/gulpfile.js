// Load plugins
var gulp = require('gulp');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var cleancss = require('gulp-clean-css');
var autoprefixer = require('autoprefixer');
var rename = require('gulp-rename');
var runSequence = require('run-sequence');

// SCSS => CSS
gulp.task("scss", function() {
    return gulp.src("./scss/**/*.scss")
        .pipe(sass().on("error", sass.logError))
        .pipe(gulp.dest("../"))
});

// Autoprefix
gulp.task('autoprefix', function() {
    return gulp.src('../style.css')
        .pipe(postcss([autoprefixer({ browsers: ['> 1%'], cascade: false })]))
        .pipe(gulp.dest('../'));
});

// Minify CSS
gulp.task("minify", function() {
    return gulp.src("../css/style.css")
        .pipe(cleancss({ compatibility: "*" }))
        .pipe(rename("style.min.css"))
        .pipe(gulp.dest("../css/"))
});

// Watch
gulp.task("watch", function() {
    gulp.watch("./scss/**/*.scss", function() {
        return runSequence('scss', 'autoprefix');
    });
});

// Default
gulp.task("default", function() {
    return runSequence('scss', 'autoprefix');
});