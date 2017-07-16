@extends('layouts.app')
@section('content')
<br />
<h4>Movimentações</h4>
<br />
<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link" href="#">Janeiro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Fevereiro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Março</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Abril</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Maio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Junho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">Julho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Agosto</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Setembro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Outubro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Novembro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Dezembro</a>
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