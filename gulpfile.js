var gulp = require('gulp');
var concat = require('gulp-concat');

gulp.task('scripts', function () {
    gulp.src([
            'resources/assets/js/lib/jquery.js',
            'resources/assets/js/lib/bootstrap.js',
            'node_modules/jquery.easing/jquery.easing.js',
            'resources/assets/js/front.js'
        ])
        .pipe(concat('front.js'))
        .pipe(gulp.dest('public/js'));

    gulp.src([
            'resources/assets/js/lib/jquery.js',
            'resources/assets/js/lib/bootstrap.js',
            'node_modules/icheck/icheck.js',
            'node_modules/jquery-autoexpand/jquery.autoexpand.js',
            'node_modules/chart.js/Chart.js',
            'node_modules/jquery.inputmask/dist/jquery.inputmask.bundle.js',
            'resources/assets/js/app.js'
        ])
        .pipe(concat('app.js'))
        .pipe(gulp.dest('public/js'));

    gulp.src([
            'node_modules/html5shiv/dist/html5shiv.js',
            'node_modules/respond/main.js'
        ])
        .pipe(concat('ie.js'))
        .pipe(gulp.dest('public/js'));
});

gulp.task('styles', function () {
    gulp.src([
            'resources/assets/css/bootstrap.css',
            'resources/assets/css/font-awesome.css',
            'resources/assets/css/freelancer.css',
            'resources/assets/css/front.css'
        ])
        .pipe(concat('front.css'))
        .pipe(gulp.dest('public/css'));

    gulp.src([
            'resources/assets/css/bootstrap.css',
            'resources/assets/css/font-awesome.css',
            'node_modules/icheck/skins/square/blue.css',
            'resources/assets/css/app.css'
        ])
        .pipe(concat('app.css'))
        .pipe(gulp.dest('public/css'));

    gulp.src('node_modules/icheck/skins/square/blue*.png').pipe(gulp.dest('public/css'));
});

gulp.task('fonts', function () {
    gulp.src('resources/assets/fonts/*').pipe(gulp.dest('public/fonts'));
});

gulp.task('images', function () {
    gulp.src('resources/assets/img/**/*').pipe(gulp.dest('public/img'));
});

gulp.task('default', ['scripts', 'styles', 'fonts', 'images']);