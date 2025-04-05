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
            <h2 class="text-4xl font-extrabold text-center text-red-800 mb-6">CREAR NUEVO USUARIO</h2>
            
            <form method="POST" action="{{ route('usuarios.store') }}">
                @csrf
                <div class="space-y-4">
                    <!-- Nombre -->
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold">Nombre</label>
                        <input type="text" name="name" id="name" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                    </div>
                    
                    <!-- Correo Electrónico -->
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
                        <input type="email" name="email" id="email" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                    </div>
                    
                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-gray-700 font-semibold">Contraseña</label>
                        <input type="password" name="password" id="password" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                    </div>
                    
                    <!-- Confirmar Contraseña -->
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 font-semibold">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                    </div>

                    <!-- Sucursal -->
                    <div>
                        <label for="sucursal" class="block text-gray-700 font-semibold">Sucursal</label>
                        <select name="sucursal" id="sucursal" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                            <option value="lapaz">La Paz</option>
                            <option value="upea">UPEA</option>
                            <option value="ceja">Ceja</option>
                            <option value="almacen">Almacenes</option>
                        </select>
                    </div>

                    <!-- Rol -->
                    <div>
                        <label for="rol" class="block text-gray-700 font-semibold">Rol</label>
                        <select name="rol" id="rol" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-red-500">
                            <option value="empleado">Empleado</option>
                            <option value="superadmin">Superadmin</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-red-600 py-3 rounded-lg text-white font-semibold hover:bg-red-500 transition transform hover:scale-105">Crear Usuario</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
