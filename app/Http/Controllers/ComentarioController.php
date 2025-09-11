<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ComentarioController extends Controller
{
    use ValidatesRequests;

    //
    public function store(Request $request, User $user, Post $post) {
        // dd('Desde ComentarioController');

        // Validar
        $this->validate(
            request(),
            [
                'comentario' => 'required|max:255'
            ]
        );

        // Almacenar el comentario
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        // Imprime un mensaje, retorna a la págnina anterior
        return back()->with('mensaje', 'Comentario Agregado Correctamente');
    }
}
