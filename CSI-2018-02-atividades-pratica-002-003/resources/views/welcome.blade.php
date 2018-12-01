<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Petshop</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    </head>
    <body>
        <header id="header">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4682B4;">
                <a class="navbar-brand" href="{{ url('/') }}">Petshop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if (Route::has('login'))
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">    
                        <div class="navbar-nav">
                            @auth
                                @if ($type != 1)
                                    <a class="nav-item nav-link active" href="{{ url('/home') }}">Home</a>
                                @endif
                                    <a class="nav-item nav-link active" href="{{ route('carrinhoUsuario') }}">Carrinho [ {{ $totalCarrinho }} ]</a>

                                    <a class="nav-item nav-link active" href="{{ route('historicoCompra') }}">Histórico de Compras</a>
                                @else
                                    <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                                @if(Route::has('register'))
                                    <a class="nav-item nav-link" href="{{ route('register') }}">Registrar</a>    
                                @endif
                            @endauth
                        </div>
                    </div>
                @endif
            </nav>
        </header>
        <div class="container">
            <div class="row mt-5 text-center justify-content-center">
                @foreach ($produtos as $element)
                    <div class="col-md-3">
                        <div class="card mt-3" style="height: 25rem;">
                            <img class="card-img-top" src="{{ url("storage/produtos/{$element['imagem']}") }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $element['nome'] }}</h5>
                                <p class="card-text text-success"><b>{{ "R$ " . $element['preco'] }}</b></p>
                                <a href="{{ url("carrinho/{$element['id']}") }}" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/all.js') }}" defer></script>
    </body>
</html>