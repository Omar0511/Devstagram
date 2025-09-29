<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    // fillable: Los datos que esperamos que el USUARIO nos proporcione y los que se van a INSERTAR en la BD
    protected $fillable = [
        'name',
        'email',
        'password',
        'username' // Aquí agregamos el nuevo campo que no estaba en la tabla original
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Creando una relación
    public function posts()
    {
        // hasMany = One to Many, 1 usuario tiene muchos posts
        return $this->hasMany(Post::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    // Almacenar los seguidores de un usuario
    public function followers()
    {
        // followers = nombre de la tabla
        // user_id = el usuario que es seguido
        // follower_id = el usuario que sigue
        // En la tabla de folloers, va insertar usr_id y follower_id
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    // Almacenar a los usuarios que un usuario sigue
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id','user_id');
    }

    // Comprobar si un usuario ya sigue a otro
    public function siguiendo(User $user)
    {
        return $this->followers->contains($user->id);
    }
}
