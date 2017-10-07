@extends('layouts.app')
@section('content')
<br />
<h4>Contas</h4>
<br />
@if(count($contas)==0)
    <p class="alert alert-info">Não há contas cadastradas</p>
@else
    <table class="table table-hover">
        <thead class="thead-default">
        <tr>
            <th colspan="3">Descrição</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contas as $conta)
        <tr>
            <td class="col-sm-7">{{$conta->ds_conta}}</td>
            <td>
                <a href="{{action("ContaController@edit",["id"=>$conta->id_conta])}}"><img src="{{ asset('images/pencil-circle.png') }}" /></a>
            </td>
            <td>
                <form class="form-inline" method="post" action="{{action("ContaController@destroy",["id" => $conta->id_conta])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE" />
                    <input type="hidden" name="id" value="{{$conta->id_conta}}" />
                    <input type="image" src="{{ asset('images/delete-variant.png') }}" />
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection