<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Number') }}</title>
    <link rel="icon" type="imagem/png" href="/imgs/planta-de-trigo.png" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/layout_auth.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../node_modules/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <div id="snackbar">Some text some message..</div>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container ">
        <a class="navbar-brand" href="{{ url('/') }}">
        <img  src="{{ URL::to('/') }}/imgs/planta-de-trigo.png"  style="width:32px;height:32px;" >
            Lumus Coffee
        </a>
        <div class="d-flex flex-row  align-items-center">
        <div class="botoesNav h-100 align-items-center mr-4">
            <a style="margin: 4px;" href="{{ url('/') }}" class="text-sm   text-decoration-none">Home</a>
            <a style="margin: 4px;" href="{{ url('/cafes') }}" class="text-sm   text-decoration-none">Cafés</a>
            <a style="margin: 4px;" href="{{ url('/loginFornecedor') }}" class="text-sm    text-decoration-none">Central Fornecedor</a>
        </div>
        <form class="form-group d-flex flex-row m-0 hBar" method="POST" action="{{route('busca.update','-')}}">
            @csrf
            @method('PUT')
            <div class="input-group shadow-sm d-flex flex-row align-items-center hBar ">
                <input name="busca" id="busca" type="text" class=" hBarform-control whitesmk   border-0 rounded-0" required value="{{old('busca')}}">
                <button type="submit" class=" btnBar btn whitesmk  border-0 rounded-0  d-flex flex-row align-items-center justify-content-center"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <a class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img id="cart" src="{{ URL::to('/') }}/imgs/cart.png"  style="width:32px;height:32px;" >
        </a>
        <div  class="Cart dropdown-menu  dropdown-menu-right">
                <div class="d-flex flex-row w-100 align-items-center justify-content-between">
                    <h5 class="m-0 mr-1 ml-3 mt-2 p-0">Meu Carrinho</h5>
                    <button id="limpar_cart" class="btn text-secondary mt-3 p-0 mr-2">Limpar carrinho</button>
                </div>
                <ul class="Cart_items pl-4 pt-3 list-group list-group-flush overflow-auto" id="cart_items">
                    
                </ul>
        </div>
        <div class="btn-group">
            <a class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img  src="{{ URL::to('/') }}/imgs/user.png"  style="width:32px;height:32px;" >
            </a>
            <div class="User  dropdown-menu  dropdown-menu-right">
                <div class="d-flex flex-column">
                    @if(Auth::guard('fornecedor')->check())
                            <a style="margin: 4px;" href="{{ url('/homeFornecedor') }}" class="text-sm text-gray-700  text-decoration-none">Central Fornecedor</a>
                        @elseif(Auth::check())
                            <a style="margin: 4px;" href="{{ url('/home') }}" class="text-sm text-gray-700  text-decoration-none">cliente</a>
                        @else
                        <h5 class="ml-4 mt-3">É novo aqui?</h5>
                        <h6 class="ml-4 mt-1 mb-3">Inscreva-se ou entre com sua conta</h6>
                        <div class="ml-4">
                            <h6 class="necro-text">Usuario:</h6>
                            <a style="margin: 4px;" href="{{ url('/register') }}" class="text-sm text-gray-700  text-decoration-none">Register</a>
                            <a style="margin: 4px;" href="{{ url('/login') }}" class="text-sm text-gray-700  text-decoration-none">Login</a>
                            <h6 class="necro-text">Fornecedor:</h6>
                            <a style="margin: 4px;" href="{{ url('/registerFornecedor') }}" class="text-sm text-gray-700  text-decoration-none">Register</a>
                            <a style="margin: 4px;" href="{{ url('/loginFornecedor') }}" class="text-sm text-gray-700  text-decoration-none">Login</a>
                        </div>
                        @endif
                        @if(Auth::guard('fornecedor')->check() || Auth::check() )
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                </a>
                        @endif
                </div>
            </div>
        </div>
    </div>
  </nav>
  <div class="Form">
        <div class="divFormulario d-flex  flex-column border">
            <div class="d-flex flex-column h-25 bg-white">
                    <div class="d-flex flex-row h-50 bg-white align-items-end justify-content-center">
                       <h2>LC</h2>
                    </div>

                    @if (Route::getCurrentRoute()->getName()=='login' || Route::currentRouteAction()=='App\Http\Controllers\Auth\LoginController@showFornecedorLoginForm')
                    <div class="d-flex flex-row h-50 bg-white align-items-center justify-content-start ml-4">
                       <h5>Entre com email e senha</h5>
                    </div>
                    @else
                    <div class="d-flex flex-row h-50 bg-white align-items-center justify-content-start ml-4">
                       <h5>Cadastre-se com email e senha</h5>
                    </div>
                    @endif
            </div>
            <div style="background:#f1f2f3;" class="d-flex flex-column h-75 align-items-center justify-content-center">
                      @yield('content')
            </div>

        </div>
      </div>
    </div>
<script src="{{ url('/js/app.js') }}"></script>
</body>
</html>
