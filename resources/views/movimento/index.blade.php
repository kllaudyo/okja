@extends('layouts.app')
@section('content')
<br />
<h4>Movimentações</h4>
<br />
<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','012017')}}">Janeiro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','022017')}}">Fevereiro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','032017')}}">Março</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','042017')}}">Abril</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','052017')}}">Maio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','062017')}}">Junho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{action('MovimentoController@index','072017')}}">Julho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','082017')}}">Agosto</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','092017')}}">Setembro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','102017')}}">Outubro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','112017')}}">Novembro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{action('MovimentoController@index','122017')}}">Dezembro</a>
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
        <th>Valor</th>
        <th>Previsão</th>
        <th>Confirmação</th>
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
        <td>{{$movimento->vl_previsto}}</td>
        <td>{{$movimento->dt_previsao}}</td>
        <td>{{$movimento->dt_confirmacao}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
@endsection