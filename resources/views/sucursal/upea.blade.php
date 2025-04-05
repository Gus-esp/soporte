@extends('layouts.app')

@section('content')
    <h1 class="text-center text-red-600 text-2xl font-bold">Sucursal UPEA</h1>
    <p class="text-center text-gray-700">Aquí puedes registrar y gestionar las reparaciones.</p>
@endsection

<!-- Botón para ver las cuentas diarias -->
<div class="text-center mt-6">
    <button id="btnVerCuentas" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Ver Cuentas Diarias
    </button>
</div>

 <!-- scrip del boton de cuentas diarias-->
<script>
    document.getElementById('btnVerCuentas').addEventListener('click', function() {
        // Llamar a la API para obtener las cuentas diarias
        fetch('/cuentas-diarias')
            .then(response => response.json())
            .then(data => {
                // Mostrar el total en un alert
                alert("Total de ventas del día: Bs " + data.total);
            })
            .catch(error => {
                console.log('Error al obtener las cuentas diarias:', error);
            });
    });
</script>

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
<a href="{{ route('cuentas.diarias', request()->segment(2)) }}" class="mt-4 w-full block text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    Ver Cuentas Diarias
</a>
    <h2 class="text-2xl font-bold text-center text-red-600">Recepción de Celulares - {{ ucfirst(request()->segment(2)) }}</h2>
    
    <!-- Formulario de Registro -->
    <form action="{{ route('registro.celular') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="sucursal" value="{{ request()->segment(2) }}">
        <div class="grid grid-cols-2 gap-4">
        <div class="mt-4">
    <label class="block text-black font-semibold">Fecha de Recepción</label>
    <input type="date" name="fecha_recepcion" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-red-600" required>
</div>
      <div>
             <label class="block text-black font-semibold">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-red-600" required>
        </div>
     <div>
                <label class="block text-black font-semibold">Teléfono</label>
                <input type="text" name="telefono" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-red-600" required>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-black font-semibold">Modelo del Celular</label>
            <input type="text" name="modelo" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-red-600" required>
        </div>
        <div class="mt-4">
            <label class="block text-black font-semibold">Motivo de Reparación</label>
            <textarea name="motivo" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-red-600" required></textarea>
        </div>
        <div class="mt-4">
            <label class="block text-black font-semibold">Costo de Reparación</label>
            <input type="number" name="costo_reparacion" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-red-600" required>
        </div>
        <div class="mt-4">
            <label class="block text-black font-semibold">Costo de Repuestos</label>
            <input type="number" name="costo_repuestos" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-red-600" required>
        </div>
        <button type="submit" class="mt-4 w-full bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Registrar Celular
        </button>
    </form>

    <!-- Tabla de Celulares en Reparación -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold text-black text-center">Estado de los Celulares</h3>
        <table class="w-full mt-4 border border-gray-300">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="p-2">Cliente</th>
                    <th class="p-2">Modelo</th>
                    <th class="p-2">Estado</th>
                    <th class="p-2">Costo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($celulares as $celular)
                    <tr class="text-center border-t">
                        <td class="p-2">{{ $celular->nombre_cliente }}</td>
                        <td class="p-2">{{ $celular->modelo }}</td>
                        <td class="p-2">{{ $celular->estado }}</td>
                        <td class="p-2 text-green-600 font-bold">Bs {{ $celular->costo_reparacion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
