<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Compra extends Model
{
	protected $fillable = ['id', 'user_id', 'produto_id', 'quantidade', 'data'];

	/**
	 * Busca dados do carrinho
	 */
	public static function buscandoDadosCarrinho()
	{
		$idUsuario = Auth::id();
		$query = DB::table('compras')
					->join('users', 'users.id', '=', 'compras.user_id')
					->join('produtos', 'produtos.id', '=', 'compras.produto_id')
					->select('produtos.nome', 'produtos.preco', 'produtos.imagem', 'compras.id as id_compra', 'compras.quantidade')
					->where('compras.data', '=', null)
					->where('users.id', '=', $idUsuario)
					->get();
		return $query->toArray();
	}

	/**
	 * Busca dados dos do histórico
	 */
	public static function historicoCompras()
	{
		$idUsuario = Auth::id();
		$query = DB::table('compras')
					->join('users', 'users.id', '=', 'compras.user_id')
					->join('produtos', 'produtos.id', '=', 'compras.produto_id')
					->select('produtos.nome', 'produtos.preco', 'produtos.imagem', 'compras.id as id_compra', 'compras.quantidade')
					->where('compras.data', '!=', null)
					->where('users.id', '=', $idUsuario)
					->get();
		return $query;
	}
}
