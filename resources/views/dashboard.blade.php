@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-gradient-to-r from-gray-900 to-gray-700 text-white">
    <!-- Menú Lateral -->
    <aside class="w-72 bg-red-900 p-6 flex flex-col space-y-6 shadow-lg">
        <h2 class="text-3xl font-bold text-center text-white">Menú</h2>
        <nav class="space-y-4 text-lg">
            <a href="{{ route('sucursal.lapaz') }}" class="block py-3 px-6 rounded-lg bg-red-700 hover:bg-red-500 transition shadow-md transform hover:scale-105">Sucursal La Paz</a>
            <a href="{{ route('sucursal.upea') }}" class="block py-3 px-6 rounded-lg bg-red-700 hover:bg-red-500 transition shadow-md transform hover:scale-105">Sucursal UPEA</a>
            <a href="{{ route('sucursal.ceja') }}" class="block py-3 px-6 rounded-lg bg-red-700 hover:bg-red-500 transition shadow-md transform hover:scale-105">Sucursal Ceja</a>
            <a href="{{ route('almacen.index') }}" class="block py-3 px-6 rounded-lg bg-red-700 hover:bg-red-500 transition shadow-md transform hover:scale-105">Almacenes</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit" class="w-full bg-gray-800 py-3 px-6 rounded-lg text-lg font-semibold hover:bg-gray-600 transition shadow-md transform hover:scale-105">Cerrar Sesión</button>
        </form>
    </aside>
    
    <!-- Contenido Principal -->
    <main class="flex-1 flex items-center justify-center p-8">
        <div class="w-full max-w-3xl bg-white text-gray-900 shadow-2xl rounded-2xl p-10 space-y-8 border border-gray-300">
            <h2 class="text-4xl font-extrabold text-center text-red-800 mb-6">SELECCIONA UNA SUCURSAL</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                @foreach (['lapaz', 'upea', 'ceja'] as $sucursal)
                    <a href="{{ route('sucursal.' . $sucursal) }}" class="bg-red-600 text-white py-5 px-10 rounded-xl text-center text-2xl font-semibold hover:bg-red-500 transition ease-in-out transform hover:scale-110 shadow-lg hover:shadow-2xl">
                        Sucursal {{ ucfirst($sucursal) }}
                    </a>
                @endforeach
                <a href="{{ route('almacen.index') }}" class="bg-red-600 text-white py-5 px-10 rounded-xl text-center text-2xl font-semibold hover:bg-red-500 transition ease-in-out transform hover:scale-110 shadow-lg hover:shadow-2xl">
                    Almacenes
                </a>
            </div>

            <!-- Formulario para crear usuarios -->
            <div class="mt-10">
                <h3 class="text-2xl font-bold text-center text-gray-800">Crear Nuevo Usuario</h3>
                <form method="POST" action="{{ route('usuarios.store') }}" class="mt-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-semibold">Nombre</label>
                        <input type="text" name="name" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold">Correo Electrónico</label>
                        <input type="email" name="email" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold">Contraseña</label>
                        <input type="password" name="password" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold">Sucursal</label>
                        <select name="sucursal" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                            <option value="lapaz">Sucursal La Paz</option>
                            <option value="upea">Sucursal UPEA</option>
                            <option value="ceja">Sucursal Ceja</option>
                            <option value="almacen">Almacenes</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-red-600 py-3 rounded-lg text-white font-semibold hover:bg-red-500 transition transform hover:scale-105">Crear Usuario</button>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
