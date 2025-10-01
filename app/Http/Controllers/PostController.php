<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
// Se agrega para que MIDDLEWARE funcione
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
// Con esta línea solucionamos el problema de: autorizeauthorize
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    use ValidatesRequests;
    // Y con esta línea solucionamos el problema de: authorize
    use AuthorizesRequests;

    //Proteger rutas
    public function __construct() {
        // Middleware: Protege las rutas, para que solo los usuarios autenticados puedan acceder
        // $this->middleware('auth');
        // Except: permite que las rutas show e index no requieran autenticación
        $this->middleware('auth')->except(['show', 'index']);
    }

    // Filtrar por Colección, este método ya no se usa y no permite paginar
    // public function index() {

    //     return view('dashboard', [
    //         'user' => $user
    //     ]);
    // }

    public function index(User $user) {
        // dd('Desde muro');
        // Revisar que usuario esta autenticado
        // dd( auth()->user() );
        // dd($user->username);
        // dd($user->id);

        // $posts = Post::where('user_id', $user->id)->get();
        // $posts = Post::where('user_id', $user->id)->simplePaginate(5); <- Otra forma de paginar
        $posts = Post::where('user_id', $user->id)->latest()->paginate(20);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
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

        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        /**
         * Otra forma de hacerlo sin el método create, es con new Post
         * $post = new Post();
         * $post->titulo = $request->titulo;
         * $post->descripcion = $request->descripcion;
         * $post->imagen = $request->imagen;
         * $post->user_id = auth()->user()->id;
         * $post->save();
        */

        // Tercer forma de guardar registros en la BD
        $request->user()->posts()->create(
            [
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'imagen' => $request->imagen,
                'user_id' => auth()->user()->id
            ]
        );

        // return redirect()->route('posts.index', auth()->user()->username);
        return redirect()->route('posts.index', $request->user()->username);
    }

    public function show(User $user, Post $post) {
        // dd('Desde show');
        // dd($post->titulo);

        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post) {
        // dd('Eliminando...');

        // if ($post->user_id === auth()->user()->id) {
        //     dd('Si es la misma persona');
        // } else {
        //     dd('No es la misma persona');
        // }

        // Ejecutar el Policy
        $this->authorize('delete', $post);

        // Eliminar el post
        $post->delete();

        // Eliminar la imagen
        $imagen_path = public_path('uploads/' . $post->imagen);

        if (File::exists($imagen_path)) {
            unlink($imagen_path);
        }

        // Redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
