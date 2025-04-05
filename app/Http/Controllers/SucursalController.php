<?php

namespace App\Http\Controllers;

use App\Models\Celular; // Asegúrate de tener este modelo
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index($nombre)
    {
        // Obtener los celulares de la sucursal que coincide con el nombre
        $celulares = Celular::where('sucursal', $nombre)->get();
        
        // Pasar los celulares a la vista
        return view('sucursal.index', compact('celulares', 'nombre'));
    }

    // Métodos adicionales para otras funcionalidades si es necesario
    public function recepcion(Request $request)
    {
        // Lógica para recepción de celulares
    }

    public function actualizarEstado(Request $request)
    {
        // Lógica para actualizar el estado de un celular
    }

    public function generarReporte($nombre)
    {
        // Lógica para generar un reporte de la sucursal
    }
}

