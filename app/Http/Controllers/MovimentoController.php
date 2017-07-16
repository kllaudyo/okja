<?php

namespace WeCash\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use WeCash\Categoria;
use WeCash\Conta;
use WeCash\Movimento;

class MovimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($data = null)
    {

        if(!isset($data)){
            $date = new \DateTime();
            $data = $date->format("mY");
        }

        $sql = "
            SELECT mov.id_movimento,
                   mov.ds_movimento,
                   mov.dt_previsao,
                   mov.dt_confirmacao,
                   mov.vl_previsto,
                   cat.id_categoria,
                   cat.ds_categoria,
                   cnt.id_conta,
                   cnt.ds_conta
              FROM tb_movimentos mov
                  ,tb_categorias cat
                  ,tb_contas cnt
             WHERE mov.id_conta = cnt.id_conta
               AND mov.id_categoria = cat.id_categoria
               AND cnt.id_empresa = ?
               AND date_format(mov.dt_previsao, '%m%Y') = ? ";

        $usuario = \Auth::user();
        $movimentos = DB::select($sql, array($usuario->id_empresa,$data));

        error_log($sql);

        return view("movimento.index",["movimentos"=>$movimentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = \Auth::user();
        $categorias = Categoria::all()->where("id_empresa", $usuario->id_empresa);
        $contas = Conta::all()->where("id_empresa", $usuario->id_empresa);
        return view("movimento.create",["categorias"=>$categorias, "contas"=>$contas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_conta = $request->input("conta");
        $id_categoria = $request->input("categoria");
        $descricao = $request->input("descricao");
        $previsao = $request->input("previsao");
        $confirmacao = $request->input("confirmacao");
        $valor_previsto = $request->input("valor_previsto");
        $valor_confirmado = $request->input("valor_confirmado");

        $movimento = new Movimento();
        $movimento->id_conta = $id_conta;
        $movimento->id_categoria = $id_categoria;
        $movimento->ds_movimento = $descricao;
        $movimento->dt_previsao = $previsao;
        $movimento->vl_previsto = $valor_previsto;

        if(!is_null($confirmacao)){
            $movimento->dt_confirmacao = $confirmacao;
        }

        if(!is_null($valor_confirmado)){
            $movimento->vl_confirmado = $valor_confirmado;
        }

        $movimento->save();

        return redirect();

        return redirect()->action("MovimentoController@index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
