<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;

class ReparacionController extends Controller
{
    // Mostrar todas las reparaciones
    public function index()
    {
        $reparaciones = Reparacion::paginate(10);
        $gastos_totales = Reparacion::where('estado', 'Entregado')->sum('costo_estimado');
        $ganancias_totales = Reparacion::where('estado', 'Entregado')->sum('ganancia'); // Cambia 'ganancia' por la columna que tengas para eso.

        return view('reparaciones.index', compact('reparaciones', 'gastos_totales', 'ganancias_totales'));
    }

    // Filtrar reparaciones pendientes
    public function pendientes()
    {
        $reparaciones = Reparacion::where('estado', 'Pendiente')->paginate(10);
        return view('reparaciones.index', compact('reparaciones'));
    }

    // Filtrar reparaciones entregadas
    public function entregadas()
    {
        $reparaciones = Reparacion::where('estado', 'Entregado')->paginate(10);
        return view('reparaciones.index', compact('reparaciones'));
    }

    // Cerrar el día y mostrar cuentas
    public function cerrarDia()
    {
        $gastos_totales = Reparacion::where('estado', 'Entregado')->sum('costo_estimado');
        $ganancias_totales = Reparacion::where('estado', 'Entregado')->sum('ganancia'); // Cambia 'ganancia' por la columna que tengas para eso.

        // Aquí puedes hacer alguna lógica para guardar los totales si lo necesitas.

        return response()->json([
            'gastos_totales' => $gastos_totales,
            'ganancias_totales' => $ganancias_totales,
        ]);
    }
    public function store(Request $request)
{
    // Validar datos del formulario
    $request->validate([
        'nombre_cliente' => 'required|string|max:255',
        'telefono_cliente' => 'required|string|max:255',
        'modelo_celular' => 'required|string|max:255',
        'descripcion_problema' => 'required|string',
        'costo_estimado' => 'required|numeric',
        'gastos' => 'required|numeric|min:0',
        
    ]);
    
    // Crear la reparación
    $reparacion = Reparacion::create([
        'nombre_cliente' => $request->nombre_cliente,
        'telefono_cliente' => $request->telefono_cliente,
        'modelo_celular' => $request->modelo_celular,
        'descripcion_problema' => $request->descripcion_problema,
        'costo_estimado' => $request->costo_estimado,
        'gastos' => $request->gastos,
        'ganancia' => $request->costo_estimado - $request->gastos, // Calculamos la ganancia
        'fecha_recepcion' => now(),
    ]);

    return redirect()->route('reparaciones.index')->with('success', 'Reparación registrada con éxito.');
}
public function update(Request $request, Reparacion $reparacion)
{
    $request->validate([
        'costo_estimado' => 'required|numeric',
        'gastos' => 'required|numeric|min:0',
    ]);

    $reparacion->update([
        'costo_estimado' => $request->costo_estimado,
        'gastos' => $request->gastos,
        'ganancia' => $request->costo_estimado - $request->gastos, // Recalcular ganancia
    ]);

    return redirect()->route('reparaciones.index')->with('success', 'Reparación actualizada con éxito.');
}
public function solicitar()
{
    return view('reparaciones.solicitar'); // Asegúrate de tener esta vista en resources/views/reparaciones/
}

     public function guardar(Request $request)
     {
         // Validar los datos recibidos
         $validatedData = $request->validate([
             'nombre_cliente' => 'required|string|max:255',
             'descripcion' => 'required|string|max:500',
             'telefono' => 'required|string|max:15',
             // Agrega más campos según tus necesidades
         ]);
 
         // Crear una nueva reparación con los datos validados
         $reparacion = new Reparacion();
         $reparacion->nombre_cliente = $validatedData['nombre_cliente'];
         $reparacion->descripcion = $validatedData['descripcion'];
         $reparacion->telefono = $validatedData['telefono'];
         // Asigna más campos según lo que necesites
         $reparacion->save(); // Guarda la reparación en la base de datos
 
         // Redirigir al usuario a una página de éxito o de las reparaciones
         return redirect()->route('reparaciones.index')->with('success', 'Reparación guardada con éxito.');
     }
 
}


