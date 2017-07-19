@extends('layouts.app')
@section('content')
<br />
<h4>Contas</h4>
<br />
<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th colspan="3">Descrição</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contas as $conta)
    <tr>
        <td class="col-sm-7">{{$conta->ds_conta}}</td>
        <td><a href="{{action("ContaController@edit",["id"=>$conta->id_conta])}}"><img src="images/pencil.png" /></a></td>
        <td>
            <form class="form-inline" method="post" action="conta-remover.php">
                <input type="hidden" name="id" value="{{$conta->id_conta}}" />
                <input type="image" src="images/close-circle.png" />
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection