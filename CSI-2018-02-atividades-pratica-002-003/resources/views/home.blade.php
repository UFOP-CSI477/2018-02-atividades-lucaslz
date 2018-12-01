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
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
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
                                            <th>Alterar</th>
                                            @if (!in_array($usuario->type, [1,3]))
                                                <th>Deletar</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produtos as $element)
                                            <tr>
                                                <td>{{ $element->nome }}</td>
                                                <td><img src="{{ url("storage/produtos/{$element->imagem}") }}" width="50px"></td>
                                                <td>
                                                    <a href="{{ url("produtos/editar/{$element->id}") }}">
                                                        <span class="oi oi-pencil"></span>
                                                    </a>
                                                </td>
                                                @if (!in_array($usuario->type, [1,3]))
                                                    <td>
                                                        <a href="{{ url("produtos/deletar/{$element->id}") }}">
                                                            <span class="oi oi-x"></span>
                                                        </a>
                                                    </td>
                                                @endif
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