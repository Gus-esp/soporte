<?php

namespace App\Http\Controllers;

use App\Models\SalidaInventario;
use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Producto; 
 
class InventarioController extends Controller
{
   
    public function index()
    {
        $productos = Inventario::all(); // No Producto, sino Inventario
        return view('almacen.index', compact('productos'));
    }
    public function agregar()
{
    // Aquí puedes cargar datos si es necesario para la vista
    return view('almacen.agregar'); // Asegúrate de tener la vista 'almacen.agregar' creada
}


    // Método para la vista de despachar productos
    public function despachar()
    {
        $inventarios = Inventario::all(); // Obtener todos los productos del inventario
        return view('almacen.despachar', compact('inventarios')); // Vista para despachar productos
    }

    // Método para almacenar productos en el inventario
    public function store(Request $request)
    {
        // Lógica para almacenar el producto en la base de datos
        $producto = new Inventario();
        $producto->tipo_producto = $request->tipo_producto;
        $producto->modelo = $request->modelo;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->precio_unitario = $request->precio_unitario;
        $producto->save();

        return redirect()->route('almacen.agregar')->with('success', 'Producto añadido correctamente');
    }

    // Método para retirar productos del inventario
    public function retirar(Request $request)
    {
        $producto = Inventario::findOrFail($request->producto_id);
        $producto->cantidad -= $request->cantidad; // Descontamos la cantidad
        $producto->save();

        return redirect()->route('almacen.despachar')->with('success', 'Producto despachado correctamente');
    }
}
