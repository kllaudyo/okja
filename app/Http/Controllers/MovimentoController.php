<?php

namespace WeCash\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use WeCash\Categoria;
use WeCash\Conta;
use WeCash\Http\Requests\MovimentoRequest;
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
               AND date_format(mov.dt_previsao, '%m%Y') = ? 
             ORDER BY if(mov.dt_confirmacao is null,0,1) ASC, mov.dt_previsao desc";

        $usuario = \Auth::user();
        $movimentos = DB::select($sql, array($usuario->id_empresa,$data));

        $vl_despesa_pendente = $this->retornaPendente($usuario->id_empresa, $data, "D");
        $vl_renda_pendente = $this->retornaPendente($usuario->id_empresa, $data, "C");

        $vl_despesa_confirmada = $this->retornaConfirmado($usuario->id_empresa, $data, "D");
        $vl_renda_confirmada = $this->retornaConfirmado($usuario->id_empresa, $data, "C");

        return view("movimento.index", [
            "movimentos" => $movimentos,
            "data" => $data,
            "vl_despesa_pendente" => $vl_despesa_pendente,
            "vl_renda_pendente" => $vl_renda_pendente,
            "vl_despesa_confirmada" => $vl_despesa_confirmada,
            "vl_renda_confirmada" => $vl_renda_confirmada
        ]);
    }

    private function retornaPendente($id_empresa, $dt_referencia, $tp_categoria){

        $sql = "
            SELECT
              sum(mov.vl_previsto) as vl_pendente
            FROM tb_movimentos mov
              ,tb_categorias cat
              ,tb_contas cnt
            WHERE mov.id_conta = cnt.id_conta
              AND mov.id_categoria = cat.id_categoria
              AND cnt.id_empresa = ?
              AND DATE_FORMAT(mov.dt_previsao, '%m%Y') = ?
              AND cat.tp_categoria = ?
              AND mov.dt_confirmacao is null
              ";

        $pendente = DB::select($sql, array($id_empresa, $dt_referencia, $tp_categoria));
        return $pendente[0]->vl_pendente;

    }

    private function retornaConfirmado($id_empresa, $dt_referencia, $tp_categoria){

        $sql = "
            SELECT
              sum(mov.vl_previsto) as vl_confirmado
            FROM tb_movimentos mov
              ,tb_categorias cat
              ,tb_contas cnt
            WHERE mov.id_conta = cnt.id_conta
              AND mov.id_categoria = cat.id_categoria
              AND cnt.id_empresa = ?
              AND DATE_FORMAT(mov.dt_previsao, '%m%Y') = ?
              AND cat.tp_categoria = ?
              AND mov.dt_confirmacao is not null
              ";

        $pendente = DB::select($sql, array($id_empresa, $dt_referencia, $tp_categoria));
        return $pendente[0]->vl_confirmado;

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
    public function store(MovimentoRequest $request)
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
        return redirect()->action("MovimentoController@index")->with("msg","Movimento criado com sucesso!");

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
        $movimento = Movimento::find($id);

        if(!empty($movimento)){

            $usuario = \Auth::user();
            $categorias = Categoria::all()->where("id_empresa", $usuario->id_empresa);
            $contas = Conta::all()->where("id_empresa", $usuario->id_empresa);
            return view("movimento.create",["categorias" => $categorias, "contas" => $contas, "movimento" => $movimento]);
        }

        //Todo(1) DT - Em caso de erro, mandar uma mensagem de feedback para a listagem
        return redirect()->action("MovimentoController@index");
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
        $movimento = Movimento::find($id);

        if(!empty($movimento)){

            if($request->exists("fallback_confirmacao")) {
                if($request->input("fallback_confirmacao",0) == 0 ){
                    $movimento->dt_confirmacao = null;
                }else{
                    $date = new \DateTime();
                    $movimento->dt_confirmacao = $date->format("Y-m-d");
                }

            }else{

                $id_conta = $request->input("conta");
                $id_categoria = $request->input("categoria");
                $descricao = $request->input("descricao");
                $previsao = $request->input("previsao");
                $confirmacao = $request->input("confirmacao");
                $valor_previsto = $request->input("valor_previsto");
                $valor_confirmado = $request->input("valor_confirmado");

                $movimento->id_conta = $id_conta;
                $movimento->id_categoria = $id_categoria;
                $movimento->ds_movimento = $descricao;
                $movimento->dt_previsao = $previsao;
                $movimento->vl_previsto = $valor_previsto;

                if (!is_null($confirmacao)) {
                    $movimento->dt_confirmacao = $confirmacao;
                }

                if (!is_null($valor_confirmado)) {
                    $movimento->vl_confirmado = $valor_confirmado;
                }

            }

            $movimento->update();
        }

        return redirect()->action("MovimentoController@index")->with("msg","Movimento salvo com sucesso!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movimento = Movimento::find($id);
        if(!empty($movimento)){
            $movimento->delete();
        }

        return redirect()->action("MovimentoController@index")->with("msg","Movimento removido com sucesso!");

    }
}
