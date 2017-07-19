@extends('layouts.app')
@section('content')
<br />
<h4>Conta</h4>
<hr />
<form method="post" action="{{ (isset($conta))? action("ContaController@update",["id"=>$conta->id_conta]) : action("ContaController@store")}}">
{{csrf_field()}}
@if(isset($conta))
    <input type="hidden" name="_method" value="PUT" />
@endif
<div class="form-group">
    <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
    <input class="form-control" type="text" placeholder="Bradesco" id="descricao-text-input" name="descricao" value="{{$conta->ds_conta or ""}}">
</div>
<br />
<div class="form-group-row text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
</form>
<br />
@endsection
