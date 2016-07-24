'use strict';

const gulp = require('gulp');
const plumber = require('gulp-plumber');
const fractal = require('./fractal/fractal');

gulp.task('default', ['fractal:watch'], function() {
	gulp.watch('./src/scss/{,*/}*.scss', ['sass']);
	gulp.watch('./src/js/{,*/}*.js', ['javascript']);
	gulp.watch('./src/images/{,*/}*', ['images']);
	gulp.watch('./src/type/{,*/}*', ['fonts']);
});

gulp.task('force', ['sass', 'javascript', 'images', 'fonts', 'fractal:export']);

/*
 * Sass compilation
 */

gulp.task('sass', ['sass-lint'], function() {
	const sass = require('gulp-sass');
	const autoprefixer = require('gulp-autoprefixer');
	gulp.src('./src/scss/*.scss')
	.pipe(plumber())
	.pipe(sass({
		outputStyle: 'compressed'
	}))
	.pipe(autoprefixer({
		browsers: ['last 2 version', 'ie 9', 'ie 10'],
		cascade: true
	}))
	.pipe(gulp.dest('./dst/css'));
});

gulp.task('sass-lint', function() {
	const sassLint = require('gulp-sass-lint');
	// The sass-lint npm module is broken at the moment, so keeping this disabled.
	// https://github.com/sasstools/sass-lint/issues/389
	// return gulp.src('./src/scss/{,*/}*.scss')
	// .pipe(plumber())
	// .pipe(sassLint({
	// 	'config': '.sass-lint.yml'
	// }))
	// .pipe(sassLint.format())
	// .pipe(sassLint.failOnError());
});

/**
 * JavaScript compilation
 */

gulp.task('javascript', ['javascript-lint'], function() {
	const concat = require('gulp-concat');
	const uglify = require('gulp-uglify');
	const merge = require('merge-stream');
	var folders = ['preload', 'vendor', 'scripts'];
	var tasks = folders.map(function(folder) {
		return gulp.src('./src/js/' + folder + '/**/*.js', {
			base: './src/js/' + folder
		})
		.pipe(plumber())
		.pipe(concat(folder + '.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./dst/js'))
	});
	merge(tasks);
});

gulp.task('javascript-lint', function() {
	const jshint = require('gulp-jshint');
	return gulp.src(['./src/js/{,*/}*.js', '!./src/js/vendor/{,*/}*.js'])
	.pipe(jshint())
	.pipe(jshint.reporter('default'));
});

/**
 * Image optimisation
 */

gulp.task('images', function() {
	const newer = require('gulp-newer');
	const imagemin = require('gulp-imagemin');
	gulp.src('./src/images/{,*/}*')
	.pipe(plumber())
	.pipe(newer('./dst/images'))
	.pipe(imagemin(
		{
			optimizationLevel: 5, // png
			progressive: true, // jpg
			interlaced: true, // gif 
			multipass: true // svg
		}
	))
	.pipe(gulp.dest('./dst/images'));
});

/**
 * Typography teleportation
 */

gulp.task('fonts', function() {
	gulp.src('./src/type/{,*/}*')
	.pipe(gulp.dest('./dst/type'));
});

/**
 * Fractal
 */

gulp.task('fractal:watch', function(){
	const logger = fractal.cli.console;
    const server = fractal.web.server({
        sync: true
    });
    server.on('error', err => logger.error(err.message));
    return server.start().then(() => {
        logger.success(`Fractal server is now running at ${server.url}`);
    });
});

gulp.task('fractal:export', function() {
	const logger = fractal.cli.console;
	const builder = fractal.web.builder();
	builder.on('progress', (completed, total) => logger.update(`Exported ${completed} of ${total} items`, 'info'));
	builder.on('error', err => logger.error(err.message));
	return builder.build().then(() => {
		logger.success('Fractal build completed!');
	});
});