<?php

namespace WeCash\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "SELECT mov.id_movimento,
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
               AND cnt.id_empresa = ?";
        $usuario = \Auth::user();
        $movimentos = DB::select($sql, array($usuario->id_empresa));

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
