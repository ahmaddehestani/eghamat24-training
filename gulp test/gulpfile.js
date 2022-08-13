

const gulp = require('gulp');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const sass = require('gulp-sass')(require('sass'));

 
gulp.task('script', function () {
  return gulp.src('./script/*js')
  .pipe(uglify())
  .pipe(gulp.dest('./dist'))
});
gulp.task('sass',function buildStyles() {
  return gulp.src('./style/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});



gulp.task('minify-css', () => {
  return gulp.src('./style/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist'));
});

gulp.task('default',function(){
    console.log('task run ahmad')

})
