<?php

namespace WeCash;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "tb_empresas";
    protected $primaryKey = "id_empresa";

    protected $fillable = [
        'nm_empresa'
    ];

}
