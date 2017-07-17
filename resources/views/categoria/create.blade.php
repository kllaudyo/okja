@extends('layouts.app')
@section('content')
    <br />
    <h4>Categoria</h4>
    <hr />
    <form method="post" action="{{action("CategoriaController@store")}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
        <input class="form-control" type="text" placeholder="Transportes..." id="descricao-text-input" name="descricao" />
    </div>
    <div class="form-group">
        <label class="col-form-label"><strong>Tipo:</strong></label>
        <div class="row">
            <div class="col-12">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="tipo" id="tipoC" autocomplete="off" checked value="C" /> Renda
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="tipo" id="tipoD" autocomplete="off" value="D" /> Despesa
                </label>
            </div>
            </div>
        </div>
    </div>
    <br />
    <div class="form-group-row text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    </form>
    <br />
@endsection
