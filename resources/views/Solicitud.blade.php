<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Reparación</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-xl font-bold text-center text-red-600">Solicitud de Reparación</h1>
        <p class="text-center text-gray-700">Completa el formulario para solicitar la reparación de tu dispositivo.</p>
    </div>

    <!-- Formulario de Solicitud -->
    <div id="solicitud" class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
        <h2 class="text-2xl font-semibold mb-4 text-center text-black">Solicitar Revisión o Reparación</h2>
        
        <form action="{{ route('solicitud.reparacion.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-black font-semibold">Nombre</label>
                <input type="text" name="nombre" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" required>
            </div>
            <div class="mb-4">
                <label class="block text-black font-semibold">Teléfono</label>
                <input type="text" name="telefono" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" required>
            </div>
            <div class="mb-4">
                <label class="block text-black font-semibold">Marca del Celular</label>
                <input type="text" name="marca" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" required>
            </div>
            <div class="mb-4">
                <label class="block text-black font-semibold">Descripción del Problema</label>
                <textarea name="descripcion" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-black font-semibold">Selecciona una Sucursal</label>
                <select name="sucursal" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" required>
                    <option value="La Paz">La Paz</option>
                    <option value="UPEA">UPEA</option>
                    <option value="Ceja">Ceja</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Enviar Solicitud</button>
        </form>
    </div>
</body>
</html>
