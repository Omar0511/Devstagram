<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use ValidatesRequests; // 👈 ESTE use es el que aplica el trait, lo tenemos que poner cuando usamos: VALIDATE
    //
    public function index() {
        return view("auth.login");
    }

    public function store(Request $request) {
        // dd('Autenticando...');
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
}