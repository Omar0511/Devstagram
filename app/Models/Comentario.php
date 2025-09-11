<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // agregarla
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    // Añadirlo con la importación del USE
    use HasFactory;
    //
    protected $fillable = [
        'user_id',
        'post_id',
        'comentario'
    ];
}