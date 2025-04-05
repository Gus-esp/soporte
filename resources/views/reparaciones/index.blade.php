@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Reparaciones</h1>

    <!-- Botones para filtrar las reparaciones -->
    <div class="mb-3">
        <a href="{{ route('reparaciones.create') }}" class="btn btn-success">Nueva Reparación</a>
        <a href="{{ route('reparaciones.pendientes') }}" class="btn btn-warning">Reparaciones Pendientes</a>
        <a href="{{ route('reparaciones.entregadas') }}" class="btn btn-primary">Reparaciones Entregadas</a>
    </div>

    <!-- Resumen de Cuentas Diarias -->
    <h2>Resumen de Cuentas Diarias</h2>
    <div class="row">
        <div class="col-md-6">
            <h4>Gastos Diarios</h4>
            <p><strong>{{ number_format($gastos_totales, 2) }} Bs</strong></p>
        </div>
        <div class="col-md-6">
            <h4>Ganancias Diarias</h4>
            <p><strong>{{ number_format($ganancias_totales, 2) }} Bs</strong></p>
        </div>
    </div>

    <!-- Tabla de reparaciones -->
    <h3>Reparaciones</h3>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre Cliente</th>
                <th>Teléfono</th>
                <th>Modelo Celular</th>
                <th>Descripción del Problema</th>
                <th>Costo Estimado</th>
                <th>Gastos</th>
                <th>Ganancia</th>
                <th>Fecha de Recepción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reparaciones as $reparacion)
            <tr>
                <td>{{ $reparacion->nombre_cliente }}</td>
                <td>{{ $reparacion->telefono_cliente }}</td>
                <td>{{ $reparacion->modelo_celular }}</td>
                <td>{{ $reparacion->descripcion_problema }}</td>
                <td>{{ number_format($reparacion->costo_estimado, 2) }} Bs</td>
                <td>{{ number_format($reparacion->gastos, 2) }} Bs</td>
                <td><strong>{{ number_format($reparacion->ganancia, 2) }} Bs</strong></td>
                <td>{{ $reparacion->fecha_recepcion }}</td>
                <td>{{ ucfirst($reparacion->estado) }}</td>
                <td>
                    <a href="{{ route('reparaciones.show', $reparacion->id) }}" class="btn btn-info btn-sm">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $reparaciones->links() }}
</div>
@endsection
