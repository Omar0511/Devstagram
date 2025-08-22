<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //Proteger rutas
    public function __construct() {
        // Middleware: Protege las rutas, para que solo los usuarios autenticados puedan acceder
        $this->middleware('auth');
    }

    public function index() {
        // dd('Desde muro');
        // Revisar que usuario esta autenticado
        // dd( auth()->user() );

        return view('dashboard');
    }
}