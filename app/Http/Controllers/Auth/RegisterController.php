<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            //'nombre_usu' => ['required', 'string', 'max:255'],  // Aquí agregamos la validación para 'nombre_usu'
            //'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
{

    //dd($data); // Agrega esto temporalmente para inspeccionar los datos
    return User::create([
        'nombre_usu' => $data['nombre_usu'],
        'num_usu' => $data['num_usu'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        //'id_rol' => $data['id_rol'] ?? 2, // Valor por defecto 2 si no se selecciona uno
    ]);

     // Asignar el rol automáticamente
     $user->assignRole('usuario'); // Asegúrate de que el rol 'usuario' exista
    
     return $user;
}

}