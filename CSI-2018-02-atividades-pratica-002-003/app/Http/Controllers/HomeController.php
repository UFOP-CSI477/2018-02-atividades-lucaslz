<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Produto;
use App\Compra;
use App\User;
use Validator;
use File;
use Auth;
use Image;

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
        $idUsuario = Auth::id();
        $dados['produtos'] = Produto::get();
        $dados['usuario'] = User::where('id', $idUsuario)->first();

        return view('home', $dados);
    }

    /**
     * chama a classe de cadastro de produto
     * 
     * @return \Illuminate\Http\Response
     */
    public function produto()
    {
        return view('cadastrar_produtos');   
    }

    /**
     * chama a classe de cadastro de produto
     * 
     * @return \Illuminate\Http\Response
     */
    public function editarProduto($id)
    {
        //buscando dados
        $idUsuario = Auth::id();
        $produto = Produto::find($id);
        $dados['usuario'] = User::where('id', $idUsuario)->first();
        $dados['produto'] = $produto;

        //chamado view
        return view('alterar_produto', $dados);   
    }

    /**
     * chama a classe de produto e altera
     * 
     * @return \Illuminate\Http\Response
     */
    public function validarEditarProduto(Request $request)
    {
        $dados = $request->except('_token');
        $id = $dados['id'];
        unset($dados['id']);

        if (isset($dados['imagem'])) {
            if (File::exists($dados['imagemAntiga'])) {
                $resultImagem = File::delete($dados['imagemAntiga']);
                if ($resultImagem == false) {
                    return redirect()->back()->with('error', 'Error ao deletar o produto !');                    
                }
            }
            //pegando a imagem
            $file = $request->file('imagem');

            //Definindo nome para a imagem
            $nome = uniqid(date('HisYmd'));
            $extensao = $file->extension();
            $nomeCompleto = $nome . "." .$extensao;
            
            //Salvando imagem
            $upload = $file->storeAs('produtos', $nomeCompleto);
            
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload');
            }                
            
            $dados['imagem'] = $nomeCompleto;
        }

        $validator = Validator::make($dados, [
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('produtos')
                ->withErrors($validator)
                ->withInput();
        }

        //Retirando dados desnecessarios
        if (isset($dados["imagemAntiga"])) {
            unset($dados['imagemAntiga']);
        }

        //Gravando dados
        $retorno = Produto::where('id', $id)
                          ->update($dados);
        if ($retorno) {
            return redirect()
                ->back()
                ->with('status', 'Produto Alterado Com Sucesso!');    
        }
        
        return redirect()
            ->back()
            ->with('error', 'Erro ao alterar o produto!');
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

        //Modificando imagem
        $imagemSize = Image::make($file->getRealPath());
        $imagemSize->resize(200, 200);
        $upload = $imagemSize->save('storage/produtos/'.$nomeCompleto);
        
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

    /**
     * Adiciona um novo produto
     * 
     * @return bool
     */
    public function deletarProduto($id)
    {
        //Buscando o produto pelo id
        $produto = Produto::find($id);

        //procurando compras com o produto
        $procuraProduto = Compra::where('produto_id', $id)->first();

        //Tratando o produto
        if (!is_null($produto) && is_null($procuraProduto)) {
            //removendo imagem
            $imagemPath = "storage/produtos/".$produto->imagem;
            
            if (File::exists($imagemPath)) {
                $resultImagem = File::delete($imagemPath);
                if ($resultImagem == false) {
                    return redirect('home')->with('error', 'Error ao deletar o produto !');                    
                }
            }
            
            //Deletando o produto
            $return = $produto->delete();       
        }

        //Retornando mensagens de feedback
        if(isset($return) && $return) {
            return redirect('home')->with('status', 'Produto Removido com Sucesso !');
        }

        return redirect('home')->with('error', 'Error ao deletar o produto, verifique se existem compras realizadas !');
    }
}
