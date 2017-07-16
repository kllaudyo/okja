<?php

namespace WeCash;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "tb_categorias";
    protected $primaryKey = "id_categoria";

    public function movimentos(){
        return $this->hasMany('WeCash\Movimento');
    }

}
