<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
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
        dd($request->get('username') );
    }
}
