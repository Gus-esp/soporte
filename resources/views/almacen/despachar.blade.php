@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
        <h3 class="text-3xl font-bold text-red-700 text-center mb-6">Despachar Producto</h3>
        <!-- Buscador de productos -->
        <div class="mb-4">
            <input type="text" id="buscador" placeholder="Buscar producto..." 
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div id="productos">
            @foreach($inventarios as $producto)
                <div class="bg-gray-100 p-4 mt-4 rounded-lg shadow-md">
                    <h4 class="text-lg font-bold text-gray-800">{{ $producto->modelo }}</h4>
                    <p class="text-gray-600">Disponible: <span class="font-semibold">{{ $producto->cantidad }}</span> unidades</p>
                    <form action="{{ route('inventario.retirar') }}" method="POST" class="mt-2 grid gap-3">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                        <div class="flex space-x-2">
                            <input type="number" name="cantidad" placeholder="Cantidad" required min="1" max="{{ $producto->cantidad }}"
                                class="border border-gray-300 rounded-lg p-2 w-24 focus:outline-none focus:ring-2 focus:ring-red-400">

                            <select name="sucursal" required class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400">
                                <option value="" disabled selected>Seleccionar Sucursal</option>
                                <option value="La Paz">La Paz</option>
                                <option value="Cochabamba">Cochabamba</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                            </select>
                        </div>
                        <input type="text" name="responsable" placeholder="Nombre de quien lo lleva" required
                            class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg transition-transform transform hover:scale-105 hover:bg-red-600">
                            Despachar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        document.getElementById('buscador').addEventListener('input', function() {
            let filtro = this.value.toLowerCase();
            let productos = document.querySelectorAll("#productos > div");

            productos.forEach(producto => {
                let nombre = producto.querySelector("h4").textContent.toLowerCase();
                producto.style.display = nombre.includes(filtro) ? "" : "none";
            });
        });
    </script>
@endsection
