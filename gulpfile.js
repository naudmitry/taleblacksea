var gulp = require('gulp');

var paths = {
    bower: './bower_components/',
    resource: './resources/assets/',
    public: './public'
};

gulp.task('bootstrap', function () {
    gulp.src(paths.bower + 'bootstrap/dist/css/bootstrap.min.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.bower + 'bootstrap/dist/js/bootstrap.min.js')
        .pipe(gulp.dest(paths.public + '/js'));

    return true;
});

gulp.task('bootstrap-select', function () {
    gulp.src(paths.bower + 'bootstrap-select/dist/js/bootstrap-select.min.js')
        .pipe(gulp.dest(paths.public + '/js'));

    gulp.src(paths.bower + 'bootstrap-select/dist/css/bootstrap-select.min.css')
        .pipe(gulp.dest(paths.public + '/css'));

    return true;
});

gulp.task('jquery', function () {
    gulp.src(paths.bower + 'jquery/dist/jquery.js')
        .pipe(gulp.dest(paths.public + '/js'));

    gulp.src(paths.bower + 'jquery/dist/jquery.min.js')
        .pipe(gulp.dest(paths.public + '/js'));

    gulp.src(paths.bower + 'jquery-ui/jquery-ui.js')
        .pipe(gulp.dest(paths.public + '/js'));

    gulp.src(paths.bower + 'jquery-ui/themes/smoothness/jquery-ui.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.bower + 'jquery-ui/themes/smoothness/images/*.*')
        .pipe(gulp.dest(paths.public + '/css/images'));

    return true;
});

gulp.task('fancybox', function () {
    gulp.src(paths.bower + 'fancybox/dist/jquery.fancybox.min.js')
        .pipe(gulp.dest(paths.public + '/js'));

    gulp.src(paths.bower + 'fancybox/dist/jquery.fancybox.min.css')
        .pipe(gulp.dest(paths.public + '/css'));

    return true;
});

gulp.task('slick', function () {
    gulp.src(paths.bower + 'slick-carousel/slick/slick.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.bower + 'slick-carousel/slick/slick-theme.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.bower + 'slick-carousel/slick/slick.min.js')
        .pipe(gulp.dest(paths.public + '/js'));

    gulp.src(paths.bower + 'slick-carousel/slick/fonts/slick.woff')
        .pipe(gulp.dest(paths.public + '/css/fonts'));

    gulp.src(paths.bower + 'slick-carousel/slick/fonts/slick.ttf')
        .pipe(gulp.dest(paths.public + '/css/fonts'));

    gulp.src(paths.bower + 'slick-carousel/slick/ajax-loader.gif')
        .pipe(gulp.dest(paths.public + '/css'));

    return true;
});

gulp.task('animate', function () {
    gulp.src(paths.bower + 'animate.css/animate.min.css')
        .pipe(gulp.dest(paths.public + '/css'));

    return true;
});

gulp.task('wow', function () {
    gulp.src(paths.bower + 'wow/dist/wow.js')
        .pipe(gulp.dest(paths.public + '/js'));

    return true;
});

gulp.task('font-awesome', function () {
    gulp.src(paths.bower + 'components-font-awesome/css/fontawesome.min.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.bower + 'components-font-awesome/css/fa-brands.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.bower + 'components-font-awesome/css/fa-regular.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.bower + 'components-font-awesome/css/fa-solid.css')
        .pipe(gulp.dest(paths.public + '/css'));

    return true;
});

gulp.task('validate', function () {
    gulp.src(paths.bower + 'jquery-validation/dist/jquery.validate.js')
        .pipe(gulp.dest(paths.public + '/js'));

    return true;
});

gulp.task('time-select', function () {
    gulp.src(paths.bower + 'jQuery.ptTimeSelect/src/jquery.ptTimeSelect.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.bower + 'jQuery.ptTimeSelect/src/jquery.ptTimeSelect.js')
        .pipe(gulp.dest(paths.public + '/js'));

    return true;
});

gulp.task('custom', function () {
    gulp.src(paths.resource + 'css/style.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.resource + 'css/main.css')
        .pipe(gulp.dest(paths.public + '/css'));

    gulp.src(paths.resource + 'js/script.js')
        .pipe(gulp.dest(paths.public + '/js'));

    gulp.src(paths.resource + 'js/main.js')
        .pipe(gulp.dest(paths.public + '/js'));

    return true;
});

gulp.task('default', [
    'bootstrap',
    'bootstrap-select',
    'jquery',
    'slick',
    'custom',
    'font-awesome',
    'animate',
    'fancybox',
    'validate',
    'wow',
    'time-select'
]);