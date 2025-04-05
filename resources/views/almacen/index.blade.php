<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="flex h-screen">
        <!-- Menú Lateral -->
        <aside class="w-64 bg-red-700 text-white p-5 space-y-6">
            <h1 class="text-2xl font-bold">📦 Inventario</h1>
            <nav>
                <a href="{{ route('almacen.index') }}" class="block py-2 px-4 rounded hover:bg-red-800">📊 Inicio</a>
                <a href="{{ route('almacen.agregar') }}" class="block py-2 px-4 rounded hover:bg-red-800">🛒 Añadir Productos</a>    
                <a href="{{ route('almacen.despachar') }}" class="block py-2 px-4 rounded hover:bg-red-800">📦 Despacho de Productos</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-red-800">👥 Reportes</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-red-800">⚙️ Configuración</a>
            </nav>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 p-6">   
            <h2 class="text-3xl font-bold text-red-700">Dashboard</h2>

            <!-- Resumen de cantidades -->
            <div class="grid grid-cols-4 gap-4 mt-6">
                <div class="bg-blue-600 text-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-bold">📦 Material de Oficina</h3>
                    <p class="text-2xl">{{ $productos->where('tipo_producto', 'material_oficina')->sum('cantidad') }}</p>
                </div>
                <div class="bg-green-600 text-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-bold">📺 Pantallas</h3>
                    <p class="text-2xl">{{ $productos->where('tipo_producto', 'pantalla')->sum('cantidad') }}</p>
                </div>
                <div class="bg-purple-600 text-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-bold">🔍 Micas</h3>
                    <p class="text-2xl">{{ $productos->where('tipo_producto', 'mica')->sum('cantidad') }}</p>
                </div>
                <div class="bg-yellow-600 text-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-bold">🛠 Herramientas de Trabajo</h3>
                    <p class="text-2xl">{{ $productos->where('tipo_producto', 'herramienta')->sum('cantidad') }}</p>
                </div>
            </div>

            <!-- Mensajes de éxito o error -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Tabla de Inventario -->
            <h3 class="text-2xl font-bold text-red-700 mt-8">Inventario</h3>
            
            @foreach(['material_oficina' => '📦 Material de Oficina', 'pantalla' => '📺 Pantallas', 'mica' => '🔍 Micas', 'herramienta' => '🛠 Herramientas de Trabajo'] as $tipo => $nombreTipo)
                @php
                    $productosFiltrados = $productos->where('tipo_producto', $tipo);
                @endphp

                @if($productosFiltrados->isNotEmpty())
                    <h4 class="text-xl font-semibold mt-6 text-gray-700">{{ $nombreTipo }}</h4>
                    <table class="w-full mt-2 border border-gray-300">
                        <thead class="bg-red-600 text-white">
                            <tr>
                                <th class="p-2">Producto</th>
                                <!-- Mover la columna de Calidad aquí, después de Producto -->
                                @if($tipo == 'pantalla')
                                    <th class="p-2">Calidad</th>
                                @endif
                                <th class="p-2">Descripción</th>
                                <th class="p-2">Cantidad</th>
                                <th class="p-2">Precio Unitario</th>
                                <th class="p-2">Precio Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($productosFiltrados as $producto)
                                <tr class="border-t">
                                    <td class="p-2 font-bold">{{ $producto->modelo }}</td>
                                    <!-- Mostrar Calidad solo para Pantallas -->
                                    @if($producto->tipo_producto == 'pantalla')
                                        <td class="p-2">{{ $producto->calidad }}</td>
                                    @endif
                                    <td class="p-2 text-gray-600">{{ $producto->descripcion }}</td>
                                    <td class="p-2 font-semibold">{{ $producto->cantidad }}</td>
                                    <td class="p-2 text-green-600 font-semibold">${{ number_format($producto->precio_unitario, 2) }}</td>
                                    <td class="p-2 text-green-600 font-semibold">${{ number_format($producto->precio_unitario * $producto->cantidad, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endforeach
        </main>
    </div>
</body>
</html>
