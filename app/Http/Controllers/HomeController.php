<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    // public function index()
    // {
    //     dd('Desde el HomeController');
    // }

    // Método invoable, es decir, se manda llamar automáticamente, es como un constructor
    public function __invoke()
    {
        return view('home');
    }
}
