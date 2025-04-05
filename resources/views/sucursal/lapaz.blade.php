@extends('layouts.app')

@section('content')
    <h1 class="text-center text-red-600 text-2xl font-bold">Sucursal La Paz</h1>
    <p class="text-center text-gray-700">Aquí puedes registrar y gestionar las reparaciones.</p>
@endsection

<!-- Buscador por Nombre de Cliente -->
<div class="max-w-4xl mx-auto mt-4">
    <input type="text" id="buscador" placeholder="Buscar por nombre" class="w-full border border-gray-300 rounded p-2">
</div>

<!-- Botón para ver las cuentas diarias -->
<div class="text-center mt-6">
    <button id="btnVerCuentas" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Ver Cuentas Diarias
    </button>
</div>

<script>
    document.getElementById('btnVerCuentas').addEventListener('click', function() {
        fetch('/cuentas-diarias')
            .then(response => response.json())
            .then(data => {
                alert("Total de ventas del día: Bs " + data.total);
            })
            .catch(error => {
                console.log('Error al obtener las cuentas diarias:', error);
            });
    });
</script>

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center text-red-600">Recepción de Celulares</h2>
    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mt-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-500 text-white p-3 rounded mt-4">
        {{ session('error') }}
    </div>
@endif

    
    <!-- Formulario de Registro -->
    <form action="/registro-celular" method="POST">

    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-black font-semibold">Fecha de Recepción</label>
            <input type="date" name="fecha_recepcion" class="w-full border border-gray-300 rounded p-2" required>
        </div>
        <div>
            <label class="block text-black font-semibold">Fecha de Entrega</label>
            <input type="date" name="fecha_entrega" class="w-full border border-gray-300 rounded p-2" required>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4 mt-4">
        <div>
            <label class="block text-black font-semibold">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" class="w-full border border-gray-300 rounded p-2" required>
        </div>
        <div>
            <label class="block text-black font-semibold">Número de Celular</label>
            <input type="text" name="telefono" class="w-full border border-gray-300 rounded p-2" required>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-black font-semibold">Modelo del Celular</label>
        <input type="text" name="modelo" class="w-full border border-gray-300 rounded p-2" required>
    </div>
    <div class="mt-4">
        <label class="block text-black font-semibold">Motivo de Reparación</label>
        <textarea name="motivo" class="w-full border border-gray-300 rounded p-2" required></textarea>
    </div>
    <div class="mt-4">
        <label class="block text-black font-semibold">Costo de Reparación</label>
        <input type="number" name="costo_reparacion" class="w-full border border-gray-300 rounded p-2" required>
    </div>
    <div class="mt-4">
        <label class="block text-black font-semibold">Costo de Repuestos</label>
        <input type="number" name="costo_repuestos" class="w-full border border-gray-300 rounded p-2" required>
    </div>
    <!-- Aquí agregamos el campo 'estado' -->
    <div class="mt-4">
        <label class="block text-black font-semibold">Estado</label>
        <select name="estado" class="w-full border border-gray-300 rounded p-2" required>
            <option value="pendiente">Pendiente</option>
            <option value="en_proceso">En Proceso</option>
            <option value="finalizado">Finalizado</option>
        </select>
    </div>
    <button type="submit" class="mt-4 w-full bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
        Registrar Celular
    </button>
</form>

    <!-- Tabla de Celulares en Reparación -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold text-black text-center">Estado de los Celulares</h3>
        <table class="w-full mt-4 border border-gray-300" id="tablaClientes">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="p-2">Cliente</th>
                    <th class="p-2">Modelo</th>
                    <th class="p-2">Estado</th>
                    <th class="p-2">Costo</th>
                    <th class="p-2">Fecha de Entrega</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($celulares as $celular)
                    <tr class="text-center border-t">
                        <td class="p-2">{{ $celular->nombre_cliente }}</td>
                        <td class="p-2">{{ $celular->modelo }}</td>
                        <td class="p-2">{{ $celular->estado }}</td>
                        <td class="p-2 text-green-600 font-bold">Bs {{ $celular->costo_reparacion }}</td>
                        <td class="p-2">{{ $celular->fecha_entrega }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('buscador').addEventListener('input', function() {
        let filtro = this.value.toLowerCase();
        let filas = document.querySelectorAll("#tablaClientes tbody tr");
        filas.forEach(fila => {
            let nombre = fila.children[0].textContent.toLowerCase();
            fila.style.display = nombre.includes(filtro) ? "" : "none";
        });
    });
</script>
