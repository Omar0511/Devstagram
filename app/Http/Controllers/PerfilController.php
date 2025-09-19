<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
// Se agrega para que MIDDLEWARE funcione
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image;
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
            'username' => ['required', 'unique:users,username, '.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,facebook,admin,root'],
        ]);

        if ($request->imagen) {
            // dd('Existe imagen');

            $imagen = $request->file('imagen');

            //generar un id unico para las imagenes
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            //agregamos la imagen a la  carpeta en public donde se guardaran las imagenes
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

            //Una vez procesada la imagen entonces guardamos la imagen en la carpeta que creamos
            $imagenServidor->save($imagenPath);
        }

        // Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        // Redireccionar
        return redirect()->route('posts.index', $usuario->username);
    }
}
