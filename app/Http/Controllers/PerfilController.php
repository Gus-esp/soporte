<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class PerfilController extends Controller
{
    public function edit()
    {
        return view('perfil.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        // Verificamos si el usuario está autenticado
        $user = Auth::user();
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
    
        // Validamos los datos ingresados en el formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
    
        // Asignamos el nuevo nombre
        $user->name = $request->name;
    
        // Si se ingresó una contraseña, la encriptamos antes de guardarla
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        // Guardamos los cambios en la base de datos
        $user-> Save();
        return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado correctamente.');
    }
}

