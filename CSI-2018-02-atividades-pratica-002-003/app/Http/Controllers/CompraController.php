<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Compra;

class CompraController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Adiciona os itens no carrinho
	 */
    public function controleCarrinho($idProduto)
    {
    	$idUsuario = Auth::id();

    	//Buscando dados do produtos
        if (!is_null($idProduto) && !is_null($idUsuario)) {
            $result = Compra::create([
                "user_id" => $idUsuario,
                "produto_id" => $idProduto,
                "quantidade" => 0
            ]);   
        }

    	return redirect()->route('carrinhoUsuario');
    }

    /**
     * Chama a tela de carrinho
     */
    public function carrinho()
    {
    	$dados['compras'] = Compra::buscandoDadosCarrinho();

    	return view('carrinho', $dados);
    }

    /**
     * Finaliza uma compra no carrinho
     */
    public function finalizarCarrinho(Request $request)
    {
    	$dados = $request->all();
		
		$data = new \DateTime();
		$dataBd = $data->format('Y-m-d H:i:s');
		
		if ($dados['quantidade'] == 0) {
			return redirect()->route('carrinhoUsuario')->with('error', 'Compra não finalizada, quantidade não pode ser " 0 " !');
		}

		$result = Compra::where('id', $dados['id_compra'])
    					->update([
    						'quantidade' => $dados['quantidade'],
    						'data' => $dataBd
    					]);
    	
    	return redirect()->route('carrinhoUsuario')->with('status', 'Compra Finalizada com sucesso !');
    }

    /**
     * Chama o a tela de historico de compras
     */
    public function historico()
    {
        $dados['compras'] = Compra::historicoCompras();
        return view('historico_usuario', $dados);
    }
}
