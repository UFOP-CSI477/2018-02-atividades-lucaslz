<?php

/**
 * Arquivo para definicao de rotas
 * 
 * @author lucas lima lucaslz@rocketmail.com
 * @access public
 */

$routes = new App\Http\Routes();

$routes->get("aluno", "App\Controller\Aluno", "lstAluno");


//Restornando as rotas para o index.php
return $routes;