// node.js v10.14.2
/*--------------------------------------------------*/
/* 必須
/*--------------------------------------------------*/
var gulp = require("gulp");
//Sassのコンパイル
var sass = require("gulp-sass");
//Watchを中断させない
var plumber = require('gulp-plumber');
//デスクトップにエラー通知
var notify  = require('gulp-notify');
// ソースマップ
var sourcemaps = require("gulp-sourcemaps");
// autoprefixer
const autoprefixer = require('gulp-autoprefixer');


/*--------------------------------------------------*/
/* 必要あれば
/*--------------------------------------------------*/
//jsの圧縮
var uglify = require("gulp-uglify");
//cssの見た目を整える
var csscomb = require('gulp-csscomb');
//ファイルのリネーム
const rename = require('gulp-rename');
//csv→json
const csv2json = require('gulp-csv2json');


/*--------------------------------------------------*/
/* Sass
/*--------------------------------------------------*/
gulp.task("sass", function() {
  console.log('--------- sass task ----------');
  return gulp.src('assets/scss/*.scss')
    .pipe(plumber({
      errorHandler: notify.onError("Error: <%= error.message %>") //<-
    })) //error message
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(sass({
        outputStyle: 'expanded'
    }))
    .pipe(autoprefixer({
        // browsers: ['last 2 version', 'iOS >= 8.1', 'Android >= 4.4'],
        grid: true,
        cascade: false
    }))
    .pipe(sourcemaps.write("maps/"))
    .pipe(gulp.dest("assets/css"));
});


/*--------------------------------------------------*/
/* Watch
/*--------------------------------------------------*/
gulp.task("watch", function() {
    console.log('--------- watch task ----------');
    return gulp.watch("assets/scss/*.scss",gulp.task('sass'));
});


/*--------------------------------------------------*/
/* js
/*--------------------------------------------------*/
gulp.task("js", function() {
    return gulp.src(["assets/js/*.js","!js/min/*.js"])
        .pipe(uglify())
        .pipe(gulp.dest("assets/js/min"));
});

/*--------------------------------------------------*/
/* styles
/*--------------------------------------------------*/
gulp.task("styles", function() {
    return gulp.src(['assets/css/*.css',"!assets/css/reset.css"])
        .pipe(csscomb())
        .pipe(gulp.dest("assets/css/style"));
});

/*--------------------------------------------------*/
/* csv→json
/*--------------------------------------------------*/
gulp.task('convertcsvtojson',function() {
    const csvParseOptions = {}; //based on options specified here : http://csv.adaltas.com/parse/ 
 
    return gulp.src('./json/**/*.csv')
        .pipe(csv2json(csvParseOptions))
        .pipe(rename({extname: '.json'}))
        .pipe(gulp.dest('./json'));

})

/*--------------------------------------------------*/
/* デフォルトで実行
/*--------------------------------------------------*/
gulp.task('default', gulp.series( gulp.parallel('sass', 'watch')));


