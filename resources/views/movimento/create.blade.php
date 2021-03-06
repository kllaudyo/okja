@extends('layouts.app')
@section('content')
<br />
<h4>Movimento</h4>
<hr />
@if(count($errors) > 0)
    <div class="alert alert-danger fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">Putz...</h4>
        @foreach($errors->all() as $erro)
            <p class="mb-0">{{$erro}}</p>
        @endforeach
    </div>
@endif
<form id="form-movimento" method="post" action="{{ (isset($movimento)) ? action('MovimentoController@update', ['id'=>$movimento->id_movimento]) : action("MovimentoController@store") }}">
{{csrf_field()}}
@if(isset($movimento))
    <input type="hidden" name="_method" value="PUT" />
@endif
<div class="form-group">
    <label for="conta-text-select" class="col-form-label"><strong>Conta:</strong></label>
    <select class="form-control" id="conta-text-select" name="conta">
        @foreach($contas as $conta)
            <option value="{{$conta->id_conta}}" @html_selected(isset($movimento) && $movimento->id_conta === $conta->id_conta) >{{$conta->ds_conta}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="categoria-text-select" class="col-form-label"><strong>Categoria:</strong></label>
    <select class="form-control" id="categoria-text-select" name="categoria">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id_categoria}}" @html_selected(isset($movimento) && $movimento->id_categoria === $categoria->id_categoria)>{{$categoria->ds_categoria}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
    <input class="form-control" type="text" placeholder="Parcela do apartamento" id="descricao-text-input" name="descricao" value="{{$movimento->ds_movimento or ""}}" />
</div>

<div class="form-group">
    <label for="previsao-date-input" class="col-form-label"><strong>Datas:</strong></label>
    <div class="row">
        <div class="col-6">
            <input class="form-control" type="date" placeholder="previsto para" id="previsao-date-input" name="previsao" value="{{$movimento->dt_previsao or ""}}" />
        </div>
        <div class="col-6">
            <input class="form-control" type="date" placeholder="confirmado em" id="confirmacao-date-input" name="confirmacao" value="{{$movimento->dt_confirmacao or ""}}" />
        </div>
    </div>
</div>

<div class="form-group">
    <label for="valor-number-input" class="col-form-label"><strong>Valor previsto</strong></label>
    <input class="form-control" type="number" placeholder="R$ 5.000,00" id="valor-number-input" name="valor_previsto" value="{{$movimento->vl_previsto or ""}}" />
</div>

<div class="form-group">
    <label for="valor-confirmado-number-input" class="col-form-label"><strong>Valor confirmado</strong></label>
    <input class="form-control" type="number" placeholder="R$ 5.000,00" id="valor-confirmado-number-input"  name="valor_confirmado" value="{{$movimento->vl_confirmado or ""}}" />
</div>

<br />
<div class="form-group-row text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Salvar
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('form-movimento').submit();">Salvar</a>
            <a class="dropdown-item" href="#">Salvar Adicionar</a>
        </div>
    </div>

</div>
<br />
</form>
@endsection
