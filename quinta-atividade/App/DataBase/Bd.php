<?php

namespace App\DataBase;

use App\DataBase\PDOConnection;

/**
 * Classe responsavel por manipular o banco de dados
 * 
 * @author lucas lima lucaslz@rocketmail.com
 * @since 02/11/2018
 */
class Bd
{
	/**
	 * Busca os dados no banco de dados
	 * 
	 * @access public
	 */	
	public static function select($query)
	{
		$conn = PDOConnection::getConnection();
		$result = $conn->query($query);

		$dados = [];

		while($row = $result->fetch(\PDO::FETCH_ASSOC)){
			array_push($dados, $row);
		}

		return $dados;
	}
}