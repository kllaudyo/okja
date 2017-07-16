@extends('layouts.app')
@section('content')
<br />
<h4>Movimento</h4>
<hr />
<div class="form-group">
    <label for="conta-text-input" class="col-form-label"><strong>Conta:</strong></label>
    <select class="form-control" >
        @foreach($contas as $conta)
            <option value="{{$conta->id_conta}}">{{$conta->ds_conta}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="categoria-text-input" class="col-form-label"><strong>Categoria:</strong></label>
    <select class="form-control" >
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id_categoria}}">{{$categoria->ds_categoria}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
    <input class="form-control" type="text" placeholder="Parcela do apartamento" id="descricao-text-input">
</div>

<div class="form-group">
    <label class="col-form-label"><strong>Datas:</strong></label>
    <div class="row">
        <div class="col-6">
            <input class="form-control" type="text" placeholder="previsto para" id="dataprevisao-date-input">
        </div>
        <div class="col-6">
            <input class="form-control" type="text" placeholder="confirmado em" id="dataconfirmacao-date-input">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="valor-number-input" class="col-form-label"><strong>Valor</strong></label>
    <input class="form-control" type="number" placeholder="R$ 5.000,00" id="valor-number-input">
</div>
<br />
<div class="form-group-row text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
    <button type="button" class="btn btn-secondary">Salvar e Adicionar</button>
    <button type="button" class="btn btn-primary">Salvar</button>
</div>
<br />
@endsection
