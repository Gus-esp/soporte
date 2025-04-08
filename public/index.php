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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <style>
       .hero-bg {                                   
        background: linear-gradient(to right, rgba(255, 151, 151, 0.8), rgb(253, 72, 72), rgba(255, 151, 151, 0.8)),   url("{{ asset('imagenes/fondo2.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Hace que el fondo permanezca fijo al hacer scroll */
    }
        /* Texto animado con gradiensswedredrwsedr4te */
        .hero-title {
            background: linear-gradient(90deg, rgb(255, 220, 220), rgb(255, 255, 255), rgb(255, 220, 220));
            -webkit-background-clip: text;
            color: transparent;
            font-family: 'Arial', sans-serif;
            font-size: 5rem;
            font-weight: bold;
            animation: gradient 3s ease infinite;
        }
        .hero-tg {
            background-image:  linear-gradient(to right, rgba(119, 119, 119, 0.8), rgba(120, 119, 119, 0.8)), url("{{ asset('imagenes/fondo22.png') }}"); /* Reemplaza con la URL de tu imagen */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            text-align: center;
            padding: 200px 10px; /* Ajusta según sea necesario */
            position: relative;
            z-index: 1;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
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
            background: linear-gradient(90deg, rgba(255, 0, 0, 1), rgb(245, 199, 199), rgba(255, 0, 0, 1));
            color: white;
            transform: scale(1.1);
        }
        /*seccion de la ola*/
        .custom-wave {
            position: relative;
            width: 100%;
            margin-top: -100px; /* Ajusta la superposición con Hero */
        }
    </style>
</head>

<body class="hero-bg text-gray-700">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-red-600 to-red-800 p-6 flex justify-between items-center text-white shadow-lg rounded-b-lg">
      <img src="{{ asset('imagenes/logo2.jpg') }}" alt="Logo Importadora Martínez" class="h-10 w-20">
    <ul class="flex space-x-4">
    <li>
        <a href="/welcome" class="text-lg font-semibold hover:text-red-200 transition duration-300 transform hover:scale-105">
            inicio
        </a>
        </li>
        <li>
        <a href="{{ route('trabaja.index') }}" class="text-lg font-semibold hover:text-red-200 transition duration-300 transform hover:scale-105">
            Trabaja con nosotros
        </a>
        </li>
        <li>
        <a href="/contacto" class="text-lg font-semibold hover:text-red-200 transition duration-300 transform hover:scale-105">
            Contacto
        </a>
        </li>
        <li>
            <a href="{{ url('login') }}" class="bg-white text-red-600 px-6 py-3 rounded-lg font-semibold text-lg shadow-lg hover:bg-gray-200 transition duration-300 transform hover:scale-105 hover:shadow-xl">Iniciar sesión</a>
        </li>
    </ul>
</nav>
    <!-- Hero Section -->
    <section class="hero-tg text-white text-center py-50">
        <h2 class="hero-title mt-[-150px]">IMPORTADORA Y hospital DE CELULARES MARTINEZ</h2>
        <p class="hero-subtitle text-white mt-40">¡Tu celular en manos profesionales!</p>
        <div class="flex justify-center space-x-4 my-6">
            
            <a href="#servicios" class="btn inline-block bg-white text-red-600 px-6 py-3 rounded-lg hover:bg-gray-200">
                Ver Servicios
            </a>
            <a href="#sucursal" class="btn inline-block bg-white text-red-600 px-6 py-3 rounded-lg hover:bg-gray-200">
                Ver Sucursales
            </a>
            <a href="{{ route('solicitud') }}" class="btn inline-block bg-white text-red-600 px-6 py-3 rounded-lg hover:bg-gray-200">
                Solicitar Reparación
            </a>
        </div>
    </section>
    <div class="custom-wave">
    <svg viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,256L48,234.7C96,213,192,171,288,181.3C384,192,480,256,576,261.3C672,267,768,213,864,186.7C960,160,1056,160,1152,165.3C1248,171,1344,181,1392,186.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
</div>
        <!-- Botones de navegación -->
        <div class="swiper-container w-full max-w-5xl mx-auto h-auto p-6 bg-gray-100 shadow-xl rounded-lg">
<!-- <div class="swiper-container w-full max-w-2xl mx-auto h-102">quitar comentario esto para es wiper si no funciona -->
    <div class="swiper mySwiper">
        <!-- Contenedor de las imágenes -->
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('imagenes/gio.png') }}" alt="Imagen 1" class="w-full h-full object-cover rounded-lg shadow-lg transition-transform duration-500 ease-in-out transform hover:scale-105">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('imagenes/m1.jpg') }}" alt="Imagen 2" class="w-full h-full object-cover rounded-lg shadow-lg transition-transform duration-500 ease-in-out transform hover:scale-105">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('imagenes/m2.jpg') }}" alt="Imagen 3" class="w-full h-full object-cover rounded-lg shadow-lg transition-transform duration-500 ease-in-out transform hover:scale-105">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('imagenes/nezva.jpg') }}" alt="Imagen 4" class="w-full h-full object-cover rounded-lg shadow-lg transition-transform duration-500 ease-in-out transform hover:scale-105">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('imagenes/m5.jpg') }}" alt="Imagen 5" class="w-full h-full object-cover rounded-lg shadow-lg transition-transform duration-500 ease-in-out transform hover:scale-105">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('imagenes/m4.jpg') }}" alt="Imagen 6" class="w-full h-full object-cover rounded-lg shadow-lg transition-transform duration-500 ease-in-out transform hover:scale-105">
            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="swiper-button-next text-red-600 bg-white p-2 rounded-full shadow-lg hover:bg-red-600 hover:text-white transition-all duration-300"></div>
        <div class="swiper-button-prev text-red-600 bg-white p-2 rounded-full shadow-lg hover:bg-red-600 hover:text-white transition-all duration-300"></div>
        <!-- Paginación -->
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- Información sobre los servicios -->
        <section id="servicios" class="max-w-6xl mx-auto mt-10 p-6 bg-gradient-to-r from-red-600 via-red-500 to-red-400 rounded-lg shadow-xl">
    <h2 class="text-4xl font-extrabold text-center mb-10 text-white drop-shadow-lg">Nuestros Servicios</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Servicio: Cambio de Pantalla -->
        <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105">
            <h3 class="text-2xl font-semibold mb-4 text-center text-red-600">Cambio de Pantalla</h3>
            <div class="swiper servicio-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('imagenes/panta1.3.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Pantalla 1"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/panta2.2.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Pantalla 2"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/panta1.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Pantalla 3"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <p class="text-center mt-4 text-gray-600">Reemplazo completo de pantalla dañada con repuestos originales.</p>
        </div>
        <!-- Servicio: Cambio de Glass -->
        <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105">
            <h3 class="text-2xl font-semibold mb-4 text-center text-red-600">Cambio de Glass</h3>
            <div class="swiper servicio-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('imagenes/glas1.1.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Glass 1"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/glass2.2.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Glass 2"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/glass3.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Glass 3"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <p class="text-center mt-4 text-gray-600">Reemplazo de vidrio protector sin afectar el display original.</p>
        </div>
        <!-- Servicio: Cambio de Módulo -->
        <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105">
            <h3 class="text-2xl font-semibold mb-4 text-center text-red-600">Cambio de Módulo</h3>
            <div class="swiper servicio-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('imagenes/mod1.2.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Módulo 1"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/mod2.3.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Módulo 2"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/mod3.3.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Módulo 3"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <p class="text-center mt-4 text-gray-600">Sustitución del módulo completo para mejorar la funcionalidad de la pantalla.</p>
        </div>
        <!-- Servicio: Cambio de Pin de Carga -->
        <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105">
            <h3 class="text-2xl font-semibold mb-4 text-center text-red-600">Cambio de Pin de Carga</h3>
            <div class="swiper servicio-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('imagenes/pin1.png') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Pin de Carga 1"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/pin2.2.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Pin de Carga 2"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/pin3.3.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Pin de Carga 3"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <p class="text-center mt-4 text-gray-600">Reparación o cambio del puerto de carga para una mejor conectividad.</p>
        </div>
        <!-- Servicio: Reparación de Placa -->
        <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105">
            <h3 class="text-2xl font-semibold mb-4 text-center text-red-600">Reparación de Placa</h3>
            <div class="swiper servicio-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('imagenes/placa1.1.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Reparación de Placa 1"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/placa2.jpg') }}" class="w-full h-80 object-cover rounded-lg" alt="Reparación de Placa 2"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/placa2.2.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Reparación de Placa 3"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <p class="text-center mt-4 text-gray-600">Diagnóstico y reparación de fallos en la placa base del teléfono.</p>
        </div>
        <!-- Servicio: Cambio de Batería -->
        <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105">
            <h3 class="text-2xl font-semibold mb-4 text-center text-red-600">Cambio de Batería</h3>
            <div class="swiper servicio-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('imagenes/bat11.jpeg') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Batería 1"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/bat2.png') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Batería 2"></div>
                    <div class="swiper-slide"><img src="{{ asset('imagenes/bat3.png') }}" class="w-full h-80 object-cover rounded-lg" alt="Cambio de Batería 3"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <p class="text-center mt-4 text-gray-600">Sustitución de batería para mejorar la autonomía del dispositivo.</p>
        </div>
    </div>
