<?php

namespace WeCash;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = "tb_movimentos";
    protected $primaryKey = "id_movimento";

    public function categoria(){
        return $this->belongsTo('WeCash\Categoria');
    }

    public function conta(){
        return $this->belongsTo('WeCash\Conta');
    }
}
