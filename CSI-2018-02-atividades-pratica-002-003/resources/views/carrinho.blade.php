@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Carrinho de Compras</div>
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Preco</th>
                                            <th>Imagem</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($compras as $element)
                                            <tr>
                                                <td>{{ $element->nome }}</td>
                                                <td>{{ $element->preco }}</td>
                                                <td><img src="{{ url("storage/produtos/{$element->imagem}") }}" width="40px"></td>
                                                <td>
                                                    <form method="post" action="{{ route('finalizarCarrinho') }}" class="form-inline"> 
                                                        <div class="form-group">
                                                            <input type="number" name="quantidade" value="{{ $element->quantidade }}" class="form-control">
                                                        </div>
                                                        <input type="submit" value="Finalizar" class="btn btn-md btn-primary ml-3">
                                                        <input type="hidden" name="id_compra" value="{{ $element->id_compra }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection