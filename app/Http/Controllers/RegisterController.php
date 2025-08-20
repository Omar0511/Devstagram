<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


class RegisterController extends Controller
{
    use ValidatesRequests; // 👈 ESTE use es el que aplica el trait
    //
    public function index() {
        return view("auth.register");
    }

    public function store(Request $request) {
        // dd: imprime lo que le pases, pero detiene la ejecución TOTAL
        // dd('Post...');

        // Debugueando
        // dd($request);

        // De esta forma validamos los valores de los INPUT apuntando al NAME
        // dd($request->get('username') );

        $this->validate($request, [
            /* Puede estar como arreglo:
            'name' => ['required', 'min:5'], */
            'name' => 'required|max: 30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            // Confirmed: sirve para el PASSWORD_CONFIRMATION del FORMULARIO
            'password' => 'required|confirmed|min:6',
        ]);

        // dd('Creando el usuario...');
        User::create(
            [
                // Pueden ser ambas formas
                // 'name' => $request->get('name'),
                'name'=>$request->name,
                'username'=>$request->username,
                'email'=>$request->email,
                // 'password' -> bcrypt($request->get('password')),
                'password'=>$request->password
            ]
        );

    }
}
