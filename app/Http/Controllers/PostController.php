<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
// Se agrega para que MIDDLEWARE funcione
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PostController extends Controller
{
    use ValidatesRequests;

    //Proteger rutas
    public function __construct() {
        // Middleware: Protege las rutas, para que solo los usuarios autenticados puedan acceder
        $this->middleware('auth');
    }

    public function index(User $user) {
        // dd('Desde muro');
        // Revisar que usuario esta autenticado
        // dd( auth()->user() );
        // dd($user->username);

        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create() {
        // dd('Desde create');
        return view('posts.create');
    }

    // Store: Almacenar en la base de datos
    public function store(Request $request) {
        // dd('Desde store');

        $this->validate(
            $request,
            [
                'titulo' => 'required|max:255',
                'descripcion' => 'required',
                'imagen' => 'required'
            ]
        );

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        /**
         * Otra forma de hacerlo sin el método create, es con new Post
         * $post = new Post();
         * $post->titulo = $request->titulo;
         * $post->descripcion = $request->descripcion;
         * $post->imagen = $request->imagen;
         * $post->user_id = auth()->user()->id;
         * $post->save();
        */

        // return redirect()->route('posts.index', auth()->user()->username);
        return redirect()->route('posts.index', $request->user()->username);
    }
}
