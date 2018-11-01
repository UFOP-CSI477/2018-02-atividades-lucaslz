<?php

namespace App\DataBase;

/**
 * Classe responsavel por fazer a conexao com o banco de dados
 * 
 * @author lucas lima lucaslz@rocketmail.com
 * @since 02/11/2018
 */
class PDOConnection
{
	/**
	 * Buscando a conexao
	 * 
	 * @access pulic
	 */
	public static function getConnection()
	{
		$config = require __DIR__."/../../src/config.php";

		return new \PDO(
			$config['config']['database']['dns'],
			$config['config']['database']['usuario'],
			$config['config']['database']['senha']
		);
	}
}
