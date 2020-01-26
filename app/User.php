<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Query Scopes 
    // Limitan o extienden el alcance de las consultas para el modelo donde se encuentren declaradas.

    // Nos permiten construir metodos con consultas SQL personalizadas, cuyo contenido puede ser repetitivo para mas de un método que haga uso de este modelo. Esto ayuda a desinchar nuestros controladores y centralizar esa lógica repetitiva en un solo punto.

    // Para invocarlos, solo hace falta hacer uso del metodo personalizado, sin el prefijo scope
    // User::name('nombre')
    // User::name('nombre')->email('dato')->bio('dato')->get()

    // Lo anterior se traduce a:
    /**
     * User::where('name', 'LIKE', '%$nombre%')
     *     ->where('email', 'LIKE', '%$email%')
     *     ->where('bio', 'LIKE', '%bio%')
     *     ->get()
     */

    // Si el queryScope no se ejecuta (no se cumple la condición), la consulta original no es modificada

    public function scopeName($query, $name)
    {
        if($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }

    public function scopeEmail($query, $email)
    {
        if($email) {
            return $query->where('email', 'LIKE', "%$email%");
        }
    }

    public function scopeBio($query, $bio)
    {
        if($bio) {
            return $query->where('bio', 'LIKE', "%$bio%");
        }
    }
}
