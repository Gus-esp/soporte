<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validar datos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redireccionar según la sucursal del usuario
            if ($user->sucursal === 'almacen') {
                return redirect()->route('almacen.index');
            } elseif ($user->sucursal === 'lapaz') {
                return redirect()->route('sucursal.lapaz');
            } elseif ($user->sucursal === 'upea') {
                return redirect()->route('sucursal.upea');
            } elseif ($user->sucursal === 'ceja') {
                return redirect()->route('sucursal.ceja');
            }

            // Redirigir a un dashboard general si no tiene sucursal asignada
            return redirect()->route('dashboard');
        }

        // Si la autenticación falla, redirigir con error
        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
