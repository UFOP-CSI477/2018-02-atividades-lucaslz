<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Produto;
use Validator;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados['produtos'] = Produto::get(); 
        return view('home', $dados);
    }

    public function produto()
    {
        return view('cadastrar_produtos');   
    }

    /**
     * Adiciona um novo produto
     * 
     * @return bool
     */
    public function cadastrarProduto(Request $request)
    {   
        //pegando a imagem
        $file = $request->file('imagem');

        //Definindo nome para a imagem
        $nome = uniqid(date('HisYmd'));
        $extensao = $file->extension();
        $nomeCompleto = $nome . "." .$extensao;
        
        //Salvando imagem
        $upload = $file->storeAs('produtos', $nomeCompleto);
        
        if (!$upload) {
            return redirect('produtos')
                ->with('error', 'Falha ao fazer upload');
        }

        $dados = $request->except('_token');
        $validator = Validator::make($dados, [
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required'],
            'imagem' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('produtos')
                ->withErrors($validator)
                ->withInput();
        }

        //Alterar o nome da imagem para gravar os dados
        $dados['imagem'] = $nomeCompleto;
        $retorno = Produto::create($dados);

        return redirect('produtos')->with('status', 'Produto Cadastrado Com Sucesso!');
    }
}
