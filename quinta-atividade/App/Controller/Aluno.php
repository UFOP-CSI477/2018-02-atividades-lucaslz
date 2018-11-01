<?php

namespace App\Controller;

use App\Http\Response;
use App\DataBase\Bd;

/**
 * Classe responsavel por fazer o controle de alunos
 * 
 * @since 31/10/2018
 */
class Aluno
{
	/**
	 * Busca todos os alunos contidos no banco de dados
	 * 
	 * @access public
	 */
	public function lstAluno()
	{
		$result = Bd::select("SELECT * FROM academico.alunos");
		return Response::json($result);
	}
}
