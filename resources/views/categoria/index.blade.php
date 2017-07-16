@extends('layouts.app')
@section('content')
<br />
<h4>Categorias</h4>
<br />
<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th colspan="4">Descrição</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
    <tr>
        <td>
            @if($categoria->tp_categoria == "C")
                <img src="images/redo.png" />
            @else
                <img src="images/undo.png" />
            @endif
        </td>
        <td class="col-sm-6">{{$categoria->ds_categoria}}</td>
        <td><img src="images/pencil.png" /></td>
        <td>
            <form class="form-inline" method="post" action="categoria-remover.php">
                <input type="hidden" name="id" value="{{$categoria->id_categoria}}" />
                <input type="image" src="images/close-circle.png" />
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection