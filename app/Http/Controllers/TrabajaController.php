<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabajaController extends Controller
{
    // Función para mostrar la vista "Trabaja con Nosotros"
    public function index()
    {
        return view('trabaja'); // La vista 'trabaja' que creamos antes
    }

    // Función para manejar la solicitud del formulario
    public function submit(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'mensaje' => 'required|string|max:1000',
        ]);

        // Aquí podrías guardar la solicitud en la base de datos, o enviarla por correo
        // Por ejemplo: JobApplication::create($validated);

        // Redirigir con mensaje de éxito
        return back()->with('success', 'Tu solicitud ha sido enviada correctamente.');
    }
}
