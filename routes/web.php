<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparacionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Celular;
use App\Http\Controllers\SolicitudReparacionController;
use App\Http\Controllers\CelularController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TrabajaController;
use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome'); // Asegúrate de que esta vista sea la correcta
});


//ruta para creacion de usuarios
Route::get('usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('usuarios/store', [UserController::class, 'store'])->name('usuarios.store');

// Ruta para la vista de añadir productos
Route::get('/almacen/agregar', [InventarioController::class, 'agregar'])->name('almacen.agregar');

// Ruta para la vista de despacho de productos
Route::get('/almacen/despachar', [InventarioController::class, 'despachar'])->name('almacen.despachar');

// Ruta para almacenar productos en el inventario
Route::post('/almacen', [InventarioController::class, 'store'])->name('almacen.store');

// Ruta para registrar la salida (despacho)
Route::post('/inventario/retirar', [InventarioController::class, 'retirar'])->name('inventario.retirar');

// Ruta para mostrar el inventario
Route::get('/almacen', [InventarioController::class, 'index'])->name('almacen.index');

// Ruta para almacenar productos en el inventario
Route::post('/almacen', [InventarioController::class, 'store'])->name('almacen.store');

// Ruta para registrar la salida de productos hacia las sucursales
Route::post('/salida', [InventarioController::class, 'salida'])->name('salida.store');

// Ruta para obtener las cuentas diarias
Route::get('/cuentas-diarias', [ReciboController::class, 'obtenerCuentasDiarias']);
Route::get('/sucursal/{sucursal}/cuentas-diarias', [CelularController::class, 'cuentasDiarias'])->name('cuentas.diarias');

// Ruta contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto.index');

// Ruta para "Trabaja con Nosotros" usando un controlador
Route::get('/trabaja', [TrabajaController::class, 'index'])->name('trabaja.index');

// Ruta para procesar el formulario
Route::post('/trabaja', [TrabajaController::class, 'submit'])->name('trabaja.submit');

// Controlador de celular
Route::get('/celulares', [CelularController::class, 'index'])->name('celulares.index');

// Ruta para mostrar los detalles de un celular y su sucursal
Route::get('/sucursal/{nombre}', [SucursalController::class, 'index'])->name('sucursal.index');

// Control para el perfil de usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::post('/perfil/actualizar', [PerfilController::class, 'update'])->name('perfil.update');
});

// Ruta para el registro de un celular
Route::post('/registro-celular', [CelularController::class, 'store'])->name('registro.celular');

// Mostrar celulares por sucursal
Route::get('/sucursal/lapaz', [SucursalController::class, 'lapaz'])->name('sucursal.lapaz');
Route::get('/sucursal/upea', [SucursalController::class, 'upea'])->name('sucursal.upea');
Route::get('/sucursal/ceja', [SucursalController::class, 'ceja'])->name('sucursal.ceja');

// Ruta para la recepción de celulares en sucursal
Route::post('/sucursal/recepcion', [SucursalController::class, 'recepcion'])->name('sucursal.recepcion');

// Actualizar estado de un celular
Route::post('/sucursal/actualizar-estado', [SucursalController::class, 'actualizarEstado'])->name('sucursal.actualizarEstado');

// Generar reporte de la sucursal
Route::get('/sucursal/reporte/{nombre}', [SucursalController::class, 'generarReporte'])->name('sucursal.reporte');

// Solicitar reparación de un celular
Route::post('/solicitud-reparacion', [SolicitudReparacionController::class, 'store'])->name('solicitud.reparacion.store');

// Ruta principal de la página
Route::get('/', function () {
    return view('welcome');
});

// Ruta para actualizar el estado del celular desde la sucursal
Route::patch('/actualizar-estado/{id}', function (Request $request, $id) {
    $celular = Celular::findOrFail($id);
    $celular->estado = $request->estado;
    $celular->save();
    return redirect()->back()->with('success', 'Estado actualizado correctamente.');
})->name('actualizar.estado');

// Controladores de sucursal
Route::get('/sucursal/lapaz', [SucursalController::class, 'lapaz'])->name('sucursal.lapaz');
Route::get('/sucursal/upea', [SucursalController::class, 'upea'])->name('sucursal.upea');
Route::get('/sucursal/ceja', [SucursalController::class, 'ceja'])->name('sucursal.ceja');

// Controladores de usuario
Route::get('/create-user', [UserController::class, 'createUser']);

// Ruta dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Ruta para la solicitud
Route::get('/solicitud', function () {
    return view('solicitud');
})->name('solicitud');

// Procesar solicitud
Route::post('/solicitud/enviar', function (Request $request) {
    return back()->with('success', 'Solicitud enviada correctamente');
})->name('solicitud.enviar');

// Solicitar reparación de celular
Route::post('/solicitar-reparacion', [ReparacionController::class, 'store'])->name('solicitar.reparacion.store');

// Listado de sucursales
Route::get('/sucursales', [SucursalController::class, 'index'])->name('sucursales.index');

// Ruta para el dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Ruta de las reparaciones
Route::resource('reparaciones', ReparacionController::class);
Route::get('/reparaciones', [ReparacionController::class, 'index'])->name('reparaciones.index');
Route::get('/reparaciones/pendientes', [ReparacionController::class, 'pendientes'])->name('reparaciones.pendientes');
Route::get('/reparaciones/entregadas', [ReparacionController::class, 'entregadas'])->name('reparaciones.entregadas');
Route::post('/reparaciones/cerrar-dia', [ReparacionController::class, 'cerrarDia'])->name('reparaciones.cerrarDia');
Route::get('/reparaciones/create', [ReparacionController::class, 'create'])->name('reparaciones.create');
Route::post('/reparaciones', [ReparacionController::class, 'store'])->name('reparaciones.store');

// ruta para registrar celulares 
Route::post('/celulares/registro', [CelularController::class, 'store'])->name('celulares.store');
Route::post('/celulares/actualizar-estado', [CelularController::class, 'actualizarEstado'])->name('celulares.actualizarEstado');

// rutas para dirigir a las sucursales al usuario
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/sucursal/lapaz', function () {
    return view('sucursales.lapaz');
})->name('sucursal.lapaz');

Route::get('/sucursal/upea', function () {
    return view('sucursales.upea');
})->name('sucursal.upea');

Route::get('/sucursal/ceja', function () {
    return view('sucursales.ceja');
})->name('sucursal.ceja');
