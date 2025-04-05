@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-center text-red-600">Sucursal {{ $nombre }}</h1>

    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-4">Recepción de Celulares</h2>
        <form action="{{ route('sucursal.recepcion') }}" method="POST">
            @csrf
            <input type="hidden" name="sucursal" value="{{ $nombre }}">
            <input type="text" name="nombre_cliente" placeholder="Nombre del Cliente" class="w-full p-2 border rounded mb-2">
            <input type="text" name="telefono" placeholder="Teléfono" class="w-full p-2 border rounded mb-2">
            <input type="text" name="marca" placeholder="Marca del Celular" class="w-full p-2 border rounded mb-2">
            <textarea name="descripcion" placeholder="Descripción del Problema" class="w-full p-2 border rounded mb-2"></textarea>
            <input type="number" name="costo_reparacion" placeholder="Costo de Reparación" class="w-full p-2 border rounded mb-2">
            <input type="number" name="costo_repuestos" placeholder="Costo de Repuestos" class="w-full p-2 border rounded mb-2">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Registrar</button>
        </form>
    </div>
    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-4">Lista de Celulares</h2>
        <table class="w-full border-collapse border border-gray-300">
            <tr class="bg-gray-200">
                <th class="border p-2">Cliente</th>
                <th class="border p-2">Marca</th>
                <th class="border p-2">Estado</th>
                <th class="border p-2">Acción</th>
            </tr>
            @foreach($celulares as $celular)
            <tr>
                <td class="border p-2">{{ $celular->nombre_cliente }}</td>
                <td class="border p-2">{{ $celular->marca }}</td>
                <td class="border p-2">{{ $celular->estado }}</td>
                <td class="border p-2">
                    <form action="{{ route('sucursal.actualizarEstado') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $celular->id }}">
                        <select name="estado" class="p-1 border">
                            <option value="En revisión">En revisión</option>
                            <option value="Reparado">Reparado</option>
                            <option value="Listo para entregar">Listo para entregar</option>
                        </select>
                        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Actualizar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
