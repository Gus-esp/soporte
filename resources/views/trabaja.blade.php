<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabaja con Nosotros - Importadora Martínez</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Aquí puedes agregar estilos específicos si los necesitas */
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-red-600 to-red-800 p-6 flex justify-between items-center text-white shadow-lg rounded-b-lg">
        <img src="{{ asset('imagenes/logo2.jpg') }}" alt="Logo Importadora Martínez" class="h-10 w-20">
        <ul class="flex space-x-4">
            <li>
                <a href="{{ route('trabaja.index') }}" class="text-lg font-semibold hover:text-red-200 transition duration-300 transform hover:scale-105">Trabaja con Nosotros</a>
            </li>
            <li>
                <a href="{{ route('contacto.index') }}" class="text-lg font-semibold hover:text-red-200 transition duration-300 transform hover:scale-105">Contacto</a>
            </li>
        </ul>
    </nav>

    <!-- Sección Trabaja con Nosotros -->
    <section id="trabaja" class="bg-white py-20 text-gray-700">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-semibold text-red-600 mb-6">¡ÚNETE A NUESTRO EQUIPO!</h2>
            <p class="text-lg mb-12">¿Te apasiona el mundo de la tecnología y quieres ser parte de un equipo dinámico? ¡Trabaja con nosotros!</p>

            <!-- Requisitos -->
            <div class="mb-12">
                <h3 class="text-2xl font-semibold text-gray-800">Requisitos</h3>
                <ul class="list-disc list-inside text-left text-lg mx-auto max-w-lg">
                    <li>Experiencia en reparación de celulares.</li>
                    <li>Actitud positiva y orientación al cliente.</li>
                    <li>Capacidad para trabajar en equipo.</li>
                    <li>Disponibilidad para jornada completa.</li>
                    <li>Responsabilidad y puntualidad.</li>
                </ul>
            </div>

            <!-- Formulario de Solicitud -->
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Formulario de Solicitud</h3>
                <form action="{{ route('trabaja.submit') }}" method="POST" class="max-w-lg mx-auto">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-left text-gray-800 font-semibold">Nombre Completo</label>
                        <input type="text" name="nombre" id="nombre" class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-left text-gray-800 font-semibold">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600" required>
                    </div>

                    <div class="mb-4">
                        <label for="telefono" class="block text-left text-gray-800 font-semibold">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600" required>
                    </div>

                    <div class="mb-4">
                        <label for="mensaje" class="block text-left text-gray-800 font-semibold">Mensaje</label>
                        <textarea name="mensaje" id="mensaje" rows="4" class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-red-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-red-700 transition-all duration-300">
                        Enviar Solicitud
                    </button>
                    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
        <strong>¡Éxito!</strong> {{ session('success') }}
    </div>
@endif

                </form>
            </div>
        </div>
    </section>

</body>
</html>
