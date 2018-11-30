@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center">
                <a href="{{ route('produtos') }}" class="btn btn-primary btn-lg mb-4">Cadastrar Produto</a>
            </div>
            <div class="card">
                <div class="card-header">Lista de Produtos</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <table class="table" id="produtos">
                                    <caption class="text-center">Tabela de produtos disponíveis</caption>
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Imagem</th>
                                            <th>Comprar</th>
                                            <th>Alterar</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produtos as $element)
                                            <tr>
                                                <td>{{ $element->nome }}</td>
                                                <td><img src="{{ url("app/public/produtos/{$element->image}") }}">
                                                </td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
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