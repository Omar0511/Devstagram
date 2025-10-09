<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    // Pasando una variable a la vista
    // public $mensaje = "Variable desde Livewire";
    // public $mensaje;

    public $post;
    public $isLiked;
    public $likes;

    // Es como un CONSTRUCTOR
    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        // return "DEsde función like()";

        if ( $this->post->checkLike(auth()->user()) ) {
            // Eliminar el like
            $this->post->likes()->where('post_id', $this->post->id)->delete();

            $this->isLiked = false;

            $this->likes--;
        } else {
            // Agregar el like
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);

            $this->isLiked = true;

            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
