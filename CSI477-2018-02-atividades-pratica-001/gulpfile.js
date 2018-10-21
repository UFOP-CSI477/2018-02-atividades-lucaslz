var gulp = require('gulp'),
	clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    minify = require('gulp-minify')

    // Limpa a pasta dist
    gulp.task('clean', function() {
        var stream = gulp.src('dist')
            .pipe(clean());
        return stream;
    });

    //Juntando todos os arquivos .js
    gulp.task('build-js', function() {
        gulp.src([
            "node_modules/jquery/dist/jquery.js",
            "node_modules/jquery-mask-plugin/dist/jquery.mask.js",
            "node_modules/bootstrap/dist/js/bootstrap.js",
            "src/js/template/cabecalho.js",
            "src/js/template/competicao.js",
            "src/js/template/competicao-final.js",
            "src/js/template/imc.js",
            "src/js/template/modais.js",
            "src/js/template/base.js",
            "src/js/main.js",
            "src/js/inicializar-app.js"
        ])
            .pipe(concat('all.js'))
            .pipe(gulp.dest('dist')
        );
    });

    //Juntando todos os arquivos .css
    gulp.task('build-css', function() {
        gulp.src([
            "node_modules/bootstrap/dist/css/bootstrap.css",
            "src/css/main.css"
        ])
            .pipe(concat('all.css'))
            .pipe(gulp.dest('dist')
        );
    });

    //Build inicial para rodar todos os outros
    gulp.task('default', ['clean'], function() {
        gulp.start(['build-js', 'build-css']);
    });