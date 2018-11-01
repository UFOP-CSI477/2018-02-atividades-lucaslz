<?php

namespace App\Http;

use App\Http\Interfaces\IResponse;

/**
 * Classe responsavel por retornar os dados formatados
 * 
 * @author lucas lima lucaslz@rocketmail.com
 * @since 02/11/2018
 */
final class Response implements IResponse
{
	/**
	 * Retorna os dados em json
	 * 
	 * @access public
	 */
	public static function json($data)
	{
		header("Content-type: application/json; charset=utf-8");
		echo json_encode(
			$data,
			JSON_PRETTY_PRINT|JSON_FORCE_OBJECT|JSON_PARTIAL_OUTPUT_ON_ERROR
		);
	}
}