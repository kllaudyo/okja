@extends('layouts.app')
@section('content')
<br />
<h4>Categorias</h4>
<br />
@if(count($categorias)==0)
    <p class="alert alert-info">Não há categorias cadastradas</p>
@else
    <table class="table table-hover">
        <thead class="thead-default">
        <tr>
            <th colspan="4">Descrição</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>
                @if($categoria->tp_categoria == "C")
                    <img src="images/redo.png" data-toggle="tooltip" data-placement="bottom" title="Renda"  />
                @else
                    <img src="images/undo.png" data-toggle="tooltip" data-placement="bottom" title="Despesa"  />
                @endif
            </td>
            <td class="col-sm-6">{{$categoria->ds_categoria}}</td>
            <td>
                <a href="{{action("CategoriaController@edit", ["id"=>$categoria->id_categoria])}}" data-toggle="tooltip" data-placement="bottom" title="Editar">
                    <img src="{{ asset('images/pencil.png') }}" />
                </a>
            </td>
            <td>
                <form class="form-inline" method="post" action="{{action("CategoriaController@destroy",["id" => $categoria->id_categoria])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE" />
                    <input type="hidden" name="id" value="{{$categoria->id_categoria}}" />
                    <input type="image" src="{{ asset('images/delete.png') }}" data-toggle="tooltip" data-placement="bottom" title="Remover" />
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection