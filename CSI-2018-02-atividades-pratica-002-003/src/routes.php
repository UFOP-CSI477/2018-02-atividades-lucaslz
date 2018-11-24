<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Compras;
use App\Models\Produtos;

// Routes

$app->get('/produtos', function (Request $request, Response $response, array $args) {
   
   	// Buscando dados de produtos
    $produtos = (new Produtos())->lstProdutos();
   
    // Render index view
    return $this->view->render($response, 'produtos.html', ['produtos' => $produtos]);
});
