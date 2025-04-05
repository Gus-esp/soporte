@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
        <h3 class="text-3xl font-bold text-red-700 text-center mb-6">Añadir Producto</h3>

        <form action="{{ route('almacen.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold">Tipo de Producto</label>
                <select name="tipo_producto" id="tipo_producto" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
                    <option value="material_oficina">Material de Oficina</option>
                    <option value="pantalla">Pantalla</option>
                    <option value="mica">Mica</option>
                    <option value="herramientas_de_trabajo">Herramientas de Trabajo</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Modelo</label>
                <input type="text" name="modelo" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Descripción</label>
                <textarea name="descripcion" required rows="3"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-400"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold">Cantidad</label>
                    <input type="number" name="cantidad" required min="1"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold">Precio Unitario (Bs)</label>
                    <input type="number" name="precio_unitario" required min="0" step="0.01"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>
            </div>

            <!-- Campo de Calidad (Solo visible si se selecciona 'Pantalla') -->
            <div id="calidad-container" class="hidden">
                <label class="block text-gray-700 font-semibold">Calidad</label>
                <select name="calidad" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
                    <option value="alta">original</option>
                    <option value="media">amoled</option>
                    <option value="baja">incel</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-red-800 text-black font-semibold px-4 py-2 rounded-lg mt-4 transition-transform transform hover:scale-105 hover:bg-red-600">
                Añadir Producto
            </button>
        </form>
    </div>

    <!-- Script para mostrar el campo de calidad solo si se selecciona "Pantalla" -->
    <script>
        document.getElementById('tipo_producto').addEventListener('change', function() {
            var tipoProducto = this.value;
            var calidadContainer = document.getElementById('calidad-container');

            // Muestra el campo de calidad solo si se selecciona "Pantalla"
            if (tipoProducto === 'pantalla') {
                calidadContainer.classList.remove('hidden');
            } else {
                calidadContainer.classList.add('hidden');
            }
        });
    </script>
@endsection
