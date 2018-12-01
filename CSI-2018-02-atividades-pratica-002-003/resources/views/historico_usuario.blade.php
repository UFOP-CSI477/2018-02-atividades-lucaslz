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
                                        @if (!empty($compras))
                                            @foreach ($compras as $element)
                                                <tr>
                                                    <td>{{ $element->nome }}</td>
                                                    <td>{{ $element->preco }}</td>
                                                    <td><img src="{{ url("storage/produtos/{$element->imagem}") }}" width="40px"></td>
                                                    <td>{{ $element->quantidade }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
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