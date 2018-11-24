<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Claase responsavel por gerenciar as regras de negocio da tabela Compras
 */
class Produtos extends Eloquent
{
	protected $fillable = ['nome', 'preco', 'imagem'];

	const CREATED_AT = 'creation_date';
	const UPDATED_AT = 'last_update';

	/**
	 * Busca todos os produtos cadastrados no sistema
	 * 
	 * @access public
	 * @return object
	 */
	public function lstProdutos()
	{
		$produtos = self::get()->toArray();

		array_walk($produtos, function(&$v, $k){
			$v['imagem'] = "dist/img/produtos/".$v['imagem'];
			$v['alterar'] = "produtos/alterar/".base64_encode($v['id_produtos']);
			$v['deletar'] = "produtos/deletar/".base64_encode($v['id_produtos']);
			$v['comprar'] = "produtos/comprar/".base64_encode($v['id_produtos']);
			return $v;
		});

		return $produtos;
	}
}