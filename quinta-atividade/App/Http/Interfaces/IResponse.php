<?php

namespace App\Http\Interfaces;

/**
 * Assinatura da classe Response
 * 
 * @author lucas lima lucaslz@rocketmail.com
 * @since 02/11/2018
 */
interface IResponse
{
	/**
	 * Retorna os dados em json
	 */
	public static function json($data);
}
