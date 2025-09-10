<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
}
