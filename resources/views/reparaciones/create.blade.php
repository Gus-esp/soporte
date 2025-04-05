@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recepción de Celular para Reparación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reparaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" class="form-control" value="{{ old('nombre_cliente') }}" required>
        </div>
        <div class="form-group">
            <label for="telefono_cliente">Teléfono del Cliente</label>
            <input type="text" name="telefono_cliente" class="form-control" value="{{ old('telefono_cliente') }}" required>
        </div>
        <div class="form-group">
            <label for="modelo_celular">Modelo del Celular</label>
            <input type="text" name="modelo_celular" class="form-control" value="{{ old('modelo_celular') }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion_problema">Descripción del Problema</label>
            <textarea name="descripcion_problema" class="form-control" required>{{ old('descripcion_problema') }}</textarea>
        </div>
        <div class="form-group">
            <label for="costo_estimado">Costo Estimado de Reparación</label>
            <input type="number" name="costo_estimado" class="form-control" step="0.01" value="{{ old('costo_estimado') }}" required>
        </div>
        <div class="mb-3">
            <label for="gastos" class="form-label">Gastos de Reparación</label>
            <input type="number" name="gastos" class="form-control" required>
        </div>
        <!-- Este campo ya no es necesario -->
        <!-- <div class="form-group">
            <label for="estado">Estado de la Reparación</label>
            <select name="estado" class="form-control">
                <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En reparación" {{ old('estado') == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                <option value="Reparado" {{ old('estado') == 'Reparado' ? 'selected' : '' }}>Reparado</option>
                <option value="Entregado" {{ old('estado') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
            </select>
        </div> -->

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
