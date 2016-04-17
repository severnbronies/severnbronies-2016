/*
	Gulp is a system that automates various tasks, such as linting, 
	compiling and minifying files, and obfuscating javascript.

	FIRST YOU'LL NEED THIS:
	Node.js (http://nodejs.org/)

	Navigate to the project dependency using the Node.js command prompt,
	then run this to install the project dependencies:
	  $ npm install

	If some src files already exist you'll want to compile them all:
	  $ gulp force

	And if you're making further changes run this to watch for changes
	and compile automatically:
	  $ gulp
	
	Sorted.
 */

var gulp = require("gulp");
var sass = require("gulp-sass");
var autoprefixer = require("gulp-autoprefixer");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var newer = require("gulp-newer");
var imagemin = require("gulp-imagemin");
var plumber = require("gulp-plumber");
var sassLint = require('gulp-sass-lint');
var jshint = require('gulp-jshint');
var merge = require('merge-stream');

gulp.task("default", function() {
	gulp.watch("./src/scss/{,*/}*.scss", ["sass"]);
	gulp.watch("./src/js/{,*/}*.js", ["javascript"]);
	gulp.watch("./src/images/{,*/}*", ["images"]);
	gulp.watch("./src/type/{,*/}*", ["fonts"]);
});

gulp.task("force", ["sass", "javascript", "images", "fonts"]);

/*
 * Sass compilation
 */

gulp.task("sass", ["sass-lint"], function() {
	gulp.src("./src/scss/*.scss")
	.pipe(plumber())
	.pipe(sass({
		outputStyle: "compressed"
	}))
	.pipe(autoprefixer({
		browsers: ['last 2 version', 'ie 9', 'ie 10'],
		cascade: true
	}))
	.pipe(gulp.dest("./dst/css"))
});

gulp.task("sass-lint", function() {
	// The sass-lint npm module is broken at the moment, so keeping this disabled.
	// https://github.com/sasstools/sass-lint/issues/389
	// return gulp.src("./src/scss/{,*/}*.scss")
	// .pipe(plumber())
	// .pipe(sassLint({
	// 	"config": ".sass-lint.yml"
	// }))
	// .pipe(sassLint.format())
	// .pipe(sassLint.failOnError())
});

/*
 * JavaScript minification
 */

gulp.task("javascript", ["javascript-lint"], function() {
	var folders = ["preload", "vendor", "scripts"];
	var tasks = folders.map(function(folder) {
		return gulp.src("./src/js/" + folder + "/**/*.js", {
			base: "./src/js/" + folder
		})
		.pipe(plumber())
		.pipe(concat(folder + ".js"))
		.pipe(uglify())
		.pipe(gulp.dest("./dst/js"))
	});
	merge(tasks);
});

gulp.task("javascript-lint", function() {
	return gulp.src(["./src/js/{,*/}*.js", "!./src/js/vendor/{,*/}*.js"])
	.pipe(jshint())
	.pipe(jshint.reporter("default"))
});

/*
 * Image optimisation
 */

gulp.task("images", function() {
	gulp.src("./src/images/{,*/}*")
	.pipe(plumber())
	.pipe(newer("./dst/images"))
	.pipe(imagemin(
		{
			optimizationLevel: 5, // png
			progressive: true, // jpg
			interlaced: true, // gif 
			multipass: true // svg
		}
	))
	.pipe(gulp.dest("./dst/images"))
});

/*
 * Move any font files
 */

gulp.task("fonts", function() {
	gulp.src("./src/type/{,*/}*")
	.pipe(gulp.dest("./dst/type"))
});