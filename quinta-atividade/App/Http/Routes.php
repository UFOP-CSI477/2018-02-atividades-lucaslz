<?php

namespace App\Http;

/**
 * classe responsavel por gerenciar as rotas
 * 
 * @author lucas lima lucaslz@rocketmail.com
 * @since 31/10/2018
 */
class Routes
{
	/**
	 * @var cotem todas as rotas
	 */
	protected $arrayRoutes = [];

	/**
	 * Metodo responsavel por carregar as rotas
	 * 
	 * @param string $nome
	 * @param string $namespace
	 * 
	 * @access public
	 */
	public function get($name, $namespace = null, $method = null)
	{
		array_push($this->arrayRoutes, [
			"name" => $name,
			"method" => $method, 
			"namespace" => $namespace,
			"http" => "get"
		]);
	}

	/**
	 * Busca uma pagina cadastrada no metodo get
	 * 
	 * @param string $page
	 * 
	 * @access public
	 */
	public function runRouter($page)
	{
		foreach ($this->arrayRoutes as $value) {
			if ($page == $value['name']) {
				$rf = new \ReflectionClass($value['namespace']);
				$instance = $rf->newInstance();
				$method = $value['method'];
				$instance->$method();	
			} else {
				echo "Não encontrou"; die();
			}
		}
	}

	/**
	 * Retorna as rotas
	 * 
	 * @access public
	 * @return object $route
	 */
	public function getArrayRoutes()
	{
		return $this->arrayRoutes;
	}
}