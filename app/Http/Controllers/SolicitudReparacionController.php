<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudReparacionController extends Controller
{
    public function store(Request $request)
    {
        // Procesar la solicitud de reparación
        return back()->with('success', 'Solicitud enviada correctamente.');
    }
}