</section>
        <!-- Para que el desplazamiento al hacer clic en los botones sea suave -->
        <script>
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
        
<!--vista Sucursales -->
<section id="sucursal" class="text-center py-16 bg-gradient-to-r from-red-600 to-red-900 shadow-md rounded-lg">
    <h2 class="text-4xl font-extrabold text-white drop-shadow-lg">NUESTRAS SUCURSALES</h2>
</section>
<div class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Sucursal La Paz -->
    <div class="bg-red-700 p-4 rounded-xl shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl">
        <h3 class="text-2xl font-semibold mb-4 text-center text-white hover:text-red-300">Sucursal La Paz</h3>
        <div class="swiper sucursal-swiper mt-4">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/lpz1.png') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/lpz2.png') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/lpz3.png') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <iframe 
            class="w-full h-64 rounded-xl mt-4 border-4 border-white hover:border-red-300 transition duration-300" 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15334.04025155283!2d-68.1192938!3d-16.5002418!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e3716b174b6e43%3A0x26fae7087fbbcb68!2sImportadora%20Mart%C3%ADnez%20-%20Sucursal%20La%20Paz!5e0!3m2!1ses!2sbo!4v1678311231184!5m2!1ses!2sbo" 
            allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!-- Sucursal UPEA -->
    <div class="bg-red-700 p-4 rounded-xl shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl">
        <h3 class="text-2xl font-semibold mb-4 text-center text-white hover:text-red-300">Sucursal UPEA</h3>
        <div class="swiper sucursal-swiper mt-4">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/upea1.jpeg') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/upea2.jpeg') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/upea3.jpeg') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <iframe 
            class="w-full h-64 rounded-xl mt-4 border-4 border-white hover:border-red-300 transition duration-300" 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15329.509496170937!2d-68.1194514!3d-16.4950659!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e37079f3f9fca1%3A0xd48a722c12b14c44!2sImportadora%20Mart%C3%ADnez%20-%20Sucursal%20UPEA!5e0!3m2!1ses!2sbo!4v1678311284914!5m2!1ses!2sbo" 
            allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!-- Sucursal Ceja -->
    <div class="bg-red-700 p-4 rounded-xl shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl">
        <h3 class="text-2xl font-semibold mb-4 text-center text-white hover:text-red-300">Sucursal Ceja</h3>
        <div class="swiper sucursal-swiper mt-4">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/ceja1.png') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/ceja2.2.jpeg') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
                <div class="swiper-slide flex justify-center items-center"><img src="{{ asset('imagenes/ceja3.jpeg') }}" class="w-full h-50 object-cover rounded-lg hover:opacity-80 transition duration-300"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <iframe 
            class="w-full h-64 rounded-xl mt-4 border-4 border-white hover:border-red-300 transition duration-300" 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15332.95233113058!2d-68.1194555!3d-16.4972576!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e370eb33cfa253%3A0x3b7a28a0341a938b!2sImportadora%20Mart%C3%ADnez%20-%20Sucursal%20Ceja!5e0!3m2!1ses!2sbo!4v1678311308233!5m2!1ses!2sbo" 
            allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
        <!--swiper de las sucursales-->
