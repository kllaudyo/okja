<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--Todo(0) Criar css e js no assets com ajuda do elixir ou do gulp--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/wecash.css")}}" />
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-light navbar-toggleable-md navbar-inverse bg-inverse bg-faded">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    {{--Compmleted(3) Se Estivar logado--}}
                    @if(Auth::guest())
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Acessar</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Cadastrar</a></li>
                    </ul>
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#Adicionar" id="navDropActions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Adicionar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navDropActions">
                                {{--Todo(1) Criar as rotas angular--}}
                                <a class="dropdown-item" href="{{action('MovimentoController@create')}}">Movimento</a>
                                <a class="dropdown-item" href="{{action('ContaController@create')}}">Conta</a>
                                <a class="dropdown-item" href="{{action('CategoriaController@create')}}">Categoria</a>
                            </div>
                        </li>
                    </ul>

                    <form class="form-inline mr-auto mt-2 mt-md-0 ml-2">
                        <input class="form-control mr-sm-2 bg-black" type="text" placeholder="Procurar...">
                    </form>

                    <ul class="navbar-nav my-2 my-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link" href="{{action("MovimentoController@index")}}">Movimentação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{action("ContaController@index")}}">Conta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{action("CategoriaController@index")}}">Categoria</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navDropUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->nm_usuario }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navDropUser">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sair</a>
                                {{--Todo(5) Retirar styles inline--}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-hide">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
        <div class="container pt-80">
            @yield('content')
            <hr />
            <p>&copy; 2012 - {{ date('Y') }} <strong>{{ config('app.name') }}</strong>. Todos os direitos reservados.</p>
        </div>
    </div>
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="{{asset("js/wecash.js")}}"></script>
</body>
</html>