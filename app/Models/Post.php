<?php

namespace App\Models;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Post extends Model
{
    use HasFactory;

    use ValidatesRequests;
    // Y con esta línea solucionamos el problema de: authorize
    use AuthorizesRequests;

    // Es la información que se va llenar en la base de datos
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    // Relación inversa
    public function user()
    {
        // belongsTo = Muchos a Uno (Muchos posts pertenecen a un usuario)
        // return $this->belongsTo(User::class);
        return $this->belongsTo(User::class)->select( ['name', 'username'] );
    }

    public function comentarios() {
        return $this->hasMany(Comentario::class);
    }

    // Likes de un post
    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user) {
        // Si el usuario autenticado le dio like a la publicación
        return $this->likes->contains('user_id', $user->id);
    }
}
