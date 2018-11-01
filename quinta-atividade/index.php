<?php

//Incluindo o autoload do composer
require "vendor/autoload.php";

//Chamando o arquivo que instancia as rotas
require "src/routes.php";

//Pegando o nome da rota
$route = substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']));

//Chamado a pagina requerida
$routes->runRouter($route);