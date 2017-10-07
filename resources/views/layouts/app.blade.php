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
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("css/wecash.css")}}" />
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-light navbar-toggleable-md navbar-inverse bg-inverse bg-faded">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand logo" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
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
                                <img src="{{asset("images/plus.png")}}" />
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navDropActions">
                                {{--Todo(1) Criar as rotas angular--}}
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-movimento">Movimento</a>
                                {{--href="{{action('MovimentoController@create')}}"--}}
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-conta">Conta</a>
                                {{--href="{{action('ContaController@create')}}"--}}
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-categoria">Categoria</a>
                                {{--href="{{action('CategoriaController@create')}}"--}}
                            </div>
                        </li>
                    </ul>

                    <form class="form-inline mr-auto mt-2 mt-md-0 ml-2">
                        <input class="form-control mr-sm-2 bg-black search" type="text" placeholder="Procurar...">
                    </form>

                    <ul class="navbar-nav my-2 my-lg-0 ">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{action("MovimentoController@index")}}">Movimentação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{action("ContaController@index")}}">Conta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{action("CategoriaController@index")}}">Categoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{action("RelatorioController@index")}}">Relatórios</a>
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
            @if(session("msg"))
                <p class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session("msg")}}
                </p>
            @endif
            @yield('content')
            <hr />
            <p>&copy; 2012 - {{ date('Y') }} <strong>{{ config('app.name') }}</strong>. Todos os direitos reservados.</p>
        </div>
    </div>

    <div class="modal fade" id="modal-conta" tabindex="-1" role="dialog">
        <form method="post" action="{{action("ContaController@store")}}">
        {{csrf_field()}}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Conta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
                            <input class="form-control" type="text" placeholder="Bradesco" id="descricao-text-input" name="descricao">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="modal fade" id="modal-categoria" tabindex="-1" role="dialog">
        <form method="post" action="{{action("CategoriaController@store")}}">
            {{csrf_field()}}
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
                            <input class="form-control" type="text" placeholder="Transportes..." id="descricao-text-input" name="descricao" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><strong>Tipo:</strong></label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="radio" name="tipo" id="tipoC" autocomplete="off"  value="C" /> Renda
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="tipo" id="tipoD" autocomplete="off" value="D" /> Despesa
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="modal-movimento" tabindex="-1" role="dialog">
        <form id="form-movimento" method="post" action="{{action("MovimentoController@store")}}">
            {{csrf_field()}}
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Movimento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="conta-text-select" class="col-form-label"><strong>Conta:</strong></label>
                            <select class="form-control" id="conta-text-select" name="conta">
                                @foreach($contas as $conta)
                                    <option value="{{$conta->id_conta}}">{{$conta->ds_conta}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="categoria-text-select" class="col-form-label"><strong>Categoria:</strong></label>
                            <select class="form-control" id="categoria-text-select" name="categoria">
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id_categoria}}">{{$categoria->ds_categoria}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
                            <input class="form-control" type="text" placeholder="Parcela do apartamento" id="descricao-text-input" name="descricao" />
                        </div>

                        <div class="form-group">
                            <label for="previsao-date-input" class="col-form-label"><strong>Datas:</strong></label>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="date" placeholder="previsto para" id="previsao-date-input" name="previsao" />
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="date" placeholder="confirmado em" id="confirmacao-date-input" name="confirmacao" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="valor-number-input" class="col-form-label"><strong>Valor previsto</strong></label>
                            <input class="form-control" type="number" placeholder="R$ 5.000,00" id="valor-number-input" name="valor_previsto" />
                        </div>

                        <div class="form-group">
                            <label for="valor-confirmado-number-input" class="col-form-label"><strong>Valor confirmado</strong></label>
                            <input class="form-control" type="number" placeholder="R$ 5.000,00" id="valor-confirmado-number-input"  name="valor_confirmado" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="{{asset("js/wecash.js")}}"></script>
</body>
</html>