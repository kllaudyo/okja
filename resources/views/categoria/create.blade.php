@extends('layouts.app')
@section('content')
    <br />
    <h4>Categoria</h4>
    <hr />
    <form method="post" action="{{ (isset($categoria)) ? action("CategoriaController@update",["id"=>$categoria->id_categoria]) : action("CategoriaController@store")}}">
    {{csrf_field()}}
    @if(isset($categoria))
        <input type="hidden" name="_method" value="PUT" />
    @endif
    <div class="form-group">
        <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
        <input class="form-control" type="text" placeholder="Transportes..." id="descricao-text-input" name="descricao" value="{{$categoria->ds_categoria or ""}}" />
    </div>
    <div class="form-group">
        <label class="col-form-label"><strong>Tipo:</strong></label>
        <div class="row">
            <div class="col-12">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary @css_active(isset($categoria) && $categoria->tp_categoria==='C')">
                    <input type="radio" name="tipo" id="tipoC" autocomplete="off"  value="C" @html_checked(isset($categoria) && $categoria->tp_categoria==='C') /> Renda
                </label>
                <label class="btn btn-primary @css_active(isset($categoria) && $categoria->tp_categoria==='D')">
                    <input type="radio" name="tipo" id="tipoD" autocomplete="off" value="D" @html_checked(isset($categoria) && $categoria->tp_categoria==='D') /> Despesa
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
