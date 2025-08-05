<?php

namespace App\Http\Controllers;

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
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);
    }
}
