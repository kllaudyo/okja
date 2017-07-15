<?php

namespace WeCash;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = "tb_usuarios";
    protected $primaryKey = "id_usuario";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nm_usuario', 'nm_email', 'nm_senha',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'nm_senha', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->nm_senha;
    }

    public function getAuthIdentifierName(){
        return 'nm_email';
    }

}