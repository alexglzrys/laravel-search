<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Recuperar cadenas de consulta (variables GET)
        $name = $request->input('name');
        $email = $request->input('email');
        $bio = $request->input('bio');

        // Recuperar todos los usuarios, o filtrar aquellos que cumplen con los criterios de busqueda (si es que se pasan variables a través de la URL)

        // Hacemos uso de los métodos personalizados (queryScope)

        // Si las variables involucradas en la cadena de consulta no existen, simplemente me retorna todos los registros ordenados por id DESC y paginados de 4 en 4.
        $users = User::name($name)
                    ->email($email)
                    ->bio($bio)
                    ->orderBy('id', 'DESC')->paginate(4);
        
        return view('users', compact('users'));
    }
}
