<?php

namespace WeCash\Http\Controllers\Auth;

use WeCash\Empresa;
use WeCash\Usuario;
use WeCash\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'empresa' => 'required|string|max:255',
            'usuario' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_usuarios,nm_email',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Usuario
     */
    protected function create(array $data)
    {

        $empresa = new Empresa();
        $empresa->nm_empresa = $data["empresa"];
        $empresa->save();

        $usuario = new Usuario();
        $usuario->nm_usuario = $data["empresa"];
        $usuario->nm_email = $data["email"];
        $usuario->nm_senha = bcrypt($data["password"]);
        $usuario->id_empresa = $empresa->id_empresa;
        $usuario->save();

        return $usuario;

//
//        return Usuario::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
    }
}
