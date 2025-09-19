<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Se agrega para que MIDDLEWARE funcione
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PerfilController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        dd('Mostrando el formulario para editar el perfil');
    }
}