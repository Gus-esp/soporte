<?php

namespace App\Http\Controllers;

use App\Models\Celular;
use Illuminate\Http\Request;

class CelularController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all()); // Esto detendrá la ejecución y mostrará los datos enviados
    
        try {
            $data = $request->validate([
                'fecha_recepcion' => 'required|date',
                'fecha_entrega' => 'required|date',
                'nombre_cliente' => 'required|string',
                'telefono' => 'required|string',
                'marca' => 'required|string',
                'motivo' => 'required|string',
                'costo_reparacion' => 'required|numeric',
                'costo_repuestos' => 'required|numeric',
            ]);
    
            Celular::create($data);
            return response()->json(['mensaje' => 'El formulario se envió correctamente'], 200);
            
        } 
        catch (\Exception $e) {
            return back()->with('error', 'Error al registrar: ' . $e->getMessage());
        }
    }
    public function actualizarEstado(Request $request)
    {
        // Validación de entrada
        $request->validate([
            'id' => 'required|exists:celulares,id',
            'estado' => 'required|string',
        ]);

        // Encontrar el celular por su ID
        $celular = Celular::findOrFail($request->id);
        $celular->estado = $request->estado;
        $celular->save();

        // Mensaje de éxito y redirección
        return back()->with('success', 'Estado actualizado con éxito');
    }
}
