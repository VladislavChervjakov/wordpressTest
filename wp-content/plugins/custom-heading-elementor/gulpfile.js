var gulp = require("gulp");

var sass = require('gulp-sass') //sass into css;


gulp.task('sass', function(done){
  gulp.src('./scss/*.scss')
    .pipe(sass()) // Using gulp-sass
    .pipe(gulp.dest('./css'));

    done();
});

gulp.task('default', gulp.series('sass')); //starting tasks by default