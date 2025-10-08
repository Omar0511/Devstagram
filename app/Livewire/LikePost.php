<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    // Pasando una variable a la vista
    // public $mensaje = "Variable desde Livewire";
    // public $mensaje;

    public $post;

    public function like()
    {
        return "DEsde función like()";
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
