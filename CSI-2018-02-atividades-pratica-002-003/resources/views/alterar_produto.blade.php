@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center">
                <a href="{{ route('produtos') }}" class="btn btn-primary btn-lg mb-4">Cadastrar Produto</a>
            </div>
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
                <div class="card-header">Lista de Produtos</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <img src="{{ url("storage/produtos/{$produto->imagem}") }}" class="img-thumbnail rounded mx-auto d-block mb-5" style="width: 200px;">
                                <form method="post" action="{{ route('produtosEditarValidar') }}" enctype="multipart/form-data">
                                    @if (!in_array($usuario->type, [1,3]))
                                        <div class="form-group row">
                                            <label for="nome" class="col-sm-2 col-form-label">Produto</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nome" name="nome" value="{{ isset($produto->nome) ? $produto->nome : old('nome') }}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="preco" name="preco" value="{{ isset($produto->preco) ? $produto->preco : old('preco') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="imagem" name="imagem">
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-lg" value="Alterar">
                                    <a href="{{ route('home') }}" class="btn btn-warning btn-lg">Voltar</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ isset($produto->id) ? $produto->id : old('id') }}">
                                    <input type="hidden" name="imagemAntiga" value="{{ "storage/produtos/{$produto->imagem}" }}">
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