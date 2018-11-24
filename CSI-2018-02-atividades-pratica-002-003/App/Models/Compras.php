<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Claase responsavel por gerenciar as regras de negocio da tabela Compras
 */
class Compras extends Eloquent
{
	protected $fillable = ['quantidade', 'data'];

	const CREATED_AT = 'creation_date';
	const UPDATED_AT = 'last_update';
}