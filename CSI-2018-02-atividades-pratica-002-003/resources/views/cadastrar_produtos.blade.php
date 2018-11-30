@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div><br />
          @endif
            <div class="card">
                <div class="card-header">Cadastro de Produtos</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('produtosCadastrar') }}" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="nomeProduto">Nome Produto</label>
                                        <input type="text" class="form-control" name="nome" id="nomeProduto" placeholder="Produto">
                                    </div>
                                    <div class="form-group row">
                                        <label for="precoProduto">Preço</label>
                                        <input type="number" class="form-control" name="preco" id="precoProduto" placeholder="00.00">
                                    </div>
                                    <div class="form-group row">
                                        <label for="imagemProduto">Imagem Produto</label>
                                        <input type="file" class="form-control" name="imagem" id="imagemProduto">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-lg">
                                    <a href="{{ route('home') }}" class="btn btn-warning btn-lg">Voltar</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection