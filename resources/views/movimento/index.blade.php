@extends('layouts.app')
@section('content')
<br />
<h4>Movimentações</h4>
<br />
<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link @css_active($data === '012017')" href="{{action('MovimentoController@index','012017')}}">Janeiro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '022017')" href="{{action('MovimentoController@index','022017')}}">Fevereiro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '032017')" href="{{action('MovimentoController@index','032017')}}">Março</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '042017')" href="{{action('MovimentoController@index','042017')}}">Abril</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '052017')" href="{{action('MovimentoController@index','052017')}}">Maio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '062017')" href="{{action('MovimentoController@index','062017')}}">Junho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '072017')" href="{{action('MovimentoController@index','072017')}}">Julho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '082017')" href="{{action('MovimentoController@index','082017')}}">Agosto</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '092017')" href="{{action('MovimentoController@index','092017')}}">Setembro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '102017')" href="{{action('MovimentoController@index','102017')}}">Outubro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '112017')" href="{{action('MovimentoController@index','112017')}}">Novembro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '122017')" href="{{action('MovimentoController@index','122017')}}">Dezembro</a>
    </li>
</ul>
<br />
@if(count($movimentos)==0)
    <p class="alert alert-warning">Não há compromissos lançados</p>
@else
<table class="table table-hover">
    <thead class="thead-default">
    <tr>
        <th>#</th>
        <th>Categoria</th>
        <th>Descrição</th>
        <th>Conta</th>
        <th>Valor</th>
        <th>Previsão</th>
        <th>Confirmação</th>
        <th colspan="2"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($movimentos as $movimento)
    <tr>
        <th scope="row"><input type="checkbox" /></th>
        <td>
            {{ $movimento->ds_categoria }}
        </td>
        <td>{{$movimento->ds_movimento}}</td>
        <td>{{$movimento->ds_conta}}</td>
        <td>{{$movimento->vl_previsto}}</td>
        <td>{{$movimento->dt_previsao}}</td>
        <td>{{$movimento->dt_confirmacao}}</td>
        <td>
            <a href="{{action("MovimentoController@edit", ["id" => $movimento->id_movimento])}}">
                <img src="{{ asset('images/pencil-circle.png') }}" />
            </a>
        </td>
        <td>
            <form class="form-inline" method="post" action="">
                <input type="hidden" name="id" value="{{$movimento->id_movimento}}" />
                <input type="image" src="{{ asset('images/delete-variant.png') }}" />
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
@endsection