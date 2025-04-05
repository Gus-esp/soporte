<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReciboController extends Controller
{
    public function obtenerCuentasDiarias()
    {
        // Sumar los montos de todas las reparaciones del día actual
        $ventasDiarias = DB::table('celulares')
                            ->whereDate('created_at', now()->toDateString()) // Filtra las ventas de hoy
                            ->sum('costo_reparacion'); // Suma los costos de reparación

        return response()->json([
            'total' => $ventasDiarias
        ]);
    }
}
