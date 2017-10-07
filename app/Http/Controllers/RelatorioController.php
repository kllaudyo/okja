<?php

namespace WeCash\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        $usuario = \Auth::user();
        return view("relatorio.index");
    }
}
