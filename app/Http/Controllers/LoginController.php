<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


class LoginController extends Controller
{
    use ValidatesRequests;

    public function index() {
        return view("auth.login");
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Comprobar si las credenciales son correctas
        if (!auth()->attempt($request->only('email', 'password'))) {
            // BACK: Coloca el mensaje en la sesión
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('posts.index');
    }
}