<script>
    var sucursalSwipers = document.querySelectorAll('.sucursal-swiper');
    sucursalSwipers.forEach(swiperElement => {
        new Swiper(swiperElement, {
            loop: true,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000,
            },
        });
    });
</script>
      <!-- Footer -->
      <footer class="bg-gradient-to-r from-red-900 to-red-500 text-white py-6 mt-10 border-t-8 border-white hover:shadow-lg hover:bg-gradient-to-r hover:from-blue-700 hover:to-blue-900 transition-all duration-300">
    <div class="max-w-screen-xl mx-auto px-4">
        <p class="text-center text-xl font-semibold tracking-wider">
            &copy; 2025 Importadora Martínez. Todos los derechos reservados.
        </p>
        <p class="text-center text-sm mt-2 opacity-75">
            Desarrollado con ❤️ por el equipo de Importadora Martínez
        </p>
    </div>
</footer>

        <!-- Swiper.js JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1, // Muestra 1 imagen a la vez
                spaceBetween: 30, // Espacio entre imágenes
                loop: true, // Hace que el carrusel sea infinito
                autoplay: {
                    delay: 3000, // Cambia de imagen cada 3 segundos
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>

        <!-- Swiper para los servicios -->
        <script>
            var servicioSwipers = document.querySelectorAll('.servicio-swiper');
            servicioSwipers.forEach(swiperElement => {
                new Swiper(swiperElement, {
                    loop: true,
                    spaceBetween: 10,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    autoplay: {
                        delay: 3000,
                    },
                });
            });
        </script>
    </body>
    </html>