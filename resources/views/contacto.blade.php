<!-- resources/views/contacto.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importadora Martínez - Reparación de Celulares </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero-bg {
            background: linear-gradient(to right, rgba(255, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('https://source.unsplash.com/1600x900/?electronics,repair');
            background-size: cover;
            background-position: center;
        }

        /* Texto animado con color blanco */
        .hero-title {
            color: white;
            font-family: 'Arial', sans-serif;
            font-size: 5rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
            animation: moveText 3s ease infinite;
        }
        @keyframes moveText {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        .hero-subtitle {
            font-family: 'Arial', sans-serif;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
            font-size: 1.25rem;
            color: white;
            animation: moveUp 1s ease-in-out infinite;
        }

        /* Animación de movimiento sutil */
        @keyframes moveUp {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        /* Botones con animación de color */
        .btn {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.4s ease;
        }
        .btn:hover {
            background: linear-gradient(90deg, rgba(255, 0, 0, 1), rgba(0, 0, 0, 1), rgba(255, 0, 0, 1));
            color: white;
            transform: scale(1.1);
        }

    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Navbar -->
    <nav class="bg-red-600 p-4 flex justify-between items-center text-white">
        <h1 class="text-2xl font-bold">IMPORTADORA MARTINEZ</h1>
        <ul class="flex space-x-4">
            <li><a href="#" class="hover:underline">trabaja con nosotros</a></li>
            <li><a href="#" class="hover:underline">Contacto</a></li>
            <a href="{{ url('login') }}" class="bg-white text-red-600 px-4 py-2 rounded-lg font-bold hover:bg-gray-200">Iniciar sesión</a>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero-bg text-white text-center py-30">
        <h2 class="hero-title">siguenos en nuestras redes sociales </h2>
        <p class="hero-subtitle text-white mt-4">WhatsApp</p>
        <p class="hero-subtitle text-white mt-4">Facebook</p>
        <p class="hero-subtitle text-white mt-4">Tik Tok</p> 
        
    </div>
</body>
</html>
