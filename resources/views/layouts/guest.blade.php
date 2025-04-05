<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Cargar estilos y scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Estilos adicionales -->
        <style>
            /* Imagen de fondo */
            body {
                background: url('/imagenes/fondo.png') no-repeat center center fixed;
                background-size: cover;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Agregar un filtro de color rojo con transparencia */
            .overlay {
                background: rgba(183, 28, 28, 0.6); /* Rojo oscuro con opacidad */
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            /* Tarjeta de login */
            .login-container {
                position: relative;
                z-index: 10;
                background: white;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
                max-width: 400px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <!-- Capa roja transparente sobre la imagen -->
        <div class="overlay"></div>

        <!-- Contenedor del login -->
        <div class="login-container">
            <h2 class="text-2xl font-bold text-center text-red-600 mt-4">Bienvenido</h2>
            <p class="text-center text-gray-600">Ingresa tus datos para continuar</p>

            <div class="mt-6">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
