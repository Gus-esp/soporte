@extends('layouts.app')

@section('content')
    <h1 class="text-center text-2xl font-bold">Cuentas Diarias - {{ ucfirst($sucursal) }}</h1>
    <p class="text-center text-gray-700">Resumen del día {{ $fechaHoy }}</p>

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
        <p class="text-lg font-semibold">Total Reparaciones: <span class="text-green-600">Bs {{ $totalReparaciones }}</span></p>
        <p class="text-lg font-semibold">Total Repuestos: <span class="text-red-600">Bs {{ $totalRepuestos }}</span></p>
        <p class="text-lg font-semibold">Ganancia del Día: <span class="text-blue-600">Bs {{ $gananciaDiaria }}</span></p>
    </div>
@endsection
