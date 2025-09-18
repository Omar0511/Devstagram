<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Request $request, Post $post)
    {
        // dd('LikeController');
        // dd($post->id);

        // Almacenar el like en la base de datos
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        // Para regresar a la misma página
        return back();
    }
}
