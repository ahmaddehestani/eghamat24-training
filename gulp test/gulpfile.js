

var gulp = require('gulp');
var uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');

 
gulp.task('script', function () {
  return gulp.src('./script/*js')
  .pipe(uglify())
  .pipe(gulp.dest('./dist'))
});



gulp.task('minify-css', () => {
  return gulp.src('./style/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist'));
});

gulp.task('default',function(){
    console.log('task run ahmad')

})
