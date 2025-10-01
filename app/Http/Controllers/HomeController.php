<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// Se agrega para que MIDDLEWARE funcione
use Illuminate\Routing\Controller;

class HomeController extends Controller
{

    // Protegiendo el HOME con MIDDLEWARE, por si el usuario no está autenticado
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    // public function index()
    // {
    //     dd('Desde el HomeController');
    // }

    // Método invoable, es decir, se manda llamar automáticamente, es como un constructor
    public function __invoke()
    {
        // Obtener a quienes seguimos
        // dd(auth()->user()->followings->pluck('id')->toArray());
        $ids = auth()->user()->followings->pluck('id')->toArray();
        // latest = ordena de forma descendente, del más nuevo al más viejo
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        // dd($posts);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
