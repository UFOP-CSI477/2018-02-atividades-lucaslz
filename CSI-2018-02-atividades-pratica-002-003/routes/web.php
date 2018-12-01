<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$dados['produtos'] = App\Produto::all()->toArray();

	if (is_int(Auth::id()) && Auth::id() > 0) {
		$dados["totalCarrinho"] = count(App\Compra::buscandoDadosCarrinho());
		$dados["type"] = App\User::where("id", Auth::id())->first()->toArray()['type'];
	}

    return view('welcome', $dados);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/produtos', 'HomeController@produto')->name('produtos');

Auth::routes();

Route::post('/produtos/cadastrar', 'HomeController@cadastrarProduto')->name('produtosCadastrar');

Auth::routes();

Route::get('/produtos/editar/{id}', 'HomeController@editarProduto')->name('produtosEditar');

Auth::routes();

Route::post('/produtos/editar/validar', 'HomeController@validarEditarProduto')->name('produtosEditarValidar');

Auth::routes();

Route::get('/produtos/deletar/{id}', 'HomeController@deletarProduto')->name('produtosDeletar');

Auth::routes();

Route::get('/carrinho/{id}', 'CompraController@controleCarrinho')->name('carrinho');

Auth::routes();

Route::get('/carrinho', 'CompraController@carrinho')->name('carrinhoUsuario');

Auth::routes();

Route::post('/carrinho/finalizar', 'CompraController@finalizarCarrinho')->name('finalizarCarrinho');

Auth::routes();

Route::get('/historico', 'CompraController@historico')->name('historicoCompra');