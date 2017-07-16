@extends('layouts.app')
@section('content')
<br />
<h4>Conta</h4>
<hr />
<div class="form-group">
    <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
    <input class="form-control" type="text" placeholder="Bradesco" id="descricao-text-input">
</div>
<br />
<div class="form-group-row text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
    <button type="button" class="btn btn-primary">Salvar</button>
</div>
<br />
@endsection
