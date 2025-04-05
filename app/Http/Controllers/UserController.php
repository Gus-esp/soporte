<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\auth;

class UserController extends Controller
{
    public function create()
    {
        // Mostrar el formulario para crear un usuario
        return view('usuarios.create');
    }
    public function store(Request $request)
{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'sucursal' => $request->sucursal,
    ]);

    Auth::login($user);

    return redirect()->route('almacen.index'); // Asegúrate de que el nombre de la ruta es correcto
}    
}
