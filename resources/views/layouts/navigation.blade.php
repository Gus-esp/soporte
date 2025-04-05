<!-- Menú desplegable del usuario -->
<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="flex items-center text-sm font-medium text-white bg-red-600 px-4 py-2 rounded-md hover:bg-red-700 transition duration-150 ease-in-out">
            <!-- Imagen de usuario -->
            <img src="{{ Auth::user()->profile_photo_url ?? asset('images/default-user.png') }}" 
                 alt="Imagen de perfil" 
                 class="w-8 h-8 rounded-full border-2 border-white mr-2">

            <div>{{ Auth::user()->name }}</div>
        </button>
    </x-slot>

    <x-slot name="content">
        <!-- Opción de Perfil -->
        <x-dropdown-link href="{{ route('profile.show') }}" class="text-black hover:bg-red-600 hover:text-white">
            Perfil
        </x-dropdown-link>

        <div class="border-t border-gray-300"></div>

        <!-- Botón de Cerrar Sesión -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link href="{{ route('logout') }}" 
                class="text-black hover:bg-red-600 hover:text-white"
                onclick="event.preventDefault(); this.closest('form').submit();">
                Cerrar Sesión
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>
