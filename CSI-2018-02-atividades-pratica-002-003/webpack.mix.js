const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

//scripts criados
mix.scripts([
	'node_modules/jquery/dist/jquery.min.js',
	'node_modules/datatables.net/js/jquery.dataTables.min.js',
	'node_modules/datatables.net-dt/js/dataTables.dataTables.min.js',
	'resources/js/petshop/tabelas.js',
	'resources/js/petshop/produtos.js'
], 'public/js/all.js');

//arquivos de estilo
mix.styles([
    'node_modules/datatables.net-dt/css/jquery.dataTables.min.css',
    'resources/open-iconic-master/font/css/open-iconic-bootstrap.min.css'
], 'public/css/all.css');

//Copiando diretorio de imagens do datatables
mix.copyDirectory('node_modules/datatables.net-dt/images', 'public/images');
