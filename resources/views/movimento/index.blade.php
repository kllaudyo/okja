@extends('layouts.app')
@section('content')
<br />
<h4>Movimentações</h4>
<br />
<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link @css_active($data === '012017')" href="{{action('MovimentoController@index','012017')}}">Janeiro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '022017')" href="{{action('MovimentoController@index','022017')}}">Fevereiro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '032017')" href="{{action('MovimentoController@index','032017')}}">Março</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '042017')" href="{{action('MovimentoController@index','042017')}}">Abril</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '052017')" href="{{action('MovimentoController@index','052017')}}">Maio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '062017')" href="{{action('MovimentoController@index','062017')}}">Junho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '072017')" href="{{action('MovimentoController@index','072017')}}">Julho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '082017')" href="{{action('MovimentoController@index','082017')}}">Agosto</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '092017')" href="{{action('MovimentoController@index','092017')}}">Setembro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '102017')" href="{{action('MovimentoController@index','102017')}}">Outubro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '112017')" href="{{action('MovimentoController@index','112017')}}">Novembro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @css_active($data === '122017')" href="{{action('MovimentoController@index','122017')}}">Dezembro</a>
    </li>
</ul>
<br />
@if(count($movimentos)==0)
    <p class="alert alert-info">Não há compromissos lançados</p>
@else
<table class="table table-hover">
    <thead class="thead-default">
    <tr>
        <th>#</th>
        <th>Previsão</th>
        <th>Confirmação</th>
        <th>Categoria</th>
        <th class="w-50">Descrição</th>
        <th>Conta</th>
        <th>Valor</th>
        <th colspan="2"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($movimentos as $movimento)
    <tr class="@wecash_confirmed(!is_null($movimento->dt_confirmacao))">
        <td scope="row">
            <form method="POST" action="{{action("MovimentoController@update",["id" => $movimento->id_movimento])}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="fallback_confirmacao" value="{{is_null($movimento->dt_confirmacao)?'0':'1'}}" />
                <input type="checkbox" name="check_confirmacao" @html_checked(!is_null($movimento->dt_confirmacao)) />
            </form>
        </td>
        <td>{{DateTime::createFromFormat('Y-m-d',$movimento->dt_previsao)->format('d/m/Y')}}</td>
        <td>{{(!empty($movimento->dt_confirmacao))?DateTime::createFromFormat('Y-m-d',$movimento->dt_confirmacao)->format('d/m/Y'):''}}</td>
        <td>{{$movimento->ds_categoria}}</td>
        <td>{{$movimento->ds_movimento}}</td>
        <td>{{$movimento->ds_conta}}</td>
        <td class="text-right">{{number_format($movimento->vl_previsto , 2 , ',' , '.')}}</td>
        <td>
            <a href="{{action("MovimentoController@edit", ["id" => $movimento->id_movimento])}}">
                <img src="{{ asset('images/pencil-circle.png') }}" />
            </a>
        </td>
        <td>
            <form class="form-inline" method="POST" action="{{action("MovimentoController@destroy",["id"=>$movimento->id_movimento])}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE" />
                <input type="image" src="{{ asset('images/delete-variant.png') }}" />
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr class="thead-default">
            <th colspan="9">Totalizadores</th>
        </tr>
        <tr>
            <td class="text-right" colspan="6">Pendente Renda:</td>
            <td class="text-right" colspan="3">R$ {{number_format($vl_renda_pendente, 2, ',', '.')}}</td>
        </tr>
        <tr>
            <td class="text-right" colspan="6">Pendente Despesa:</td>
            <td class="text-right" colspan="3">R$ {{number_format($vl_despesa_pendente, 2, ',', '.')}}</td>
        </tr>
        <tr>
            <td class="text-right" colspan="6">Confirmado Renda:</td>
            <td class="text-right" colspan="3">R$ {{number_format($vl_renda_confirmada, 2, ',', '.')}}</td>
        </tr>
        <tr>
            <td class="text-right" colspan="6">Confirmado Despesa:</td>
            <td class="text-right" colspan="3">R$ {{number_format($vl_despesa_confirmada, 2, ',', '.')}}</td>
        </tr>
        <tr class="thead-default">
            <th colspan="9">Análise Prévia</th>
        </tr>
    </tfoot>
</table>
@endif
@endsection