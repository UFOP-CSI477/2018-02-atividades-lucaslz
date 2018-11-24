var gulp = require('gulp'),
	imagemin = require('gulp-imagemin'),
	clean = require('gulp-clean'),
	concat = require('gulp-concat'),
	htmlReplace = require('gulp-html-replace');

gulp.task('default', ['clean'],function() {
	gulp.start(['build-css', 'build-js', 'build-scripts-js', 'build-img']);
});

gulp.task('clean', function() {
	var stream = gulp.src('public/dist')
		.pipe(clean());
	return stream;
});

gulp.task('build-css', function() {
	gulp.src([
			'node_modules/bootstrap/dist/css/bootstrap.min.css'
		])
		.pipe(concat('all.css'))
		.pipe(gulp.dest('public/dist/css')
	);
});

gulp.task('build-js', function() {
	gulp.src([
			'node_modules/jquery/dist/jquery.min.js',
			'node_modules/bootstrap/dist/js/bootstrap.min.js',
			'dist/fontawesome-free-5.5.0-web/js/all.min.js'
		])
		.pipe(concat('all.js'))
		.pipe(gulp.dest('public/dist/js')
	);
});

gulp.task('build-scripts-js', function() {
	gulp.src([
			'dist/js/main.js',
			'dist/js/principal.js',
			'dist/js/produtos.js'
			// 'dist/fontawesome-free-5.5.0-web/css/all.min.css'
		])
		.pipe(concat('all-scripts.js'))
		.pipe(gulp.dest('public/dist/js')
	);
});

gulp.task('build-img', function() {
	gulp.src('dist/img/**/*')
		.pipe(imagemin())
		.pipe(gulp.dest('public/dist/img')
	);
});