'use strict';

const gulp = require('gulp');
const plumber = require('gulp-plumber');
const fractal = require('./fractal/fractal');

gulp.task('default', ['fractal:watch'], () => {
	gulp.watch('./src/scss/{,*/}*.s+(a|c)ss', ['sass']);
	gulp.watch('./src/js/+(vendor|preload)/{,*/}*.js', ['js:vendor']);
	gulp.watch('./src/js/scripts/{,*/}*.js', ['js:custom']);
	gulp.watch('./src/images/{,*/}*', ['images']);
	gulp.watch('./src/type/{,*/}*', ['fonts']);
});

gulp.task('lint', ['sass:lint', 'js:lint'])
gulp.task('production', ['sass', 'js:vendor', 'js:custom', 'images', 'fonts']);
gulp.task('force', ['production', 'fractal:export']);

/*
 * Sass compilation
 */

gulp.task('sass', () => {
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

gulp.task('sass:lint', () => {
	const sassLint = require('gulp-sass-lint');
	return gulp.src('./src/scss/{,*/}*.s+(a|c)ss')
	.pipe(plumber())
	.pipe(sassLint())
	.pipe(sassLint.format())
	.pipe(sassLint.failOnError());
});

/**
 * JavaScript compilation
 */

gulp.task('js:vendor', () => {
	const concat = require('gulp-concat');
	const uglify = require('gulp-uglify');
	const merge = require('merge-stream');
	const folders = ['preload', 'vendor'];
	const tasks = folders.map(folder => {
		return gulp.src(`./src/js/${folder}/{,*/}*.js`, {
			base: `./src/js/${folder}`
		})
		.pipe(plumber())
		.pipe(concat(`${folder}.js`))
		.pipe(uglify())
		.pipe(gulp.dest('./dst/js'))
	});
	merge(tasks);
});

gulp.task('js:custom', () => {
	const babel = require('gulp-babel');
	const sourcemaps = require('gulp-sourcemaps');
	const concat = require('gulp-concat');
	const uglify = require('gulp-uglify');
	const merge = require('merge-stream');
	const folders = ['scripts'];
	const tasks = folders.map(folder => {
		return gulp.src(`./src/js/${folder}/{,*/}*.js`, {
			base: `./src/js/${folder}`
		})
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(babel({
			presets: ['es2015']
		}))
		.pipe(concat(`${folder}.js`))
		.pipe(uglify())
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('./dst/js'))
	});
	merge(tasks);
});

gulp.task('js:lint', () => {
	const jshint = require('gulp-jshint');
	return gulp.src(['./src/js/scripts/{,*/}*.js'])
	.pipe(jshint())
	.pipe(jshint.reporter('default'));
});

/**
 * Image optimisation
 */

gulp.task('images', () => {
	const newer = require('gulp-newer');
	const imagemin = require('gulp-imagemin');
	gulp.src('./src/images/{,*/}*')
	.pipe(plumber())
	.pipe(newer('./dst/images'))
	.pipe(imagemin({
		optimizationLevel: 5, // png
		progressive: true, // jpg
		interlaced: true, // gif 
		multipass: true // svg
	}))
	.pipe(gulp.dest('./dst/images'));
});

/**
 * Typography teleportation
 */

gulp.task('fonts', () => {
	gulp.src('./src/type/{,*/}*')
	.pipe(gulp.dest('./dst/type'));
});

/**
 * Fractal
 */

gulp.task('fractal:watch', () => {
	const logger = fractal.cli.console;
    const server = fractal.web.server({
        sync: true
    });
    server.on('error', err => logger.error(err.message));
    return server.start().then(() => {
        logger.success(`Fractal server is now running at ${server.url}`);
    });
});

gulp.task('fractal:export', () => {
	const logger = fractal.cli.console;
	const builder = fractal.web.builder();
	builder.on('progress', (completed, total) => logger.update(`Exported ${completed} of ${total} items`, 'info'));
	builder.on('error', err => logger.error(err.message));
	return builder.build().then(() => {
		logger.success('Fractal build completed!');
	});
});