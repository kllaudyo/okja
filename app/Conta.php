<?php

namespace WeCash;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = "tb_contas";
    protected $primaryKey = "id_conta";

    protected $fillable = [
        'id_conta', 'nm_conta', 'id_empresa',
    ];
}
