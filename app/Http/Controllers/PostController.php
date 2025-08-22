<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index() {
        // dd('Desde muro');
        // Revisar que usuario esta autenticado
        dd( auth()->user() );
    }
}
