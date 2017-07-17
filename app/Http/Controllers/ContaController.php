<?php

namespace WeCash\Http\Controllers;

use Illuminate\Http\Request;
use WeCash\Conta;


class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = \Auth::user();
        $contas = Conta::all()->where("id_empresa",$usuario->id_empresa);
        return view("conta.index")->with("contas", $contas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = \Auth::user();
        return view("conta.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = \Auth::user();

        $conta = new Conta();
        $conta->ds_conta = $request->input("descricao");
        $conta->id_empresa = $usuario->id_empresa;
        $conta->save();

        return redirect()->action("ContaController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$contas = DB::select("select * from tb_contas where id_conta = {$id}");
        $conta = Conta::find($id);
        return response()->json($conta);
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
