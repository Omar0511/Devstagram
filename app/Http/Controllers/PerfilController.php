<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Se agrega para que MIDDLEWARE funcione
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;

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
        // dd('Mostrando el formulario para editar el perfil');

        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // dd('Almacenando cambios del perfil');

        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            // 'username' => "required|unique:user,|min:3|max:20|", cuando son más de 3, se recomienda agregagaros en un arreglo
            // NOT_IN: para evitar que se usen ciertos nombres de usuario
            // IN: para permitir solo ciertos nombres de usuario, como roles también
            'username' => ['required', 'unier:users,username, '.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,facebook,admin,root'],
        ]);
    }
}
