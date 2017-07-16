@extends('layouts.app')
@section('content')
    <br />
    <h4>Categoria</h4>
    <hr />
    <div class="form-group">
        <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
        <input class="form-control" type="text" placeholder="Bradesco" id="descricao-text-input">
    </div>
    <div class="form-group">
        <label class="col-form-label"><strong>Tipo:</strong></label>
        <div class="row">
            <div class="col-12">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary ">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Renda
                </label>
                <label class="btn btn-primary active">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Despesa
                </label>
            </div>
            </div>
        </div>
    </div>
    <br />
    <div class="form-group-row text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
    </div>
    <br />
@endsection
